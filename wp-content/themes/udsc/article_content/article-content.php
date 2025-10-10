<?php
/**
 * Main Article Content Handler
 * Processes ACF flexible content and renders appropriate components
 */

// Include all component files
require_once __DIR__ . '/hero-block.php';
require_once __DIR__ . '/intro-image.php';
require_once __DIR__ . '/intro-text.php';
require_once __DIR__ . '/content-table.php';
require_once __DIR__ . '/list-section.php';
require_once __DIR__ . '/columns-section.php';
require_once __DIR__ . '/steps-section.php';
require_once __DIR__ . '/debtor-section.php';
require_once __DIR__ . '/consequences-section.php';
require_once __DIR__ . '/conclusion-section.php';
require_once __DIR__ . '/cta-block.php';

if (!function_exists('render_article_content')) {
    function render_article_content($flexible_content) {
        if (empty($flexible_content) || !is_array($flexible_content)) {
            return '';
        }
        
        $output = '';
        
        foreach ($flexible_content as $layout) {
            if (empty($layout['acf_fc_layout'])) {
                continue;
            }
            
            $layout_name = $layout['acf_fc_layout'];
            $layout_fields = $layout;
            
            // Remove the layout name from fields array
            unset($layout_fields['acf_fc_layout']);
            
            switch ($layout_name) {
                case 'hero_block':
                    $output .= render_hero_block($layout_fields);
                    break;
                    
                case 'intro_text':
                    $output .= render_intro_text($layout_fields);
                    break;
                    
                case 'content_table':
                    $output .= render_content_table($layout_fields);
                    break;
                    
                case 'list_section':
                    $output .= render_list_section($layout_fields);
                    break;
                    
                case 'columns_section':
                    $output .= render_columns_section($layout_fields);
                    break;
                    
                case 'steps_section':
                    $output .= render_steps_section($layout_fields);
                    break;
                    
                case 'debtor_section':
                    $output .= render_debtor_section($layout_fields);
                    break;
                    
                case 'consequences_section':
                    $output .= render_consequences_section($layout_fields);
                    break;
                    
                case 'conclusion_section':
                    $output .= render_conclusion_section($layout_fields);
                    break;
                    
                default:
                    // Log unknown layout for debugging
                    error_log("Unknown ACF layout: " . $layout_name);
                    break;
            }
        }
        
        return $output; 
    }
}

if (!function_exists('get_article_flexible_content')) {
    function get_article_flexible_content($post_id = null) {
        if (!$post_id) {
            global $post;
            $post_id = $post->ID ?? get_the_ID();
        }
        
        if (!$post_id) {
            return [];
        }
        
        return get_field('article_content', $post_id) ?: [];
    }
}

if (!function_exists('display_article_content')) {
    function display_article_content($post_id = null) {
        $flexible_content = get_article_flexible_content($post_id);
        echo render_article_content($flexible_content);
    }
}
