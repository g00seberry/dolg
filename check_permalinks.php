<?php
require_once 'wp-config.php';
require_once 'wp-includes/wp-db.php';

$wpdb = new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
$permalink_structure = $wpdb->get_var("SELECT option_value FROM wp_options WHERE option_name = 'permalink_structure'");
echo "Current permalink structure: " . $permalink_structure . PHP_EOL;

// Проверим также настройки для постов
$post_type_structure = $wpdb->get_var("SELECT option_value FROM wp_options WHERE option_name = 'rewrite_rules'");
echo "Rewrite rules exist: " . (!empty($post_type_structure) ? 'Yes' : 'No') . PHP_EOL;
?>

