<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package udsc
 */

get_header();

// Подключить компоненты для обработки ACF flexible content
require_once get_template_directory() . '/article_content/article-content.php';
?>

<main id="primary" class="site-main">
	<div class="max-w-4xl mx-auto px-4 py-6">
		<?php
		// Отобразить содержимое статьи используя новые компоненты
		display_article_content();
		?>
		
	<div class="rounded-lg border bg-card text-card-foreground shadow-sm p-8 text-center bg-gradient-to-r from-primary/10 to-primary/5 border-primary/20">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-12 h-12 mx-auto mb-4 text-primary">
			<path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
			<path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
			<path d="M10 9H8"></path>
			<path d="M16 13H8"></path>
			<path d="M16 17H8"></path>
		</svg>
		<h3 class="text-2xl font-bold mb-4">Нужна консультация по банкротству?</h3>
		<p class="text-muted-foreground mb-6 max-w-2xl mx-auto">Получите профессиональную юридическую консультацию по вопросам банкротства физических лиц и защиты от долгов</p>
		<div class="flex flex-col sm:flex-row gap-4 justify-center">
			<a class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-md px-8" href="/contacts">Получить консультацию</a>
			<a class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-11 rounded-md px-8" href="/services">Наши услуги</a>
		</div></div>
	</div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
