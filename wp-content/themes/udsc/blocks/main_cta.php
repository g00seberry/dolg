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
<section class="relative bg-gradient-to-br from-gray-50 to-gray-100 py-16 lg:py-24">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-6xl font-bold text-balance mb-6 text-gray-900">
                    <?php echo esc_html($heading); ?>
                </h1>
                <p class="text-xl text-gray-600 mb-8 text-balance leading-relaxed">
                    <?php echo esc_html($description); ?>
                </p>
                
                <!-- Статистика -->
                <div class="grid sm:grid-cols-3 gap-4 mb-8">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600">500+</div>
                        <div class="text-sm text-gray-500">Успешных дел</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600">98%</div>
                        <div class="text-sm text-gray-500">Положительных решений</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600">12</div>
                        <div class="text-sm text-gray-500">Лет опыта</div>
                    </div>
                </div>

                <!-- Кнопки -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="tel:+7-991-004-20-77" 
                       class="inline-flex items-center justify-center px-6 py-3 text-base font-medium text-white bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Бесплатная консультация
                    </a>
                    <a href="#calculator" 
                       class="inline-flex items-center justify-center px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
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