<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package udsc
 */

get_header();
$sections = get_field('blocks');
?>
<main id="primary" class="site-main">
	<?php
	if ($sections) {
		foreach ($sections as $value) {
			// Безопасное подключение блоков с проверкой существования файла
			$block_name = sanitize_file_name($value['acf_fc_layout']);
			$block_file = get_template_directory() . "/blocks/{$block_name}.php";
			
			if (file_exists($block_file)) {
				get_template_part("blocks/{$block_name}", null, [
					'data' => $value
				]);
			} else {
				// Логируем отсутствующий блок для отладки
				error_log("UDSC Theme: Block file not found: {$block_file}");
				echo "<!-- Block '{$block_name}' not found -->";
			}
		}
	}
	?>
</main><!-- #main -->
<?php
get_sidebar();
get_footer();
