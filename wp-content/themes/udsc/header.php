<?php
/**
 * The refactored header for our theme
 *
 * Clean, modular architecture with separation of concerns
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package udsc
 * @version 2.0.0
 */

// Ensure required components are loaded
if (!class_exists('UDSC_ContactBar')) {
    require_once get_template_directory() . '/inc/components/ContactBar.php';
}
if (!class_exists('UDSC_MainNav')) {
    require_once get_template_directory() . '/MainNav.php';
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'udsc' ); ?></a>

	<header id="masthead" class="site-header bg-background border-b border-border sticky top-0 z-50" role="banner">
		<!-- Top Contact Bar -->
		<?php echo UDSC_ContactBar::render(); ?>
		
		<!-- Main Navigation -->
		<?php echo UDSC_MainNav::render(); ?>
	</header><!-- #masthead -->
