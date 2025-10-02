<?php
/**
 * Consultation Form Component for UDSC Theme
 * 
 * Простая форма записи на консультацию: имя, телефон, согласие на обработку
 * 
 * @package udsc
 * @since 1.0.0
 */

class UDSC_ConsultationForm {

	private static function generate_form_id() {
		return 'consultation-form';
	}

	/**
	 * Render consultation form
	 */
	public static function create($id = '', $title = 'Записаться на консультацию') {
		if (empty($id)) {
			$id = self::generate_form_id();
		}

		ob_start();
		?>
		<div class="bg-white rounded-xl shadow-lg border border-slate-200">
			<?php if ($title !== ''): ?>
			<div class="bg-gradient-to-r from-primary to-primary-hover text-white p-5 rounded-t-xl">
				<h3 class="text-xl font-semibold"><?php echo esc_html($title); ?></h3>
				<p class="text-white/80 text-sm mt-1">Мы перезвоним в течение 10 минут</p>
			</div>
			<?php endif; ?>

			<form id="<?php echo esc_attr($id); ?>" class="p-5 space-y-4" method="post" action="">
				<?php wp_nonce_field('udsc_consultation_form', 'udsc_consultation_nonce'); ?>

				<div>
					<label class="block text-sm font-medium text-slate-700 mb-1" for="<?php echo esc_attr($id); ?>_name">Ваше имя</label>
					<input type="text" id="<?php echo esc_attr($id); ?>_name" name="name" required
						   placeholder="Иван"
						   class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
				</div>

				<div>
					<label class="block text-sm font-medium text-slate-700 mb-1" for="<?php echo esc_attr($id); ?>_phone">Номер телефона</label>
					<input type="tel" id="<?php echo esc_attr($id); ?>_phone" name="phone" required
						   inputmode="tel"
						   placeholder="+7 (___) ___-__-__"
						   class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
				</div>

				<label class="flex items-start gap-3 text-sm">
					<input type="checkbox" name="consent" value="1" required class="mt-1 h-4 w-4 text-primary border-slate-300 rounded">
					<span class="text-slate-600">Я соглашаюсь на обработку персональных данных согласно политике конфиденциальности</span>
				</label>

				<div class="pt-2">
					<button type="submit" class="inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-primary to-primary-hover rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
						<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
						Отправить
					</button>
				</div>
			</form>

			<div class="bg-slate-50 px-5 py-3 rounded-b-xl border-t border-slate-200 text-xs text-slate-500">
				Ваши данные защищены и не будут переданы третьим лицам
				</div>
		</div>

		<?php
		return ob_get_clean();
	}
}
