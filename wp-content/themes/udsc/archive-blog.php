<?php
/**
 * The template for blog displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package udsc
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container mx-auto px-4 py-8">
			<?php if ( have_posts() ) : ?>
				
				<!-- Blog Header -->
				<div class="blog-header mb-8">
					<h1 class="text-3xl font-bold text-gray-900 mb-4">
						<?php
						if (is_category()) {
							single_cat_title();
						} elseif (is_tag()) {
							single_tag_title();
						} elseif (is_author()) {
							the_author();
						} elseif (is_date()) {
							if (is_year()) {
								echo 'Архив за ' . get_the_date('Y');
							} elseif (is_month()) {
								echo 'Архив за ' . get_the_date('F Y');
							} elseif (is_day()) {
								echo 'Архив за ' . get_the_date('j F Y');
							}
						} else {
							echo 'Блог';
						}
						?>
					</h1>
					
					<?php if (is_category() || is_tag()) : ?>
						<div class="text-gray-600">
							<?php echo category_description() ?: tag_description(); ?>
						</div>
					<?php endif; ?>
					
					<!-- Blog Statistics -->
					<div class="blog-stats mt-4 flex flex-wrap items-center gap-4 text-sm text-gray-600">
						<?php
						$total_posts = $wp_query->found_posts;
						$total_reading_time = 0;
						
						// Calculate total reading time for all posts
						if (have_posts()) {
							$temp_query = $wp_query;
							while (have_posts()) {
								the_post();
								$total_reading_time += calculate_blog_reading_time();
							}
							wp_reset_postdata();
						}
						?>
						
						<span class="flex items-center">
							<svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
								<path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 6a2 2 0 114 0 2 2 0 01-4 0zm8 0a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd"/>
							</svg>
							<?php echo $total_posts; ?> <?php echo _n('статья', 'статей', $total_posts, 'udsc'); ?>
						</span>
						
						<?php if ($total_reading_time > 0) : ?>
							<span class="flex items-center">
								<svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
									<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
								</svg>
								<?php echo $total_reading_time; ?> мин общего времени чтения
							</span>
						<?php endif; ?>
					</div>
				</div>

				<!-- Blog Grid -->
				<div class="blog-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						
						/*
						 * Include the blog post card template
						 */
						get_template_part( 'template-parts/content', 'blog' );

					endwhile;
					?>
				</div>

				<!-- Pagination -->
				<div class="blog-pagination mt-12">
					<?php
					the_posts_pagination(array(
						'mid_size' => 2,
						'prev_text' => '← Предыдущая',
						'next_text' => 'Следующая →',
						'class' => 'flex justify-center space-x-2'
					));
					?>
				</div>

			<?php else : ?>

				<div class="no-posts text-center py-12">
					<h2 class="text-2xl font-semibold text-gray-900 mb-4">Статьи не найдены</h2>
					<p class="text-gray-600 mb-6">К сожалению, в данном разделе пока нет статей.</p>
					<a href="<?php echo home_url('/'); ?>" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-200">
						Вернуться на главную
					</a>
				</div>

			<?php endif; ?>
		</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
