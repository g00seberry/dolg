<?php
/**
 * Main CTA Block Template
 * Hero Section для банкротства физических лиц
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$heading = get_field('heading') ?: 'Банкротство физических лиц';
$description = get_field('description') ?: 'Законное списание долгов и защита от кредиторов. Профессиональное сопровождение процедуры банкротства с гарантией результата.';
$hero_image = get_field('hero_image') ?: get_template_directory_uri() . '/assets/images/hero-image.jpg';
?>

<!-- Hero Section -->
 
<section class="relative bg-gradient-to-br from-background to-subtle py-16 lg:py-24">
    <div class="container">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-6xl font-bold text-balance mb-6">
                    <?php echo esc_html($heading); ?>
                </h1>
                <p class="text-xl text-muted-foreground mb-8 text-balance">
                    <?php echo esc_html($description); ?>
                </p>
                
                <!-- Статистика -->
                <div class="grid sm:grid-cols-3 gap-4 mb-8">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-primary">500+</div>
                        <div class="text-sm text-muted-foreground">Успешных дел</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-primary">98%</div>
                        <div class="text-sm text-muted-foreground">Положительных решений</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-primary">12</div>
                        <div class="text-sm text-muted-foreground">Лет опыта</div>
                    </div>
                </div>

                <!-- Кнопки -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="tel:<?php echo esc_attr(udsc_get_contact_phone()); ?>" 
                       class="inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                        <svg class="mr-2 h-5 w-5 pointer-events-none shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Бесплатная консультация
                    </a>
                    <a href="#calculator" 
                       class="inline-flex items-center justify-center gap-2 whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium border border-input bg-background hover:bg-accent hover:text-accent-foreground ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                        Рассчитать стоимость
                    </a>
                </div>
            </div>
            
            <!-- Изображение -->
            <div class="relative">
                <img src="<?php echo esc_url($hero_image); ?>" 
                     alt="Юридическая консультация по банкротству в офисе"
                     class="rounded-lg shadow-lg w-full h-auto object-cover"
                     loading="lazy">
            </div>
        </div>
    </div>
</section>


<div class="flex justify-center gap-4 flex-wrap">
    <!-- Кастомное модальное окно -->
    <?php echo UDSC_Modal::trigger_button('custom-modal', 'Кастомное окно', 'inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center transition-all duration-300 ease-in text-sm rounded-md py-2 px-4 shadow-sm hover:shadow-md bg-green-600 border-green-600 text-white hover:bg-green-700 hover:border-green-700'); ?>
</div>



<!-- 4. Кастомное модальное окно с формой -->
<?php
$form_content = '
<form class="space-y-4" onsubmit="event.preventDefault(); alert(\'Форма отправлена!\'); document.querySelector(\'[data-dismiss=modal]\').click();">
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1" for="name">Имя</label>
        <input type="text" id="name" name="name" required
               class="w-full px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
    
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1" for="email">Email</label>
        <input type="email" id="email" name="email" required
               class="w-full px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
    
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1" for="message">Сообщение</label>
        <textarea id="message" name="message" rows="4" required
                  class="w-full px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
    </div>
    
    <div class="flex justify-end gap-2 pt-2">
        <button type="button" data-dismiss="modal" 
                class="px-4 py-2 text-slate-600 hover:bg-slate-100 rounded-md transition-colors">
            Отмена
        </button>
        <button type="submit" 
                class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors">
            Отправить
        </button>
    </div>
</form>';

echo UDSC_Modal::create(array(
    'id' => 'custom-modal',
    'title' => 'Обратная связь',
    'content' => $form_content,
    'size' => 'lg',
    'show_footer' => false,
    'body_classes' => 'pt-2',
    'aria_labelledby' => 'custom-modal-title'
));
?>