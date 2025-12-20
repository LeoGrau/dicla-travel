<?php

add_action('rest_api_init', function () {
  register_rest_route('cities/v1', '/list/(?P<id>\d+)', [
    'methods'  => 'GET',
    'callback' => 'get_cities_rest',
  ]);
});

function get_cities_rest(WP_REST_Request $req)
{
  $country_id = (int) $req->get_param('id');

  $result = get_cities($country_id);

  foreach ($result as &$row) {
    $row['id'] = !empty($row['id']) ? (int)$row['id'] : 0;
  }

  unset($row);

  $response = [
    'items' => $result
  ];

  return new WP_REST_Response($response, 200);
}
