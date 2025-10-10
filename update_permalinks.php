<?php
require_once 'wp-config.php';
require_once 'wp-includes/wp-db.php';

$wpdb = new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);

// Обновляем структуру постоянных ссылок для добавления префикса /blog
$new_structure = '/blog/%postname%/';
$result = $wpdb->update(
    'wp_options',
    array('option_value' => $new_structure),
    array('option_name' => 'permalink_structure')
);

if ($result !== false) {
    echo "Permalink structure updated to: " . $new_structure . PHP_EOL;
    
    // Очищаем правила перезаписи, чтобы WordPress их пересоздал
    $wpdb->delete('wp_options', array('option_name' => 'rewrite_rules'));
    echo "Rewrite rules cleared. WordPress will regenerate them on next page load." . PHP_EOL;
    
    // Также нужно обновить настройки для категорий и тегов, если они используются
    $category_base = $wpdb->get_var("SELECT option_value FROM wp_options WHERE option_name = 'category_base'");
    if (empty($category_base)) {
        $wpdb->insert('wp_options', array(
            'option_name' => 'category_base',
            'option_value' => 'blog/category'
        ));
        echo "Category base set to: blog/category" . PHP_EOL;
    }
    
    $tag_base = $wpdb->get_var("SELECT option_value FROM wp_options WHERE option_name = 'tag_base'");
    if (empty($tag_base)) {
        $wpdb->insert('wp_options', array(
            'option_name' => 'tag_base',
            'option_value' => 'blog/tag'
        ));
        echo "Tag base set to: blog/tag" . PHP_EOL;
    }
    
} else {
    echo "Error updating permalink structure" . PHP_EOL;
}
?>

