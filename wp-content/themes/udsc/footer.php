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
							<span><?php echo esc_html(udsc_get_contact_phone()); ?></span>
						</div>
						<div class="flex items-center gap-3 text-sm">
							<svg class="h-4 w-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
								<polyline points="22,6 12,13 2,6"/>
							</svg>
							<span><?php echo esc_html(udsc_get_contact_email()); ?></span>
						</div>
						<div class="flex items-center gap-3 text-sm">
							<svg class="h-4 w-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
								<circle cx="12" cy="10" r="3"/>
							</svg>
							<span><?php echo esc_html(udsc_get_contact_address()); ?></span>
						</div>
						<div class="flex items-center gap-3 text-sm">
							<svg class="h-4 w-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<circle cx="12" cy="12" r="10"/>
								<polyline points="12,6 12,12 16,14"/>
							</svg>
							<span><?php echo esc_html(udsc_get_contact_hours()); ?></span>
						</div>
					</div>
					
					<!-- Social Media -->
					<div class="mt-6">
						<h5 class="font-medium text-sm mb-3 text-foreground">Мы в соцсетях</h5>
						<div class="flex gap-3">
							<?php if (!empty(udsc_get_contact_vk())): ?>
							<a
								href="<?php echo esc_url(udsc_get_contact_vk()); ?>"
								target="_blank"
								rel="noopener noreferrer"
								class="flex items-center justify-center w-9 h-9 bg-primary/10 hover:bg-primary hover:text-primary-foreground rounded-lg transition-colors group"
								aria-label="ВКонтакте"
							>
								<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
								</svg>
							</a>
							<?php endif; ?>
							
							<?php if (!empty(udsc_get_contact_telegram())): ?>
							<a
								href="<?php echo esc_url(udsc_get_contact_telegram()); ?>"
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
							<?php endif; ?>
							
							<?php if (!empty(udsc_get_contact_whatsapp())): ?>
							<a
								href="<?php echo esc_url(udsc_get_contact_whatsapp()); ?>"
								target="_blank"
								rel="noopener noreferrer"
								class="flex items-center justify-center w-9 h-9 bg-primary/10 hover:bg-primary hover:text-primary-foreground rounded-lg transition-colors group"
								aria-label="WhatsApp"
							>
								<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
									<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488z"/>
								</svg>
							</a>
							<?php endif; ?>
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
