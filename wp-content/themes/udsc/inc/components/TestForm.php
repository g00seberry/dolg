<?php
/**
 * Test Form Component for UDSC Theme
 * 
 * Компонент формы тестирования для определения возможности банкротства
 * 
 * @package udsc
 * @since 1.0.0
 */

class UDSC_TestForm {
    
    /**
     * Счетчик форм для уникальных ID
     */
    private static $form_counter = 0;
    
    /**
     * Варианты имущества
     */
    private static $property_options = array(
        'apartment' => 'Квартира',
        'house' => 'Дом/дача',
        'car' => 'Автомобиль',
        'land' => 'Земельный участок',
        'business' => 'Доля в бизнесе',
        'other' => 'Другое имущество',
        'none' => 'Не владею имуществом'
    );
    
    /**
     * Генерирует уникальный ID для формы
     */
    private static function generate_form_id() {
        self::$form_counter++;
        return 'bankruptcy-test-form-' . self::$form_counter;
    }
    
    /**
     * Рендер поля с суммой долга
     */
    private static function render_debt_amount_field($form_id) {
        ob_start();
        ?>
        <div class="space-y-3">
            <label class="block">
                <span class="text-sm font-semibold text-slate-700 mb-2 block">
                    1. Общая сумма долгов в рублях без учета пеней и штрафов
                    <span class="text-red-500">*</span>
                </span>
                <div class="relative">
                    <input type="number" 
                           name="debt_amount" 
                           id="<?php echo $form_id; ?>_debt_amount"
                           min="0" 
                           step="1000" 
                           required
                           placeholder="Введите сумму"
                           class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors bg-white placeholder-slate-400">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <span class="text-slate-400 text-sm">₽</span>
                    </div>
                </div>
                <p class="mt-1 text-xs text-slate-500">
                    Укажите общую сумму задолженности по всем кредитам, займам и другим обязательствам
                </p>
            </label>
        </div>
        <?php
        return ob_get_clean();
    }
    
