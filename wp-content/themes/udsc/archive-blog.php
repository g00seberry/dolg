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
		<div class="container mx-auto py-8">
		<?php if ( have_posts() ) : ?>

				<!-- Blog Header -->
				<div class="blog-header mb-8">
					<h1 class="text-3xl font-bold text-gray-900 mb-4">
						Блог
					</h1>
				</div>

				<!-- Category Filter -->
				<div class="blog-filter mb-8">
					<?php
					// Get all blog categories
					$blog_categories = get_terms(array(
						'taxonomy' => 'blog-category',
						'hide_empty' => true,
						'orderby' => 'name',
						'order' => 'ASC'
					));
					
					if (!is_wp_error($blog_categories) && !empty($blog_categories)) :
						$current_category = get_queried_object();
						$current_category_id = (is_tax('blog-category')) ? $current_category->term_id : 0;
					?>
						<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
							<h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
								<svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.707A1 1 0 013 7V4z"/>
								</svg>
								Фильтр по категориям
							</h3>
							
							<div class="flex flex-wrap gap-2">
								<!-- All Categories Button -->
								<a href="<?php echo get_post_type_archive_link('blog'); ?>" 
								   class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-full transition-colors duration-200 <?php echo ($current_category_id == 0) ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'; ?>">
									<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
									</svg>
									Все категории
									<span class="ml-2 text-xs px-2 py-0.5 rounded-full <?php echo ($current_category_id == 0) ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-600'; ?>">
										<?php echo wp_count_posts('blog')->publish; ?>
									</span>
								</a>
								
								<!-- Category Buttons -->
								<?php foreach ($blog_categories as $category) : 
									$category_link = get_term_link($category);
									$category_count = $category->count;
									$is_active = ($current_category_id == $category->term_id);
								?>
									<a href="<?php echo esc_url($category_link); ?>" 
									   class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-full transition-colors duration-200 <?php echo $is_active ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'; ?>">
										<?php echo esc_html($category->name); ?>
										<span class="ml-2 text-xs px-2 py-0.5 rounded-full <?php echo $is_active ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-600'; ?>">
											<?php echo $category_count; ?>
										</span>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>
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
				<div class="blog-pagination mt-16">
					<?php
					// Get pagination data
					global $wp_query;
					$current_page = max(1, get_query_var('paged'));
					$total_pages = $wp_query->max_num_pages;
					$total_posts = $wp_query->found_posts;
					
					if ($total_pages > 1) :
					?>
						<div class="flex flex-col items-center space-y-6">
							<!-- Pagination Info -->
							<div class="text-sm text-gray-600 text-center">
								<?php
								$start_post = ($current_page - 1) * get_option('posts_per_page') + 1;
								$end_post = min($current_page * get_option('posts_per_page'), $total_posts);
								echo "Показано {$start_post}-{$end_post} из {$total_posts} статей";
								?>
							</div>
							
							<!-- Pagination Navigation -->
							<nav class="flex items-center justify-center space-x-1" aria-label="Навигация по страницам">
								<?php
								// Previous button
								if ($current_page > 1) :
									$prev_link = get_pagenum_link($current_page - 1);
								?>
									<a href="<?php echo esc_url($prev_link); ?>" 
									   class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-50 hover:text-gray-900 transition-colors duration-200">
										<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
										</svg>
										Предыдущая
									</a>
								<?php else : ?>
									<span class="flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-l-lg cursor-not-allowed">
										<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
										</svg>
										Предыдущая
									</span>
								<?php endif; ?>
								
								<!-- Page numbers -->
								<div class="flex items-center space-x-1">
									<?php
									// First page
									if ($current_page > 3) :
									?>
										<a href="<?php echo esc_url(get_pagenum_link(1)); ?>" 
										   class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 hover:text-gray-900 transition-colors duration-200">
											1
										</a>
										<?php if ($current_page > 4) : ?>
											<span class="px-2 py-2 text-sm text-gray-500">...</span>
										<?php endif; ?>
									<?php endif; ?>
									
									<?php
									// Page numbers around current page
									$start_page = max(1, $current_page - 2);
									$end_page = min($total_pages, $current_page + 2);
									
									for ($i = $start_page; $i <= $end_page; $i++) :
										if ($i == $current_page) :
									?>
										<span class="px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600">
											<?php echo $i; ?>
										</span>
									<?php else : ?>
										<a href="<?php echo esc_url(get_pagenum_link($i)); ?>" 
										   class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 hover:text-gray-900 transition-colors duration-200">
											<?php echo $i; ?>
										</a>
									<?php endif; endfor; ?>
									
									<?php
									// Last page
									if ($current_page < $total_pages - 2) :
									?>
										<?php if ($current_page < $total_pages - 3) : ?>
											<span class="px-2 py-2 text-sm text-gray-500">...</span>
										<?php endif; ?>
										<a href="<?php echo esc_url(get_pagenum_link($total_pages)); ?>" 
										   class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 hover:text-gray-900 transition-colors duration-200">
											<?php echo $total_pages; ?>
										</a>
									<?php endif; ?>
								</div>
								
								<?php
								// Next button
								if ($current_page < $total_pages) :
									$next_link = get_pagenum_link($current_page + 1);
								?>
									<a href="<?php echo esc_url($next_link); ?>" 
									   class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-50 hover:text-gray-900 transition-colors duration-200">
										Следующая
										<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
										</svg>
									</a>
								<?php else : ?>
									<span class="flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-r-lg cursor-not-allowed">
										Следующая
										<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
										</svg>
									</span>
								<?php endif; ?>
							</nav>
							
							<!-- Quick jump to page -->
							<div class="flex items-center space-x-2 text-sm text-gray-600">
								<span>Перейти к странице:</span>
								<select onchange="if(this.value) window.location.href=this.value" 
										class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
									<option value="">Выберите страницу</option>
									<?php for ($i = 1; $i <= $total_pages; $i++) : ?>
										<option value="<?php echo esc_url(get_pagenum_link($i)); ?>" 
												<?php selected($i, $current_page); ?>>
											Страница <?php echo $i; ?>
										</option>
									<?php endfor; ?>
								</select>
							</div>
							
							<!-- Filter Statistics -->
							<div class="mt-4 p-4 bg-gray-50 rounded-lg">
								<div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
									<div>
										<div class="text-2xl font-bold text-blue-600"><?php echo $total_posts; ?></div>
										<div class="text-sm text-gray-600">Всего статей</div>
									</div>
									<div>
										<div class="text-2xl font-bold text-green-600"><?php echo count($blog_categories); ?></div>
										<div class="text-sm text-gray-600">Категорий</div>
									</div>
									<div>
										<div class="text-2xl font-bold text-purple-600"><?php echo $total_pages; ?></div>
										<div class="text-sm text-gray-600">Страниц</div>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
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
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth scrolling to filter buttons
    const filterButtons = document.querySelectorAll('.blog-filter a');
    filterButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            // Add loading state
            this.style.opacity = '0.7';
            this.style.pointerEvents = 'none';
            
            // Add ripple effect
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            ripple.style.cssText = `
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.6);
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            `;
            
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
            ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
            
            this.appendChild(ripple);
            
            // Remove ripple after animation
            setTimeout(() => {
                if (ripple.parentNode) {
                    ripple.parentNode.removeChild(ripple);
                }
            }, 600);
        });
    });
    
    // Add CSS for ripple animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        .blog-filter a {
            position: relative;
            overflow: hidden;
        }
        
        .blog-filter a:active {
            transform: scale(0.98);
        }
    `;
    document.head.appendChild(style);
    
    // Add hover effects for statistics
    const statsItems = document.querySelectorAll('.bg-gray-50 .grid > div');
    statsItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.transition = 'transform 0.2s ease-in-out';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
