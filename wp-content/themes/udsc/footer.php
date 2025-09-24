<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package udsc
 */

?>

	<footer class="bg-muted/30 border-t border-border mt-16 overflow-hidden">
		<div class="container py-12">
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
				<!-- Company Info -->
				<div class="lg:col-span-2">
					<div class="flex items-start gap-3 mb-4 max-w-full">
						<svg class="h-8 w-8 text-primary shrink-0 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
						</svg>
						<div class="min-w-0">
							<div class="font-bold text-xl text-primary">
								Финансовый щит
							</div>
							<div class="text-base text-muted-foreground -mt-1">
								Банкротство • Списание долгов • Защита от кредиторов
							</div>
						</div>
					</div>
					<p class="text-muted-foreground mb-6 max-w-md">
						Профессиональная юридическая помощь в процедуре банкротства физических лиц. 
						Защитим ваши интересы и поможем решить проблемы с долгами законным путем.
					</p>
					
					<!-- Contact Info -->
					<div class="space-y-3">
						<div class="flex items-center gap-3 text-sm">
							<svg class="h-4 w-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
							</svg>
							<span>+7 (991) 004-20-77</span>
						</div>
						<div class="flex items-center gap-3 text-sm">
							<svg class="h-4 w-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
								<polyline points="22,6 12,13 2,6"/>
							</svg>
							<span>fnshield@yandex.ru</span>
						</div>
						<div class="flex items-center gap-3 text-sm">
							<svg class="h-4 w-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
								<circle cx="12" cy="10" r="3"/>
							</svg>
							<span>г. Москва, вн.тер.г. Муниципальный Округ Измайлово, ул Средняя Первомайская, д.4, этаж 3, ком. 35</span>
						</div>
						<div class="flex items-center gap-3 text-sm">
							<svg class="h-4 w-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<circle cx="12" cy="12" r="10"/>
								<polyline points="12,6 12,12 16,14"/>
							</svg>
							<span>Пн-Пт 9:00-18:00, Сб 10:00-16:00</span>
						</div>
					</div>
					
					<!-- Social Media -->
					<div class="mt-6">
						<h5 class="font-medium text-sm mb-3 text-foreground">Мы в соцсетях</h5>
						<div class="flex gap-3">
							<a
								href="https://vk.com/fnshield"
								target="_blank"
								rel="noopener noreferrer"
								class="flex items-center justify-center w-9 h-9 bg-primary/10 hover:bg-primary hover:text-primary-foreground rounded-lg transition-colors group"
								aria-label="ВКонтакте"
							>
								<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
								</svg>
							</a>
							<a
								href="https://t.me/fnshield"
								target="_blank"
								rel="noopener noreferrer"
								class="flex items-center justify-center w-9 h-9 bg-primary/10 hover:bg-primary hover:text-primary-foreground rounded-lg transition-colors group"
								aria-label="Telegram"
							>
								<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<line x1="22" y1="2" x2="11" y2="13"/>
									<polygon points="22,2 15,22 11,13 2,9 22,2"/>
								</svg>
							</a>
						</div>
					</div>
				</div>

				<!-- Services -->
				<div>
					<h4 class="font-semibold mb-4">Услуги</h4>
					<ul class="space-y-2">
						<li><a href="#" class="text-sm text-muted-foreground hover:text-primary transition-colors">Банкротство физических лиц</a></li>
						<li><a href="#" class="text-sm text-muted-foreground hover:text-primary transition-colors">Реструктуризация долгов</a></li>
						<li><a href="#" class="text-sm text-muted-foreground hover:text-primary transition-colors">Юридическая консультация</a></li>
					</ul>
				</div>

				<!-- Company Links -->
				<div>
					<h4 class="font-semibold mb-4">Компания</h4>
					<ul class="space-y-2">
						<li><a href="#" class="text-sm text-muted-foreground hover:text-primary transition-colors">О компании</a></li>
						<li><a href="#" class="text-sm text-muted-foreground hover:text-primary transition-colors">Успешные кейсы</a></li>
						<li><a href="#" class="text-sm text-muted-foreground hover:text-primary transition-colors">Отзывы клиентов</a></li>
						<li><a href="#" class="text-sm text-muted-foreground hover:text-primary transition-colors">FAQ</a></li>
						<li><a href="#" class="text-sm text-muted-foreground hover:text-primary transition-colors">Контакты</a></li>
					</ul>
				</div>
			</div>

			<!-- Bottom Section -->
			<div class="border-t border-border mt-8 pt-8">
				<div class="flex flex-col md:flex-row justify-between items-center gap-4">
					<p class="text-sm text-muted-foreground">
						© <?php echo date('Y'); ?> Финансовый щит. Все права защищены.
					</p>
					<div class="flex flex-col sm:flex-row gap-2 sm:gap-6 text-center md:text-left">
						<a href="#" class="text-sm text-foreground/80 hover:text-primary transition-colors">Политика конфиденциальности</a>
						<a href="#" class="text-sm text-foreground/80 hover:text-primary transition-colors">Пользовательское соглашение</a>
						<a href="#" class="text-sm text-foreground/80 hover:text-primary transition-colors">Политика cookie</a>
					</div>
				</div>
				
				<!-- Legal Entity Information -->
				<div class="mt-6 p-4 bg-muted/30 rounded-lg border">
					<h5 class="font-medium text-sm mb-3 text-foreground">Юридическая информация</h5>
					<div class="space-y-2 text-xs text-muted-foreground">
						<p>
							<strong class="text-foreground">ИНДИВИДУАЛЬНЫЙ ПРЕДПРИНИМАТЕЛЬ БАБИЧЕВ НИКИТА СЕРГЕЕВИЧ</strong>
						</p>
						<p>
							<span class="text-foreground font-medium">ИНН:</span> 753300181690
						</p>
						<p>
							<span class="text-foreground font-medium">Юридический адрес:</span><br />
							196628, РОССИЯ, Г САНКТ-ПЕТЕРБУРГ, ТЕР. СЛАВЯНКА (П ШУШАРЫ),<br />
							УЛ РОСТОВСКАЯ, Д 26, КОРП 2 ЛИТЕРА А, А, КВ 125
						</p>
					</div>
				</div>

				<!-- Legal Disclaimer -->
				<div class="mt-4 p-4 bg-muted/50 rounded-lg">
					<p class="text-xs text-muted-foreground">
						<strong>Отказ от ответственности:</strong> Информация на данном сайте носит 
						исключительно информационный характер и не является публичной офертой или 
						юридической консультацией. Для получения персональной консультации обратитесь 
						к нашим специалистам. Результаты прошлых дел не гарантируют аналогичный исход 
						в будущем.
					</p>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
