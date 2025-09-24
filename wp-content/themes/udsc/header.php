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
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hash h-4 w-4" data-lov-id="src\components\Navigation.tsx:63:20" data-lov-name="Hash" data-component-path="src\components\Navigation.tsx" data-component-line="63" data-component-file="Navigation.tsx" data-component-name="Hash" data-component-content="%7B%22className%22%3A%22h-4%20w-4%22%7D"><line x1="4" x2="20" y1="9" y2="9"></line><line x1="4" x2="20" y1="15" y2="15"></line><line x1="10" x2="8" y1="3" y2="21"></line><line x1="16" x2="14" y1="3" y2="21"></line></svg>
							</a>
							<a href="https://t.me/finshield" target="_blank" rel="noopener noreferrer" class="hover:text-primary transition-colors">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle h-4 w-4" data-lov-id="src\components\Navigation.tsx:66:20" data-lov-name="MessageCircle" data-component-path="src\components\Navigation.tsx" data-component-line="66" data-component-file="Navigation.tsx" data-component-name="MessageCircle" data-component-content="%7B%22className%22%3A%22h-4%20w-4%22%7D"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path></svg>
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
					<a href="/" class="flex items-center gap-3 min-h-[3rem]">
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
