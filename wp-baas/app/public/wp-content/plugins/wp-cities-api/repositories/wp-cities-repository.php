<?php

function get_cities( $country_id ) {
  global $wpdb;
  $table = $wpdb->prefix ."cities";
  $query = $wpdb->prepare("SELECT * FROM $table w_ci where w_ci.country_id = %d;", $country_id );
  $results = $wpdb->get_results( $query , ARRAY_A);
  return $results;
}