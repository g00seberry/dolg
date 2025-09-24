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
			get_template_part("blocks/{$value['acf_fc_layout']}", null, [
				'data' => $value
			]);
		}
	}
	?>
</main><!-- #main -->
<?php
get_sidebar();
get_footer();
