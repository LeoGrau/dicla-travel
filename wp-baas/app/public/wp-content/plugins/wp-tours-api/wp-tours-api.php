<?php

/**
 * Plugin Name: Tours API
 * Description: Custom API to display tours.
 * Version: 1.0.1
 * Author: Leonardo Grau
 */
if (! defined('ABSPATH')) exit;

add_action('rest_api_init', function () {
  register_rest_route('tours/top16', '/list', args: [
    "methods" => "GET",
    "callback" => "get_top16_tours"
  ]);
  register_rest_route('tours/query', '/page', [
    "methods" => "GET",
    "callback" => "get_paged_tour_by_query",
    "args" => [
      "page_size" => [
        'required' => false,
        'default' => 10,
        'validate_callback' => function ($param, $request, $key) {
          return is_numeric($param);
        }
      ],
      "page_index" => [
        'required' => false,
        'default' => 1,
        'validate_callback' => function ($param, $request, $key) {
          return is_numeric($param);
        }
      ],
      "" => [
        "required" => false,
        "default" => "",
        'validate_callaback' => function ($param, $request, $key) {
          return is_string($param);
        }
      ],
      "ranking" => [
        'required' => false,
        'default' => 1,
        'validate_callback' => function ($param, $request, $key) {
          return is_numeric($param);
        }
      ],
      "min_price" => [
        'required' => false,
        'default' => 20,
        'validate_callback' => function ($param, $request, $key) {
          return is_numeric($param);
        }
      ],
      "max_price" => [
        'required' => false,
        'default' => 99999999,
        'validate_callback' => function ($param, $request, $key) {
          return is_numeric($param);
        }
      ],
      "from_date" => [
        'required' => false,
        'default' => date('Y-m-d', strtotime('-6 months')),
        'validate_callback' => function ($param, $request, $key) {
          return strtotime($param) !== false;
        }
      ],
      "to_date" => [
        'required' => false,
        'default' => date('Y-m-d', strtotime('+1 year')),
        'validate_callback' => function ($param, $request, $key) {
          return strtotime($param) !== false;
        }
      ],
      "min_duration" => [
        'required' => false,
        'default' => 1,
        'validate_callback' => function ($param, $request, $key) {
          return is_numeric($param);
        }
      ],
      "max_duration" => [
        'required' => false,
        'default' => 999999,
        'validate_callback' => function ($param, $request, $key) {
          return is_numeric($param);
        }
      ],
      "categories" => [
        'required' => false,
        'default' => '',
        'validate_callback' => function ($param, $request, $key) {
          return preg_match('/^\d+(,\d+)*$/', $param);
        },
        'sanitize_callback' => function ($param, $request, $key) {
          return array_map('intval', explode(',', $param));
        }
      ],
      "cities" => [
        'required' => false,
        'default' => '',
        'validate_callback' => function ($param, $request, $key) {
          return preg_match('/^\d+(,\d+)*$/', $param);
        },
        'sanitize_callback' => function ($param, $request, $key) {
          return array_map('intval', explode(',', $param));
        }
      ],
    ]
  ]);
});




add_action("graphql_register_types", function () {
  register_graphql_object_type("Tours", [
    "fields" => [
      "id" => ["type" => "Int"],
      "title" => ["type" => "String"],
      "description" => ["type" => "String"],
      "slug" => ["type" => "String"],
      "duration_days" => ["type" => "Int"],
      "price_usd" => ["type" => "Float"],
      "price_pen" => ["type" => "Float"],
      "created_at" => ["type" => "DateTime"],
      "url_image" => ["type" => "String"],
      "status" => ["type" => "String"],
      "city_id" => ["type" => "Int"],
      "category_id" => ["type" => "Int"],
      "ranking" => ["type" => "Float"],
      "city_name" => ["type" => "string"]
    ]
  ]);

  register_graphql_field("RootQuery", "Tours", [
    "type" => ['list_of' => 'Tours'],
    "resolve" => 'get_top16_tours'
  ]);
});

function get_top16_tours()
{
  global $wpdb;
  $tours_table = $wpdb->prefix . 'tours';
  $cities_table = $wpdb->prefix . 'cities';
  $query = "SELECT t.id, t.title, t.description, t.ranking, t.price_usd, t.url_image, c.name as city_name
    FROM $tours_table t
    INNER JOIN $cities_table c ON t.city_id = c.id
    ORDER BY t.ranking DESC
    LIMIT 16; ";

  $results = $wpdb->get_results($query, ARRAY_A);
  return $results;
}


