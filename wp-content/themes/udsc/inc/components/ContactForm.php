<?php
/**
 * Contact Form Component for UDSC Theme
 * 
 * Расширенная форма обратной связи с полями: имя, телефон, email, тема, способ связи, сообщение
 * 
 * @package udsc
 * @since 1.0.0
 */

class UDSC_ContactForm {

	private static function generate_form_id() {
		return 'contact-form';
	}

	/**
	 * Render contact form
	 */
	public static function create($id = '', $title = 'Задать вопрос') {
		if (empty($id)) {
			$id = self::generate_form_id();
		}

		ob_start();
		?>
		<div class="bg-white rounded-xl shadow-lg border border-slate-200">
			<?php if ($title !== ''): ?>
			<div class="bg-gradient-to-r from-primary to-primary-hover text-white p-6 rounded-t-xl">
				<h3 class="text-2xl font-semibold"><?php echo esc_html($title); ?></h3>
				<p class="text-white/80 text-sm mt-1">Мы ответим в течение часа</p>
			</div>
			<?php endif; ?>

			<form id="<?php echo esc_attr($id); ?>" class="p-8 space-y-6" method="post" action="">
				<?php wp_nonce_field('udsc_contact_form', 'udsc_contact_nonce'); ?>

				<div class="grid md:grid-cols-2 gap-4">
					<div>
						<label class="block text-sm font-medium text-slate-700 mb-2" for="<?php echo esc_attr($id); ?>_name">
							Ваше имя *
						</label>
						<input type="text" id="<?php echo esc_attr($id); ?>_name" name="name" required
							   placeholder="Введите имя"
							   class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
					</div>

					<div>
						<label class="block text-sm font-medium text-slate-700 mb-2" for="<?php echo esc_attr($id); ?>_phone">
							Телефон *
						</label>
						<input type="tel" id="<?php echo esc_attr($id); ?>_phone" name="phone" required
							   inputmode="tel"
							   placeholder="+7 (___) ___-__-__"
							   class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
					</div>
				</div>

				<div>
					<label class="block text-sm font-medium text-slate-700 mb-2" for="<?php echo esc_attr($id); ?>_email">
						Email *
					</label>
					<input type="email" id="<?php echo esc_attr($id); ?>_email" name="email" required
						   placeholder="example@email.com"
						   class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
				</div>

				<div>
					<label class="block text-sm font-medium text-slate-700 mb-2" for="<?php echo esc_attr($id); ?>_subject">
						Тема обращения
					</label>
					<select id="<?php echo esc_attr($id); ?>_subject" name="subject"
							class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
						<option value="">Выберите тему</option>
						<option value="consultation">Консультация по банкротству</option>
						<option value="documents">Помощь с документами</option>
						<option value="court">Представительство в суде</option>
						<option value="collectors">Защита от коллекторов</option>
						<option value="other">Другое</option>
					</select>
				</div>

				<div>
					<label class="block text-sm font-medium text-slate-700 mb-2" for="<?php echo esc_attr($id); ?>_preferred_contact">
						Предпочтительный способ связи
					</label>
					<select id="<?php echo esc_attr($id); ?>_preferred_contact" name="preferred_contact"
							class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
						<option value="">Выберите способ</option>
						<option value="phone">Телефонный звонок</option>
						<option value="email">Email</option>
						<option value="whatsapp">WhatsApp</option>
						<option value="telegram">Telegram</option>
					</select>
				</div>

				<div>
					<label class="block text-sm font-medium text-slate-700 mb-2" for="<?php echo esc_attr($id); ?>_message">
						Сообщение *
					</label>
					<textarea id="<?php echo esc_attr($id); ?>_message" name="message" required rows="5"
							  placeholder="Опишите вашу ситуацию подробно..."
							  class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors resize-none"></textarea>
				</div>

				<div class="pt-2">
					<button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-primary to-primary-hover rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
						<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
						</svg>
						Отправить сообщение
					</button>
				</div>

				<div class="text-xs text-slate-500 text-center">
					Отправляя форму, вы соглашаетесь с 
					<a href="<?php echo get_privacy_policy_url(); ?>" class="text-primary hover:underline">
						политикой конфиденциальности
					</a> 
					и на обработку персональных данных
				</div>
			</form>

			<div class="bg-slate-50 px-8 py-4 rounded-b-xl border-t border-slate-200 text-xs text-slate-500">
				Ваши данные защищены и не будут переданы третьим лицам
			</div>
		</div>

		<?php
		return ob_get_clean();
	}

	/**
	 * Handle form submission
	 */
	public static function handle_submission() {
		if (!isset($_POST['udsc_contact_nonce']) || !wp_verify_nonce($_POST['udsc_contact_nonce'], 'udsc_contact_form')) {
			return;
		}

		// Sanitize form data
		$name = sanitize_text_field($_POST['name'] ?? '');
		$phone = sanitize_text_field($_POST['phone'] ?? '');
		$email = sanitize_email($_POST['email'] ?? '');
		$subject = sanitize_text_field($_POST['subject'] ?? '');
		$preferred_contact = sanitize_text_field($_POST['preferred_contact'] ?? '');
		$message = sanitize_textarea_field($_POST['message'] ?? '');

		// Validate required fields
		if (empty($name) || empty($phone) || empty($email) || empty($message)) {
			wp_die('Пожалуйста, заполните все обязательные поля.', 'Ошибка валидации', array('back_link' => true));
		}

		// Prepare email
		$to = get_option('admin_email');
		$email_subject = 'Новое сообщение с сайта: ' . get_bloginfo('name');
		
		$email_message = "Новое сообщение с формы контактов:\n\n";
		$email_message .= "Имя: {$name}\n";
		$email_message .= "Телефон: {$phone}\n";
		$email_message .= "Email: {$email}\n";
		$email_message .= "Тема: " . ($subject ?: 'Не указана') . "\n";
		$email_message .= "Предпочтительный способ связи: " . ($preferred_contact ?: 'Не указан') . "\n";
		$email_message .= "Сообщение:\n{$message}\n\n";
		$email_message .= "---\n";
		$email_message .= "Отправлено с: " . home_url() . "\n";
		$email_message .= "IP адрес: " . $_SERVER['REMOTE_ADDR'] . "\n";
		$email_message .= "Время: " . current_time('mysql') . "\n";

		$headers = array(
			'Content-Type: text/plain; charset=UTF-8',
			'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
			'Reply-To: ' . $name . ' <' . $email . '>'
		);

		// Send email
		$sent = wp_mail($to, $email_subject, $email_message, $headers);

		if ($sent) {
			// Redirect with success message
			wp_redirect(add_query_arg('contact_sent', '1', wp_get_referer() ?: home_url()));
			exit;
		} else {
			wp_die('Произошла ошибка при отправке сообщения. Попробуйте позже.', 'Ошибка отправки', array('back_link' => true));
		}
	}
}

// Hook form submission
add_action('init', array('UDSC_ContactForm', 'handle_submission'));
