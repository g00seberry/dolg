<?php
/**
 * Lead Capture Form Block Template
 * Секция с формой заявки на консультацию
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$form_title = get_field('form_title') ?: 'Оставьте заявку на бесплатную консультацию';
$form_description = get_field('form_description') ?: 'Узнайте, как законно списать долги и избавиться от давления кредиторов';
$form_action = get_field('form_action') ?: '#';
$privacy_link = get_field('privacy_link') ?: '/privacy';

// Список городов
$cities = [
    'moscow' => 'Москва',
    'spb' => 'Санкт-Петербург',
    'ekaterinburg' => 'Екатеринбург',
    'novosibirsk' => 'Новосибирск',
    'kazan' => 'Казань',
    'nizhniy' => 'Нижний Новгород',
    'chelyabinsk' => 'Челябинск',
    'samara' => 'Самара',
    'omsk' => 'Омск',
    'rostov' => 'Ростов-на-Дону',
    'ufa' => 'Уфа',
    'volgograd' => 'Волгоград',
    'perm' => 'Пермь',
    'voronezh' => 'Воронеж',
    'other' => 'Другой город'
];
?>

<!-- Lead Capture Form Section -->
<section class="section bg-gradient-to-br from-primary/5 via-background to-muted/10">
    <div class="container">
        <div class="max-w-2xl mx-auto">
            <!-- Form Card -->
            <div class="bg-card rounded-lg border p-8">
                <!-- Form Header -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold mb-4 text-foreground">
                        <?php echo esc_html($form_title); ?>
                    </h2>
                    <p class="text-lg text-muted-foreground">
                        <?php echo esc_html($form_description); ?>
                    </p>
                </div>

                <!-- Lead Capture Form -->
                <form action="<?php echo esc_url($form_action); ?>" method="POST" class="space-y-6" id="lead-capture-form">
                    <!-- Full Name Field -->
                    <div>
                        <input type="text" 
                               name="fullName" 
                               id="fullName"
                               placeholder="Фамилия, имя и отчество"
                               required
                               class="w-full h-12 px-4 py-3 border border-input rounded-lg bg-background text-foreground placeholder:text-muted-foreground focus:ring-2 focus:ring-ring focus:border-transparent transition-colors">
                    </div>
                    
                    <!-- Phone Field -->
                    <div>
                        <div class="flex">
                            <div class="flex items-center px-3 py-2 border border-r-0 border-input bg-muted rounded-l-md">
                                <span class="text-sm mr-2">🇷🇺</span>
                                <span class="text-sm">+7</span>
                            </div>
                            <input type="tel" 
                                   name="phone" 
                                   id="phone"
                                   placeholder="(000) 000-00-00"
                                   required
                                   class="flex-1 h-12 px-4 py-3 border border-input bg-background text-foreground placeholder:text-muted-foreground focus:ring-2 focus:ring-ring focus:border-transparent transition-colors rounded-l-none rounded-r-lg">
                        </div>
                    </div>

                    <!-- City Select -->
                    <div>
                        <select name="city" 
                                id="city" 
                                required
                                class="w-full h-12 px-4 py-3 border border-input rounded-lg bg-background text-foreground focus:ring-2 focus:ring-ring focus:border-transparent transition-colors">
                            <option value="">Выберите город</option>
                            <?php foreach ($cities as $value => $label): ?>
                                <option value="<?php echo esc_attr($value); ?>">
                                    <?php echo esc_html($label); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <input type="email" 
                               name="email" 
                               id="email"
                               placeholder="Email"
                               required
                               class="w-full h-12 px-4 py-3 border border-input rounded-lg bg-background text-foreground placeholder:text-muted-foreground focus:ring-2 focus:ring-ring focus:border-transparent transition-colors">
                    </div>

                    <!-- Consent Checkboxes -->
                    <div class="space-y-4">
                        <!-- Consent 1 (Required) -->
                        <div class="flex items-start space-x-3">
                            <input type="checkbox" 
                                   name="consent1" 
                                   id="consent1" 
                                   required
                                   class="mt-1 h-4 w-4 text-primary bg-background border-border rounded focus:ring-2 focus:ring-ring focus:ring-offset-2">
                            <label for="consent1" class="text-sm text-foreground/80 leading-relaxed">
                                Я даю <span class="text-primary">согласие</span> на обработку моих персональных данных согласно 
                                <a href="<?php echo esc_url($privacy_link); ?>" class="text-primary hover:underline font-medium">политике</a>
                            </label>
                        </div>

                        <!-- Consent 2 (Optional) -->
                        <div class="flex items-start space-x-3">
                            <input type="checkbox" 
                                   name="consent2" 
                                   id="consent2"
                                   class="mt-1 h-4 w-4 text-primary bg-background border-border rounded focus:ring-2 focus:ring-ring focus:ring-offset-2">
                            <label for="consent2" class="text-sm text-foreground/80 leading-relaxed">
                                Я даю <span class="text-primary">согласие</span> на передачу моих персональных данных третьим лицам
                            </label>
                        </div>

                        <!-- Consent 3 (Optional) -->
                        <div class="flex items-start space-x-3">
                            <input type="checkbox" 
                                   name="consent3" 
                                   id="consent3"
                                   class="mt-1 h-4 w-4 text-primary bg-background border-border rounded focus:ring-2 focus:ring-ring focus:ring-offset-2">
                            <label for="consent3" class="text-sm text-foreground/80 leading-relaxed">
                                Я даю <span class="text-primary">согласие</span> на получение рекламной и информационной рассылки
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full h-14 text-lg font-semibold bg-primary text-primary-foreground hover:bg-primary/90 disabled:bg-muted disabled:text-muted-foreground rounded-lg ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                        <span class="submit-text">Узнать, как списать долги</span>
                        <span class="loading-text hidden">Отправка...</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Basic Form Validation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('lead-capture-form');
    const submitBtn = form.querySelector('button[type="submit"]');
    const submitText = submitBtn.querySelector('.submit-text');
    const loadingText = submitBtn.querySelector('.loading-text');
    
    form.addEventListener('submit', function(e) {
        // Show loading state
        submitBtn.disabled = true;
        submitText.classList.add('hidden');
        loadingText.classList.remove('hidden');
        
        // Here you can add your form submission logic
        // For now, we'll just simulate a loading state
        setTimeout(() => {
            // Reset form state after submission
            submitBtn.disabled = false;
            submitText.classList.remove('hidden');
            loadingText.classList.add('hidden');
            
            // You can add success message or redirect logic here
        }, 2000);
    });
});
</script>