function get_paged_tour_by_query(WP_REST_Request $request)
{
  global $wpdb;

  $page_size = intval($request->get_param("page_size") ?? 5);
  $page_index = intval($request->get_param("page_index") ?? 1);
  $ranking = floatval($request->get_param("ranking") ?? 1);
  $min_price = floatval($request->get_param("min_price") ?? 20.00);
  $max_price = floatval($request->get_param("max_price") ?? 80.00);
  $from_date = $request->get_param("from_date") ?? null;
  $to_date = $request->get_param("to_date") ?? null;
  $min_duration = $request->get_param("min_duration") ?? null;
  $max_duration = $request->get_param("max_duration") ?? null;
  $categories = $request->get_param("categories") ?? [1, 2, 3];
  $cities = $request->get_param("cities") ?? [];

  $categories = array_filter(
    $categories,
    fn($c) => $c > 0
  );

  $cities = array_filter(
    $cities,
    fn($c) => $c > 0
  );

  $categories = array_map('intval', $categories);
  $categories_placeholder = implode(',', array_fill(0, count($categories), "%d"));

  $cities = array_map('intval', $cities);
  $cities_placeholder = implode(',', array_fill(0, count($cities), '%d'));

  $page_offset = ($page_index - 1) * $page_size;


  $all_args = array_merge(
    [
      $ranking,
      $min_price,
      $max_price,
      $from_date,
      $to_date,
      $min_duration,
      $max_duration
    ],
    $categories,
    $cities,
    [
      $page_size,
      $page_offset
    ]
  );

  $selection_query = "SELECT w_t.*,
       JSON_ARRAYAGG(
               JSON_OBJECT(
                       'id', w_ca.id,
                       'name', w_ca.name
               )
       ) as 'categories', JSON_OBJECT(
               'id', w_t.city_id,
               'name', w_ci.name
       ) as 'city'";
  $selection_count_query = "SELECT COUNT(DISTINCT w_t.id)";
  $query = $selection_query . " FROM wp_tours w_t
        INNER JOIN wp_tours_categories w_tc ON w_tc.tour_id = w_t.id
         INNER JOIN wp_categories w_ca ON w_ca.id = w_tc.category_id
         INNER JOIN wp_cities w_ci ON w_ci.id = w_t.city_id
         WHERE w_t.ranking >= %f
         AND w_t.price_usd BETWEEN %f AND %f
         AND w_t.updated_at BETWEEN %s AND %s
         AND w_t.duration_hours BETWEEN %d AND %d";

  $count_query = $selection_count_query . " FROM wp_tours w_t INNER JOIN wp_tours_categories w_tc ON w_tc.tour_id = w_t.id
         INNER JOIN wp_categories w_ca ON w_ca.id = w_tc.category_id
         INNER JOIN wp_cities w_ci ON w_ci.id = w_t.city_id
         WHERE w_t.ranking >= %f
         AND w_t.price_usd BETWEEN %f AND %f
         AND w_t.updated_at BETWEEN %s AND %s
         AND w_t.duration_hours BETWEEN %d AND %d";


  if (!empty($categories)) {
    $query .= " AND w_tc.category_id IN ($categories_placeholder)";
  }

  if (!empty($cities)) {
    $query .= " AND w_t.city_id IN ($cities_placeholder)";
  }

  $query .= " GROUP BY w_t.id ORDER BY w_t.id
         LIMIT %d 
         OFFSET %d;";

  $prep_count = $wpdb->prepare($count_query, array_merge(
    [
      $ranking,
      $min_price,
      $max_price,
      $from_date,
      $to_date,
      $min_duration,
      $max_duration
    ],
    $categories,
    $cities
  ));
  $total = (int) $wpdb->get_var(
    $prep_count
  );

  // echo "<pre>Hey this is: $prep_count</pre>\n";

  $query_prep = $wpdb->prepare(
    $query,
    $all_args
  );


  $results = $wpdb->get_results($query_prep, ARRAY_A);
  foreach ($results as &$row) {
    $row['id'] = !empty($row['id']) ? (int)$row['id'] : 0;
    $row['price_usd'] = !empty($row['price_usd']) ? (float)$row['price_usd'] : 0.00;
    $row['price_pen'] = !empty($row['price_pen']) ? (float)$row['price_pen'] : 0.00;
    $row['ranking'] = !empty($row['ranking']) ? (float)$row['ranking'] : 0.00;
    $row["categories"] = !empty($row['categories']) ? json_decode($row["categories"], true) : [];
    $row["city"] = !empty($row["city"]) ? json_decode($row['city'], true) : [];
  }


  unset($row);
  // echo "<pre>$query_prep</pre>\n";

  $response = [
    'items' => $results,
    'pagination' => [
      'page_index' => $page_index,
      'page_size' => $page_size,
      'total' => $total,
      'total_pages' => ceil($total / $page_size)
    ]
  ];

  return new WP_REST_Response($response, 200);
}