    /**
     * Рендер поля с имуществом
     */
    private static function render_property_field($form_id) {
        ob_start();
        ?>
        <div class="space-y-3">
            <span class="block text-sm font-semibold text-slate-700 mb-3">
                2. Каким имуществом вы владеете, и есть ли у вас ипотечная квартира?
                <span class="text-red-500">*</span>
            </span>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <?php foreach (self::$property_options as $value => $label): ?>
                <label class="flex items-start space-x-3 p-3 rounded-lg border border-slate-200 hover:border-primary/50 hover:bg-primary/5 transition-all cursor-pointer">
                    <input type="checkbox" 
                           name="property[]" 
                           value="<?php echo esc_attr($value); ?>"
                           id="<?php echo $form_id; ?>_property_<?php echo esc_attr($value); ?>"
                           class="mt-0.5 h-4 w-4 text-primary border-slate-300 rounded focus:ring-primary focus:ring-2">
                    <span class="text-sm text-slate-700 leading-5"><?php echo esc_html($label); ?></span>
                </label>
                <?php endforeach; ?>
            </div>
            
            <div class="mt-4">
                <label class="flex items-start space-x-3 p-3 rounded-lg border-2 border-dashed border-amber-300 bg-amber-50">
                    <input type="checkbox" 
                           name="has_mortgage" 
                           value="1"
                           id="<?php echo $form_id; ?>_has_mortgage"
                           class="mt-0.5 h-4 w-4 text-amber-600 border-amber-300 rounded focus:ring-amber-500 focus:ring-2">
                    <div class="flex-1">
                        <span class="text-sm font-medium text-amber-800 block">У меня есть ипотечная квартира</span>
                        <span class="text-xs text-amber-600 mt-1">Отметьте, если у вас есть квартира, приобретенная в ипотеку</span>
                    </div>
                </label>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
    
    /**
     * Рендер поля со сделками
     */
    private static function render_transactions_field($form_id) {
        ob_start();
        ?>
        <div class="space-y-3">
            <label class="block">
                <span class="text-sm font-semibold text-slate-700 mb-2 block">
                    3. Какие сделки с имуществом вы совершали за последние 3 года?
                    <span class="text-red-500">*</span>
                </span>
                <textarea name="transactions" 
                          id="<?php echo $form_id; ?>_transactions"
                          rows="4" 
                          required
                          placeholder="Опишите все сделки: продажа, покупка, дарение, обмен имущества..."
                          class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors bg-white placeholder-slate-400 resize-y"></textarea>
                <p class="mt-1 text-xs text-slate-500">
                    Укажите все операции с недвижимостью, автомобилями, ценными бумагами и другим имуществом
                </p>
            </label>
            
            <!-- Быстрые варианты -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-3">
                <button type="button" 
                        onclick="document.getElementById('<?php echo $form_id; ?>_transactions').value = 'Сделок с имуществом не совершал'"
                        class="px-3 py-2 text-xs text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-md transition-colors text-left">
                    Сделок не совершал
                </button>
                <button type="button" 
                        onclick="document.getElementById('<?php echo $form_id; ?>_transactions').value = 'Продал автомобиль в '"
                        class="px-3 py-2 text-xs text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-md transition-colors text-left">
                    Продал автомобиль
                </button>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
    
    /**
     * Рендер поля с доходом
     */
    private static function render_income_field($form_id) {
        ob_start();
        ?>
        <div class="space-y-3">
            <span class="block text-sm font-semibold text-slate-700 mb-3">
                4. Есть ли у вас какой-либо доход (даже небольшой) после вычета прожиточного минимума?
                <span class="text-red-500">*</span>
            </span>
            
            <div class="space-y-3">
                <label class="flex items-start space-x-3 p-3 rounded-lg border border-slate-200 hover:border-green-500 hover:bg-green-50 transition-all cursor-pointer">
                    <input type="radio" 
                           name="has_income" 
                           value="no"
                           id="<?php echo $form_id; ?>_income_no"
                           required
                           class="mt-0.5 h-4 w-4 text-green-600 border-slate-300 focus:ring-green-500 focus:ring-2">
                    <div class="flex-1">
                        <span class="text-sm font-medium text-slate-700 block">Нет, дохода нет</span>
                        <span class="text-xs text-slate-500 mt-1">После вычета прожиточного минимума средств не остается</span>
                    </div>
                </label>
                
                <label class="flex items-start space-x-3 p-3 rounded-lg border border-slate-200 hover:border-orange-500 hover:bg-orange-50 transition-all cursor-pointer">
                    <input type="radio" 
                           name="has_income" 
                           value="small"
                           id="<?php echo $form_id; ?>_income_small"
                           required
                           class="mt-0.5 h-4 w-4 text-orange-600 border-slate-300 focus:ring-orange-500 focus:ring-2">
                    <div class="flex-1">
                        <span class="text-sm font-medium text-slate-700 block">Есть небольшой доход</span>
                        <span class="text-xs text-slate-500 mt-1">Остается до 30% от прожиточного минимума</span>
                    </div>
                </label>
                
                <label class="flex items-start space-x-3 p-3 rounded-lg border border-slate-200 hover:border-red-500 hover:bg-red-50 transition-all cursor-pointer">
                    <input type="radio" 
                           name="has_income" 
                           value="significant"
                           id="<?php echo $form_id; ?>_income_significant"
                           required
                           class="mt-0.5 h-4 w-4 text-red-600 border-slate-300 focus:ring-red-500 focus:ring-2">
                    <div class="flex-1">
                        <span class="text-sm font-medium text-slate-700 block">Есть значительный доход</span>
                        <span class="text-xs text-slate-500 mt-1">Более 30% от прожиточного минимума</span>
                    </div>
                </label>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
    
    /**
     * Рендер поля с судимостью
     */
    private static function render_criminal_record_field($form_id) {
        ob_start();
        ?>
        <div class="space-y-3">
            <span class="block text-sm font-semibold text-slate-700 mb-3">
                5. Имели ли вы непогашенную судимость за экономические преступления?
                <span class="text-red-500">*</span>
            </span>
            
            <div class="space-y-3">
                <label class="flex items-start space-x-3 p-3 rounded-lg border border-slate-200 hover:border-green-500 hover:bg-green-50 transition-all cursor-pointer">
                    <input type="radio" 
                           name="criminal_record" 
                           value="no"
                           id="<?php echo $form_id; ?>_criminal_no"
                           required
                           class="mt-0.5 h-4 w-4 text-green-600 border-slate-300 focus:ring-green-500 focus:ring-2">
                    <div class="flex-1">
                        <span class="text-sm font-medium text-slate-700 block">Нет</span>
                        <span class="text-xs text-slate-500 mt-1">Судимости за экономические преступления не было</span>
                    </div>
                </label>
                
                <label class="flex items-start space-x-3 p-3 rounded-lg border-2 border-red-200 bg-red-50 cursor-pointer">
                    <input type="radio" 
                           name="criminal_record" 
                           value="yes"
                           id="<?php echo $form_id; ?>_criminal_yes"
                           required
                           class="mt-0.5 h-4 w-4 text-red-600 border-red-300 focus:ring-red-500 focus:ring-2">
                    <div class="flex-1">
                        <span class="text-sm font-medium text-red-800 block">Да, имею/имел</span>
                        <span class="text-xs text-red-600 mt-1">За мошенничество, незаконное предпринимательство и т.д.</span>
                    </div>
                </label>
            </div>
            
            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-amber-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <p class="text-xs text-amber-800 font-medium">Важно!</p>
                        <p class="text-xs text-amber-700 mt-1">
                            Наличие судимости за экономические преступления может существенно осложнить процедуру банкротства
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
    
    /**
     * Создает форму тестирования
     * 
     * @param array $args Массив параметров формы
     * @return string HTML формы
     */
    public static function create($args = array()) {
        // Настройки по умолчанию
        $defaults = array(
            'id' => self::generate_form_id(),
            'title' => 'Тест на возможность банкротства',
            'subtitle' => 'Ответьте на несколько вопросов, чтобы узнать свои перспективы',
            'submit_text' => 'Получить результат',
            'form_classes' => 'bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden',
            'header_classes' => 'bg-gradient-to-r from-primary to-primary-hover text-white p-6',
            'body_classes' => 'p-6 space-y-8',
            'footer_classes' => 'bg-slate-50 px-6 py-4 border-t border-slate-200',
            'action' => '',
            'method' => 'post',
            'show_progress' => true,
            'ajax_submit' => true
        );
        
        $args = wp_parse_args($args, $defaults);
        $form_id = $args['id'];
        
        ob_start();
        ?>
        <div class="<?php echo esc_attr($args['form_classes']); ?>">
            <!-- Sticky Header -->
            <?php if (!empty($args['title'])): ?>
            <div class="<?php echo esc_attr($args['header_classes']); ?> sticky top-0 z-20 backdrop-blur-sm border-b border-white/10">
                <h2 class="text-2xl font-bold mb-2"><?php echo esc_html($args['title']); ?></h2>
                <?php if (!empty($args['subtitle'])): ?>
                    <p class="text-white/80 text-sm"><?php echo esc_html($args['subtitle']); ?></p>
                <?php endif; ?>
                
                <?php if ($args['show_progress']): ?>
                <!-- Sticky Progress Bar -->
                <div class="mt-4">
                    <div class="flex justify-between text-xs text-white/70 mb-2">
                        <span>Прогресс</span>
                        <span id="<?php echo $form_id; ?>_progress_text">0%</span>
                    </div>
                    <div class="w-full bg-white/20 rounded-full h-2">
                        <div id="<?php echo $form_id; ?>_progress_bar" class="bg-white h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            
            <!-- Form Body -->
            <form id="<?php echo esc_attr($form_id); ?>" 
                  action="<?php echo esc_attr($args['action']); ?>" 
                  method="<?php echo esc_attr($args['method']); ?>"
                  class="<?php echo esc_attr($args['body_classes']); ?>"
                  <?php if ($args['ajax_submit']): ?>data-ajax-form="true"<?php endif; ?>>
                
                <?php wp_nonce_field('udsc_bankruptcy_test', 'bankruptcy_test_nonce'); ?>
                
                <!-- Question 1: Debt Amount -->
                <?php echo self::render_debt_amount_field($form_id); ?>
                
                <!-- Question 2: Property -->
                <?php echo self::render_property_field($form_id); ?>
                
                <!-- Question 3: Transactions -->
                <?php echo self::render_transactions_field($form_id); ?>
                
                <!-- Question 4: Income -->
                <?php echo self::render_income_field($form_id); ?>
                
                <!-- Question 5: Criminal Record -->
                <?php echo self::render_criminal_record_field($form_id); ?>
                
            </form>
            
            <!-- Footer -->
            <div class="<?php echo esc_attr($args['footer_classes']); ?>">
                <div class="flex flex-col sm:flex-row gap-3 sm:justify-between sm:items-center">
                    <p class="text-xs text-slate-500">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Ваши данные защищены и не передаются третьим лицам
                    </p>
                    
                    <button type="submit" 
                            form="<?php echo esc_attr($form_id); ?>"
                            class="inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-primary to-primary-hover rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <?php echo esc_html($args['submit_text']); ?>
                    </button>
                </div>
            </div>
        </div>
        
        <?php if ($args['show_progress'] || $args['ajax_submit']): ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('<?php echo $form_id; ?>');
            const progressBar = document.getElementById('<?php echo $form_id; ?>_progress_bar');
            const progressText = document.getElementById('<?php echo $form_id; ?>_progress_text');
            const stickyHeader = form?.closest('.bg-white')?.querySelector('.sticky');
            
            <?php if ($args['show_progress']): ?>
            // Progress tracking
            function updateProgress() {
                const requiredFields = form.querySelectorAll('[required]');
                const filledFields = Array.from(requiredFields).filter(field => {
                    if (field.type === 'radio') {
                        return form.querySelector(`[name="${field.name}"]:checked`);
                    } else if (field.type === 'checkbox' && field.name === 'property[]') {
                        return form.querySelectorAll('[name="property[]"]:checked').length > 0;
                    } else {
                        return field.value.trim() !== '';
                    }
                });
                
                const progress = Math.round((filledFields.length / requiredFields.length) * 100);
                if (progressBar) {
                    progressBar.style.width = progress + '%';
                    // Add animation classes based on progress
                    if (progress >= 100) {
                        progressBar.classList.add('animate-pulse');
                        progressBar.classList.add('bg-green-400');
                        progressBar.classList.remove('bg-white');
                    } else {
                        progressBar.classList.remove('animate-pulse', 'bg-green-400');
                        progressBar.classList.add('bg-white');
                    }
                }
                if (progressText) {
                    progressText.textContent = progress + '%';
                    if (progress >= 100) {
                        progressText.innerHTML = '✓ Готово';
                    }
                }
            }
            
            // Attach progress tracking to form changes
            form.addEventListener('input', updateProgress);
            form.addEventListener('change', updateProgress);
            updateProgress(); // Initial call
            
            // Enhanced sticky header effect
            if (stickyHeader) {
                let isSticky = false;
                const observer = new IntersectionObserver(
                    ([entry]) => {
                        if (!entry.isIntersecting && !isSticky) {
                            isSticky = true;
                            stickyHeader.classList.add('shadow-lg', 'bg-gradient-to-r/95');
                        } else if (entry.isIntersecting && isSticky) {
                            isSticky = false;
                            stickyHeader.classList.remove('shadow-lg', 'bg-gradient-to-r/95');
                        }
                    },
                    { threshold: 0, rootMargin: '-1px 0px 0px 0px' }
                );
                
                observer.observe(stickyHeader);
            }
            <?php endif; ?>
            
            <?php if ($args['ajax_submit']): ?>
            // Ajax form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                
                // Show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<svg class="animate-spin w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Анализируем данные...';
                
                // Get form data
                const formData = new FormData(form);
                
                // TODO: Replace with actual endpoint
                fetch('/wp-admin/admin-ajax.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Show results (placeholder)
                    alert('Спасибо за прохождение теста! Результаты будут отправлены на вашу почту.');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Произошла ошибка. Пожалуйста, попробуйте еще раз.');
                })
                .finally(() => {
                    // Reset button
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                });
            });
            <?php endif; ?>
        });
        </script>
        <?php endif; ?>
        <?php
        
        return ob_get_clean();
    }
    
    /**
     * Создает упрощенную форму тестирования
     * 
     * @param string $id ID формы
     * @param string $title Заголовок формы
     * @return string HTML формы
     */
    public static function simple($id = '', $title = 'Тест на банкротство') {
        return self::create(array(
            'id' => !empty($id) ? $id : self::generate_form_id(),
            'title' => $title
        ));
    }
}
