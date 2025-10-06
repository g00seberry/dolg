<?php
/**
 * Testimonial Form Component for UDSC Theme
 * 
 * Форма для добавления отзывов клиентов
 * 
 * @package udsc
 * @since 1.0.0
 */

class UDSC_TestimonialForm {

	private static function generate_form_id() {
		return 'testimonial-form';
	}

	/**
	 * Render testimonial form
	 */
	public static function create($id = '', $title = 'Оставить отзыв') {
		if (empty($id)) {
			$id = self::generate_form_id();
		}

		ob_start();
		?>
		<div class="bg-white rounded-xl shadow-lg border border-slate-200">
			<?php if ($title !== ''): ?>
			<div class="bg-gradient-to-r from-primary to-primary-hover text-white p-5 rounded-t-xl">
				<h3 class="text-xl font-semibold"><?php echo esc_html($title); ?></h3>
				<p class="text-white/80 text-sm mt-1">Поделитесь своим опытом прохождения процедуры банкротства</p>
			</div>
			<?php endif; ?>

			<form id="<?php echo esc_attr($id); ?>" class="p-5 space-y-4" method="post">
				<input type="hidden" name="action" value="testimonial_form">
				<?php wp_nonce_field('udsc_testimonial_form', 'udsc_testimonial_nonce'); ?>

				<div>
					<label class="block text-sm font-medium text-slate-700 mb-1" for="<?php echo esc_attr($id); ?>_name">Ваше имя</label>
					<input type="text" id="<?php echo esc_attr($id); ?>_name" name="name" required
						   placeholder="Анна К."
						   class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
				</div>

				<div>
					<label class="block text-sm font-medium text-slate-700 mb-1" for="<?php echo esc_attr($id); ?>_location">Город</label>
					<input type="text" id="<?php echo esc_attr($id); ?>_location" name="location" required
						   placeholder="Москва"
						   class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
				</div>

				<div>
					<label class="block text-sm font-medium text-slate-700 mb-1" for="<?php echo esc_attr($id); ?>_rating">Оценка</label>
					<select id="<?php echo esc_attr($id); ?>_rating" name="rating" required
							class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
						<option value="">Выберите оценку</option>
						<option value="5">⭐⭐⭐⭐⭐ Отлично</option>
						<option value="4">⭐⭐⭐⭐ Хорошо</option>
						<option value="3">⭐⭐⭐ Нормально</option>
						<option value="2">⭐⭐ Плохо</option>
						<option value="1">⭐ Очень плохо</option>
					</select>
				</div>

				<div>
					<label class="block text-sm font-medium text-slate-700 mb-1" for="<?php echo esc_attr($id); ?>_debt">Сумма долга</label>
					<input type="text" id="<?php echo esc_attr($id); ?>_debt" name="debt" required
						   placeholder="Например: 1.5 млн ₽"
						   class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
				</div>

				<div>
					<label class="block text-sm font-medium text-slate-700 mb-1" for="<?php echo esc_attr($id); ?>_text">Отзыв</label>
					<textarea id="<?php echo esc_attr($id); ?>_text" name="text" required
							  placeholder="Расскажите о своем опыте..."
							  rows="4"
							  class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors resize-none"></textarea>
				</div>

				<label class="flex items-start gap-3 text-sm">
					<input type="checkbox" name="consent" value="1" required class="mt-1 h-4 w-4 text-primary border-slate-300 rounded">
					<span class="text-slate-600">Я соглашаюсь на обработку персональных данных согласно политике конфиденциальности</span>
				</label>

				<div class="pt-2">
					<button type="submit" class="inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-primary to-primary-hover rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 w-full">
						<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
						Опубликовать отзыв
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
