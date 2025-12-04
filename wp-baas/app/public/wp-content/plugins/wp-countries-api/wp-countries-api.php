<?php

/**
 * Plugin Name: Countries API
 * Description: Custom API to display countries.
 * Version: 1.0.0
 * Author: Leonardo Grau
 */

if (! defined('ABSPATH')) exit;

// Register endpoints REST
// It's a real hook here "rest_api_init"
add_action('rest_api_init', function () {
  /**
   * Get countries
   * GET METHOD
   */
  register_rest_route("countries/v1", "/list", [
    "methods" => "GET",
    "callback" => "get_countries",
  ]);
});

// Register GraphQL
// Create an object (what is going to return)
add_action("graphql_register_types", function () {
  register_graphql_object_type("Countries", [
    "fields" => [
      "id" => ["type" => "Int"],
      "name" => ["type" => "String"],
    ]
  ]);
  register_graphql_field("RootQuery", "Countries", [
    "type" => ['list_of' => 'Countries'],
    "resolve" => function () {
      global $wpdb;
      $table = $wpdb->prefix . "countries";
      $result = $wpdb->get_results("SELECT * FROM $table", ARRAY_A);
      return $result;
    }
  ]);
});



function get_countries()
{
  global $wpdb;
  // countries
  $result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}countries;");
  return $result;
}