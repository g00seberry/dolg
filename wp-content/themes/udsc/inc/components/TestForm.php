<?php
/**
 * Simple Test Form Component for UDSC Theme
 * 
 * Упрощенный компонент формы тестирования для определения возможности банкротства
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
     * Генерирует уникальный ID для формы
     */
    private static function generate_form_id() {
        self::$form_counter++;
        return 'bankruptcy-test-form-' . self::$form_counter;
    }
    
    /**
     * Создает основную форму тестирования
     * 
     * @param string $id ID формы
     * @param string $title Заголовок формы
     * @return string HTML формы
     */
    public static function create($id = '', $title = 'Тест на возможность банкротства') {
        if (empty($id)) {
            $id = self::generate_form_id();
        }
        
        ob_start();
        ?>
        <!-- Sticky Header -->
        <div class="bg-gradient-to-r from-primary to-primary-hover text-white p-6 rounded-t-xl sticky top-0 z-50 shadow-lg transition-all duration-300" id="<?php echo esc_attr($id); ?>_header">
            <h2 class="text-2xl font-bold mb-2"><?php echo esc_html($title); ?></h2>
            <p class="text-white/80 text-sm mb-4">Ответьте на несколько вопросов, чтобы узнать свои перспективы</p>
            
            <!-- Progress Bar -->
            <div class="flex justify-between text-xs text-white/70 mb-2">
                <span>Прогресс</span>
                <span id="<?php echo esc_attr($id); ?>_progress">0%</span>
            </div>
            <div class="w-full bg-white/20 rounded-full h-2">
                <div id="<?php echo esc_attr($id); ?>_bar" class="bg-white h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
            </div>
        </div>
        
        <!-- Form Container -->
        <div class="bg-white rounded-b-xl shadow-lg border border-slate-200 border-t-0">
            <form id="<?php echo esc_attr($id); ?>" class="p-6 space-y-8" method="post" action="">
                <?php wp_nonce_field('udsc_bankruptcy_test', 'bankruptcy_test_nonce'); ?>
                
                <!-- Question 1: Debt Amount -->
                <div class="space-y-3">
                    <label class="block">
                        <span class="text-sm font-semibold text-slate-700 mb-2 block">
                            1. Общая сумма долгов в рублях без учета пеней и штрафов <span class="text-red-500">*</span>
                        </span>
                        <div class="relative">
                            <input type="number" 
                                   name="debt_amount" 
                                   required
                                   min="0" 
                                   placeholder="Введите сумму"
                                   class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <span class="text-slate-400 text-sm">₽</span>
                            </div>
                        </div>
                        <p class="mt-1 text-xs text-slate-500">Укажите общую сумму задолженности по всем обязательствам</p>
                    </label>
                </div>
                
                <!-- Question 2: Property -->
                <div class="space-y-3">
                    <span class="block text-sm font-semibold text-slate-700 mb-3">
                        2. Каким имуществом вы владеете? <span class="text-red-500">*</span>
                    </span>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <?php
                        $property_options = array(
                            'apartment' => 'Квартира',
                            'house' => 'Дом/дача', 
                            'car' => 'Автомобиль',
                            'land' => 'Земельный участок',
                            'business' => 'Доля в бизнесе',
                            'other' => 'Другое имущество',
                            'none' => 'Не владею имуществом'
                        );
                        
                        foreach ($property_options as $value => $label): ?>
                        <label class="flex items-center space-x-3 p-3 rounded-lg border border-slate-200 hover:border-primary/50 hover:bg-primary/5 transition-all cursor-pointer">
                            <input type="checkbox" 
                                   name="property[]" 
                                   value="<?php echo esc_attr($value); ?>"
                                   class="h-4 w-4 text-primary border-slate-300 rounded focus:ring-primary">
                            <span class="text-sm text-slate-700"><?php echo esc_html($label); ?></span>
                        </label>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Mortgage checkbox -->
                    <div class="mt-4">
                        <label class="flex items-start space-x-3 p-3 rounded-lg border-2 border-dashed border-amber-300 bg-amber-50 cursor-pointer">
                            <input type="checkbox" 
                                   name="has_mortgage" 
                                   value="1"
                                   class="mt-0.5 h-4 w-4 text-amber-600 border-amber-300 rounded">
                            <div>
                                <span class="text-sm font-medium text-amber-800 block">У меня есть ипотечная квартира</span>
                                <span class="text-xs text-amber-600">Отметьте, если у вас есть квартира в ипотеке</span>
                            </div>
                        </label>
                    </div>
                </div>
                
                <!-- Question 3: Transactions -->
                <div class="space-y-3">
                    <label class="block">
                        <span class="text-sm font-semibold text-slate-700 mb-2 block">
                            3. Какие сделки с имуществом вы совершали за последние 3 года? <span class="text-red-500">*</span>
                        </span>
                        <textarea name="transactions" 
                                  required
                                  rows="4" 
                                  placeholder="Опишите все сделки: продажа, покупка, дарение, обмен имущества..."
                                  class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors resize-y"></textarea>
                        <p class="mt-1 text-xs text-slate-500">Укажите все операции с недвижимостью, автомобилями и другим имуществом</p>
                    </label>
                    
                    <!-- Quick templates -->
                    <div class="flex gap-2 flex-wrap">
                        <button type="button" 
                                onclick="this.form.transactions.value = 'Сделок с имуществом не совершал'"
                                class="px-3 py-1 text-xs bg-slate-100 hover:bg-slate-200 rounded-md transition-colors">
                            Сделок не было
                        </button>
                        <button type="button" 
                                onclick="this.form.transactions.value = 'Продал автомобиль в '"
                                class="px-3 py-1 text-xs bg-slate-100 hover:bg-slate-200 rounded-md transition-colors">
                            Продал авто
                        </button>
                    </div>
                </div>
                
                <!-- Question 4: Income -->
                <div class="space-y-3">
                    <span class="block text-sm font-semibold text-slate-700 mb-3">
                        4. Есть ли доход после вычета прожиточного минимума? <span class="text-red-500">*</span>
                    </span>
                    
                    <div class="space-y-2">
                        <label class="flex items-center space-x-3 p-3 rounded-lg border border-slate-200 hover:border-green-500 hover:bg-green-50 transition-all cursor-pointer">
                            <input type="radio" name="has_income" value="no" required class="h-4 w-4 text-green-600">
                            <span class="text-sm text-slate-700">Нет, дохода нет</span>
                        </label>
                        
                        <label class="flex items-center space-x-3 p-3 rounded-lg border border-slate-200 hover:border-orange-500 hover:bg-orange-50 transition-all cursor-pointer">
                            <input type="radio" name="has_income" value="small" required class="h-4 w-4 text-orange-600">
                            <span class="text-sm text-slate-700">Есть небольшой доход</span>
                        </label>
                        
                        <label class="flex items-center space-x-3 p-3 rounded-lg border border-slate-200 hover:border-red-500 hover:bg-red-50 transition-all cursor-pointer">
                            <input type="radio" name="has_income" value="significant" required class="h-4 w-4 text-red-600">
                            <span class="text-sm text-slate-700">Есть значительный доход</span>
                        </label>
                    </div>
                </div>
                
                <!-- Question 5: Criminal Record -->
                <div class="space-y-3">
                    <span class="block text-sm font-semibold text-slate-700 mb-3">
                        5. Имели ли вы судимость за экономические преступления? <span class="text-red-500">*</span>
                    </span>
                    
                    <div class="space-y-2">
                        <label class="flex items-center space-x-3 p-3 rounded-lg border border-slate-200 hover:border-green-500 hover:bg-green-50 transition-all cursor-pointer">
                            <input type="radio" name="criminal_record" value="no" required class="h-4 w-4 text-green-600">
                            <span class="text-sm text-slate-700">Нет, судимости не было</span>
                        </label>
                        
                        <label class="flex items-center space-x-3 p-3 rounded-lg border-2 border-red-200 bg-red-50 cursor-pointer">
                            <input type="radio" name="criminal_record" value="yes" required class="h-4 w-4 text-red-600">
                            <span class="text-sm text-red-800">Да, имею/имел судимость</span>
                        </label>
                    </div>
                    
                    <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                        <div class="flex items-start space-x-2">
                            <svg class="w-5 h-5 text-amber-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="text-xs font-medium text-amber-800">Важно!</p>
                                <p class="text-xs text-amber-700 mt-1">Судимость за экономические преступления может усложнить процедуру банкротства</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </form>
            
            <!-- Footer -->
            <div class="bg-slate-50 px-6 py-4 border-t border-slate-200 rounded-b-xl">
                <div class="flex flex-col sm:flex-row gap-3 sm:justify-between sm:items-center">
                    <p class="text-xs text-slate-500 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Данные защищены и не передаются третьим лицам
                    </p>
                    
                    <button type="submit" 
                            form="<?php echo esc_attr($id); ?>"
                            class="inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-primary to-primary-hover rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Получить результат
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Simple JavaScript -->
        <script>
        (function() {
            const form = document.getElementById('<?php echo esc_attr($id); ?>');
            const progressBar = document.getElementById('<?php echo esc_attr($id); ?>_bar');
            const progressText = document.getElementById('<?php echo esc_attr($id); ?>_progress');
            const header = document.getElementById('<?php echo esc_attr($id); ?>_header');
            
            if (!form || !progressBar || !progressText) return;
            
            // Progress tracking
            function updateProgress() {
                // Manually count the 5 questions instead of relying on [required] fields
                let filledCount = 0;
                
                // Question 1: Debt amount
                const debtAmount = form.querySelector('[name="debt_amount"]');
                if (debtAmount && debtAmount.value.trim()) filledCount++;
                
                // Question 2: Property (any checkbox checked)
                const propertyCheckboxes = form.querySelectorAll('[name="property[]"]:checked');
                if (propertyCheckboxes.length > 0) filledCount++;
                
                // Question 3: Transactions
                const transactions = form.querySelector('[name="transactions"]');
                if (transactions && transactions.value.trim()) filledCount++;
                
                // Question 4: Income (radio button checked)
                const income = form.querySelector('[name="has_income"]:checked');
                if (income) filledCount++;
                
                // Question 5: Criminal record (radio button checked)
                const criminalRecord = form.querySelector('[name="criminal_record"]:checked');
                if (criminalRecord) filledCount++;
                
                // Total questions = 5
                const totalQuestions = 5;
                
                const progress = Math.round((filledCount / totalQuestions) * 100);
                progressBar.style.width = progress + '%';
                progressText.textContent = progress + '%';
                
                if (progress >= 100) {
                    progressBar.classList.add('bg-green-400');
                    progressText.textContent = '✓ Готово';
                } else {
                    progressBar.classList.remove('bg-green-400');
                }
            }
            
            // Sticky header effect
            let originalTop = header.offsetTop;
            function handleScroll() {
                const scrollTop = window.pageYOffset;
                if (scrollTop >= originalTop) {
                    header.classList.add('shadow-2xl');
                } else {
                    header.classList.remove('shadow-2xl');
                }
            }
            
            // Event listeners
            form.addEventListener('input', updateProgress);
            form.addEventListener('change', updateProgress);
            window.addEventListener('scroll', handleScroll);
            
            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const submitBtn = document.querySelector('button[form="<?php echo esc_attr($id); ?>"]') || 
                                document.querySelector('#<?php echo esc_attr($id); ?> button[type="submit"]');
                
                if (!submitBtn) return;
                
                const originalText = submitBtn.innerHTML;
                
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<svg class="animate-spin w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Анализируем...';
                
                // Simulate processing
                setTimeout(() => {
                    alert('Спасибо за прохождение теста! Свяжемся с вами в ближайшее время.');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }, 2000);
            });
            
            // Initial calls
            updateProgress();
            handleScroll();
        })();
        </script>
        <?php
        
        return ob_get_clean();
    }
    
    /**
     * Alias для простого создания формы
     */
    public static function simple($id = '', $title = 'Определите возможность банкротства') {
        return self::create($id, $title);
    }
}