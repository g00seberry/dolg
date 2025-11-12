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
    $contact_bar_file = get_template_directory() . '/inc/components/ContactBar.php';
    if (file_exists($contact_bar_file)) {
        require_once $contact_bar_file;
    }
}
if (!class_exists('UDSC_Breadcrumbs')) {
    $breadcrumbs_file = get_template_directory() . '/inc/components/Breadcrumbs.php';
    if (file_exists($breadcrumbs_file)) {
        require_once $breadcrumbs_file;
    }
}
if (!class_exists('UDSC_MainNav')) {
    $main_nav_file = get_template_directory() . '/MainNav.php';
    if (file_exists($main_nav_file)) {
        require_once $main_nav_file;
    }
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function(m,e,t,r,i,k,a){
			m[i]=m[i]function(){(m[i].a=m[i].a[]).push(arguments)};
			m[i].l=1*new Date();
			for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
			k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
		})(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=104374073', 'ym');

		ym(104374073, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", accurateTrackBounce:true, trackLinks:true});
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/104374073" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
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

	<div class="container py-6">
		<!-- Breadcrumbs -->
		<?php echo UDSC_Breadcrumbs::render(); ?>
	</div>