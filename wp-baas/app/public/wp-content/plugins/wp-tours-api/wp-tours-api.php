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
});


add_action("graphql_register_types", function () {
  register_graphql_object_type("Tours", [
    "fields" => [
      "id" => ["type" => "Int"],
      "title" => ["type" => "String"],
      "description" => ["type"=> "String"],
      "slug"=> ["type"=> "String"],
      "duration_days"=> ["type"=> "Int"],
      "price_usd"=> ["type"=> "Float"],
      "price_pen"=> ["type"=> "Float"],
      "created_at"=> ["type"=> "DateTime"],
      "url_image"=> ["type"=> "String"],
      "status" => ["type" => "String"],
      "city_id" => ["type" => "Int"],
      "category_id" => ["type"=> "Int"],
      "ranking" => ["type"=> "Float"],
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

