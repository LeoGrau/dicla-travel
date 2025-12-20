<?php
/**
 * Plugin Name: Countries API
 * Description: Custom API to display countries.
 * Version: 1.0.0
 * Author: Leonardo Grau
 */

if (!defined('ABSPATH')) exit;

define('CITIES_API_PATH', plugin_dir_path(__FILE__));

require_once CITIES_API_PATH."api/wp-cities-rest-api.php";
require_once CITIES_API_PATH."repositories/wp-cities-repository.php";