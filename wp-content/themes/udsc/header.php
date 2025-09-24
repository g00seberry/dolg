<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package udsc
 */

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

	<header id="masthead" class="site-header bg-background border-b border-border sticky top-0 z-50">
		<!-- Top bar with contact info -->
		<div class="bg-muted/50 py-2">
			<div class="container">
				<div class="flex items-center justify-between text-sm text-muted-foreground">
					<div class="flex items-center gap-6">
						<a href="tel:+79910042077" class="flex items-center gap-2 hover:text-primary transition-colors">
							<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
							</svg>
							<span>+7 (991) 004-20-77</span>
						</a>
						<a href="mailto:fnshield@yandex.ru" class="flex items-center gap-2 hover:text-primary transition-colors">
							<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
							</svg>
							<span>fnshield@yandex.ru</span>
						</a>
					</div>
					<div class="hidden md:flex items-center gap-4">
						<span>Пн-Пт 9:00-18:00, Сб 10:00-16:00</span>
						<div class="flex items-center gap-2 ml-4">
							<a href="https://vk.com/finshield" target="_blank" rel="noopener noreferrer" class="hover:text-primary transition-colors">
								<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
									<path d="M12.785 16.241s.288-.032.436-.196c.136-.151.131-.434.131-.434s-.019-1.325.581-1.52c.59-.194 1.348 1.28 2.151 1.846.607.428 1.068.334 1.068.334l2.138-.03s1.119-.072.588-.971c-.043-.074-.308-.664-1.588-1.876-1.339-1.268-1.16-1.063.454-3.246.984-1.33 1.377-2.144 1.253-2.492-.118-.331-.844-.244-.844-.244l-2.406.015s-.178-.025-.31.056c-.125.078-.205.26-.205.26s-.368 1.002-.859 1.855c-1.036 1.804-1.449 1.898-1.619 1.785-.395-.262-.296-1.053-.296-1.613 0-1.755.26-2.489-.507-2.678-.255-.063-.442-.104-1.094-.111-.835-.009-1.541.003-1.942.203-.267.133-.473.431-.347.448.155.021.507.097.693.356.24.334.231 1.084.231 1.084s.138 2.065-.322 2.32c-.316.175-.75-.182-1.681-1.816-.477-.835-.837-1.759-.837-1.759s-.069-.172-.193-.264c-.151-.112-.362-.147-.362-.147l-2.286.015s-.343.01-.468.162c-.111.135-.009.413-.009.413s1.73 4.154 3.689 6.245c1.795 1.915 3.833 1.789 3.833 1.789h.924z"/>
								</svg>
							</a>
							<a href="https://t.me/finshield" target="_blank" rel="noopener noreferrer" class="hover:text-primary transition-colors">
								<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
									<path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.568 8.16c-.369 1.966-1.981 6.791-2.803 9.014-.347 1.037-.719 1.387-1.17 1.387-.995 0-1.19-.736-1.19-1.387 0-1.38.736-3.681 1.843-5.938.368-.736 1.59-3.219 1.59-3.68 0-.368-.184-.552-.552-.552-.736 0-2.437 1.104-3.68 2.437-1.104 1.243-1.843 2.437-1.843 3.68 0 1.104.552 2.208 1.659 2.208 1.843 0 4.096-2.208 4.464-5.754.184-1.659-.184-2.803-1.473-2.803-1.104 0-2.437.552-3.68 1.659-.368.368-.552.92-.552 1.473 0 .736.184 1.473.92 1.473 1.243 0 1.843-.552 1.843-1.473 0-.552-.184-1.104-.552-1.473-.184-.184-.368-.368-.368-.552 0-.368.184-.736.552-.736.552 0 1.104.368 1.104 1.104 0 1.104-.552 2.437-1.659 2.437-1.475 0-2.622-1.104-2.622-2.622 0-1.843 1.659-3.317 3.68-3.317 2.208 0 3.68 1.474 3.68 3.68z"/>
								</svg>
							</a>
							<a href="<?php echo esc_url( home_url( '/profile' ) ); ?>" class="hover:text-primary transition-colors">
								<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Main navigation -->
		<nav class="py-4">
			<div class="container">
				<div class="flex items-center justify-between">
					<!-- Logo -->
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 min-h-[3rem]">
						<svg class="h-8 w-8 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
						</svg>
						<div>
							<div class="font-bold text-xl text-primary">
								Финансовый щит
							</div>
							<div class="text-sm text-muted-foreground -mt-1">
								Банкротство • Списание долгов • Защита от кредиторов
							</div>
						</div>
					</a>
					<!-- Desktop Navigation -->
					<div class="hidden lg:flex items-center space-x-8">
						<?php
						$menu_items = array(
							array('url' => home_url('/'), 'title' => 'Главная'),
							array('url' => home_url('/services'), 'title' => 'Услуги'),
							array('url' => home_url('/case-studies'), 'title' => 'Кейсы', 'has_count' => true),
							array('url' => home_url('/blog'), 'title' => 'Финщит'),
							array('url' => home_url('/pricing'), 'title' => 'Стоимость'),
							array('title' => 'О компании', 'children' => array(
								array('url' => home_url('/about'), 'title' => 'О нас'),
								array('url' => home_url('/promotions'), 'title' => 'Акции'),
								array('url' => home_url('/testimonials'), 'title' => 'Отзывы')
							)),
							array('url' => home_url('/contacts'), 'title' => 'Контакты'),
						);

						foreach ($menu_items as $item):
							if (isset($item['children'])): ?>
								<div class="relative group">
									<button class="text-sm font-medium transition-colors hover:text-primary flex items-center gap-1 text-foreground group-hover:text-primary">
										<span><?php echo esc_html($item['title']); ?></span>
										<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
										</svg>
									</button>
									<div class="absolute top-full left-0 bg-popover border border-border rounded-lg shadow-lg min-w-[200px] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-10 mt-1">
										<?php foreach ($item['children'] as $child): ?>
											<a href="<?php echo esc_url($child['url']); ?>" class="block px-4 py-3 text-sm hover:bg-accent rounded-lg transition-colors">
												<?php echo esc_html($child['title']); ?>
											</a>
										<?php endforeach; ?>
									</div>
								</div>
							<?php else: 
								$is_active = (is_home() && $item['url'] === home_url('/')) || 
											 (!is_home() && strpos($_SERVER['REQUEST_URI'], parse_url($item['url'], PHP_URL_PATH)) === 0);
								?>
								<a href="<?php echo esc_url($item['url']); ?>" class="text-sm font-medium transition-colors hover:text-primary flex items-center gap-1 <?php echo $is_active ? 'text-primary' : 'text-foreground'; ?>">
									<span class="<?php echo $is_active ? 'border-b-2 border-primary pb-1' : ''; ?>">
										<?php echo esc_html($item['title']); ?>
									</span>
									<?php if (isset($item['has_count']) && $item['has_count']): ?>
										<div class="relative w-6 h-6 flex items-center justify-center ml-1">
											<svg viewBox="0 0 200 200" class="w-full h-full absolute inset-0">
												<path d="M100 30 C75 30, 25 40, 25 55 C25 90, 35 120, 60 140 C75 150, 85 155, 100 155 C115 155, 125 150, 140 140 C165 120, 175 90, 175 55 C175 40, 125 30, 100 30 Z" fill="hsl(var(--primary))" fill-opacity="0.2"/>
											</svg>
											<span class="relative text-[10px] font-semibold text-foreground z-10 leading-none translate-y-[-1px]">
												<?php
												// Безопасное получение количества кейсов
												$cases_count = wp_count_posts('case_study');
												$count = '12'; // значение по умолчанию
												if ($cases_count && isset($cases_count->publish)) {
													$count = $cases_count->publish;
												}
												echo $count;
												?>
											</span>
										</div>
									<?php endif; ?>
								</a>
							<?php endif;
						endforeach; ?>
						<button class="bg-primary text-primary-foreground hover:bg-primary/90 px-6 py-3 rounded-lg font-medium transition-colors" onclick="window.location.href='<?php echo esc_url(home_url('/contacts')); ?>#consultation'">
							Бесплатная консультация
						</button>
					</div>

					<!-- Mobile Menu Button -->
					<button id="mobile-menu-toggle" class="lg:hidden p-2">
						<svg id="menu-open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
						</svg>
						<svg id="menu-close" class="h-6 w-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
						</svg>
					</button>
				</div>

				<!-- Mobile Navigation -->
				<div id="mobile-menu" class="lg:hidden mt-4 pb-4 border-t border-border hidden">
					<div class="pt-4 space-y-2">
						<?php foreach ($menu_items as $item):
							if (isset($item['children'])): ?>
								<div class="space-y-1">
									<div class="py-2 px-4 font-medium text-muted-foreground text-sm">
										<?php echo esc_html($item['title']); ?>
									</div>
									<?php foreach ($item['children'] as $child):
										$is_active = (is_home() && $child['url'] === home_url('/')) || 
													(!is_home() && strpos($_SERVER['REQUEST_URI'], parse_url($child['url'], PHP_URL_PATH)) === 0);
										?>
										<a href="<?php echo esc_url($child['url']); ?>" class="block py-2 px-8 rounded-lg transition-colors <?php echo $is_active ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted'; ?>">
											<?php echo esc_html($child['title']); ?>
										</a>
									<?php endforeach; ?>
								</div>
							<?php else:
								$is_active = (is_home() && $item['url'] === home_url('/')) || 
											 (!is_home() && strpos($_SERVER['REQUEST_URI'], parse_url($item['url'], PHP_URL_PATH)) === 0);
								?>
								<a href="<?php echo esc_url($item['url']); ?>" class="block py-2 px-4 rounded-lg transition-colors flex items-center justify-between <?php echo $is_active ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted'; ?>">
									<span><?php echo esc_html($item['title']); ?></span>
									<?php if (isset($item['has_count']) && $item['has_count']): ?>
										<div class="relative w-6 h-6 flex items-center justify-center">
											<svg viewBox="0 0 200 200" class="w-full h-full absolute inset-0">
												<path d="M100 30 C75 30, 25 40, 25 55 C25 90, 35 120, 60 140 C75 150, 85 155, 100 155 C115 155, 125 150, 140 140 C165 120, 175 90, 175 55 C175 40, 125 30, 100 30 Z" fill="hsl(var(--primary))" fill-opacity="0.2"/>
											</svg>
											<span class="relative text-[10px] font-semibold text-foreground z-10 leading-none translate-y-[-1px]">
												<?php
												// Безопасное получение количества кейсов
												$cases_count = wp_count_posts('case_study');
												$count = '12'; // значение по умолчанию
												if ($cases_count && isset($cases_count->publish)) {
													$count = $cases_count->publish;
												}
												echo $count;
												?>
											</span>
										</div>
									<?php endif; ?>
								</a>
							<?php endif;
						endforeach; ?>
						<div class="pt-2">
							<button class="w-full bg-primary text-primary-foreground hover:bg-primary/90 px-6 py-3 rounded-lg font-medium transition-colors" onclick="window.location.href='<?php echo esc_url(home_url('/contacts')); ?>#consultation'">
								Бесплатная консультация
							</button>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<script>
		document.addEventListener('DOMContentLoaded', function() {
			const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
			const mobileMenu = document.getElementById('mobile-menu');
			const menuOpen = document.getElementById('menu-open');
			const menuClose = document.getElementById('menu-close');

			if (mobileMenuToggle && mobileMenu && menuOpen && menuClose) {
				mobileMenuToggle.addEventListener('click', function() {
					if (mobileMenu.classList.contains('hidden')) {
						mobileMenu.classList.remove('hidden');
						menuOpen.classList.add('hidden');
						menuClose.classList.remove('hidden');
					} else {
						mobileMenu.classList.add('hidden');
						menuOpen.classList.remove('hidden');
						menuClose.classList.add('hidden');
					}
				});

				// Close mobile menu when clicking on a link
				const mobileMenuLinks = mobileMenu.querySelectorAll('a');
				mobileMenuLinks.forEach(link => {
					link.addEventListener('click', function() {
						mobileMenu.classList.add('hidden');
						menuOpen.classList.remove('hidden');
						menuClose.classList.add('hidden');
					});
				});

				// Close mobile menu when clicking outside
				document.addEventListener('click', function(event) {
					if (!mobileMenuToggle.contains(event.target) && !mobileMenu.contains(event.target)) {
						mobileMenu.classList.add('hidden');
						menuOpen.classList.remove('hidden');
						menuClose.classList.add('hidden');
					}
				});
			}
		});
		</script>
	</header><!-- #masthead -->
