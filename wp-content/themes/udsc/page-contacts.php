<?php
/**
 * Template Name: Контакты
 * 
 * Шаблон страницы контактов с формой обратной связи
 * 
 * @package udsc
 * @since 1.0.0
 */

get_header(); ?>

<main class="main-content">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl lg:text-5xl font-bold mb-6 text-slate-800">
                Контакты
            </h1>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                Свяжитесь с нами любым удобным способом. Мы всегда готовы помочь 
                в решении ваших долговых проблем.
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div>
                <h2 class="text-2xl font-semibold mb-8 text-slate-800">
                    Как с нами связаться
                </h2>
                
                <div class="space-y-6 mb-8">
                    <!-- Phone -->
                    <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
                        <div class="flex items-start gap-4">
                            <svg class="h-6 w-6 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <div>
                                <h3 class="font-semibold mb-1 text-slate-800">Телефон</h3>
                                <p class="text-lg mb-1 text-slate-700"><?php echo esc_html(udsc_get_contact_phone()); ?></p>
                                <p class="text-sm text-slate-500">Звонок по России бесплатный</p>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
                        <div class="flex items-start gap-4">
                            <svg class="h-6 w-6 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <h3 class="font-semibold mb-1 text-slate-800">Email</h3>
                                <p class="text-lg mb-1 text-slate-700"><?php echo esc_html(udsc_get_contact_email()); ?></p>
                                <p class="text-sm text-slate-500">Ответим в течение часа</p>
                            </div>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
                        <div class="flex items-start gap-4">
                            <svg class="h-6 w-6 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div>
                                <h3 class="font-semibold mb-1 text-slate-800">Адрес офиса</h3>
                                <p class="text-lg mb-1 text-slate-700"><?php echo esc_html(udsc_get_contact_address()); ?></p>
                                <p class="text-sm text-slate-500">Метро "Площадь Революции"</p>
                            </div>
                        </div>
                    </div>

                    <!-- Working Hours -->
                    <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
                        <div class="flex items-start gap-4">
                            <svg class="h-6 w-6 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <h3 class="font-semibold mb-1 text-slate-800">Режим работы</h3>
                                <p class="text-lg mb-1 text-slate-700"><?php echo esc_html(udsc_get_contact_hours()); ?></p>
                                <p class="text-sm text-slate-500">Воскресенье - выходной</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Emergency Contact -->
                <div class="bg-gradient-to-r from-primary/10 to-primary/5 border border-primary/20 rounded-xl p-6 mb-8">
                    <div class="flex items-start gap-4">
                        <svg class="h-6 w-6 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        <div>
                            <h3 class="font-semibold mb-1 text-slate-800">Экстренная помощь</h3>
                            <p class="text-lg mb-1 text-slate-700"><?php echo esc_html(udsc_get_contact_phone()); ?></p>
                            <p class="text-sm text-slate-500">
                                Круглосуточная линия для срочных случаев
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Office Hours -->
                <div class="bg-slate-50 rounded-lg p-6">
                    <h3 class="font-semibold mb-4 text-slate-800">Время для визитов</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-600">Понедельник - Пятница</span>
                            <span class="text-slate-800 font-medium">9:00 - 18:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-600">Суббота</span>
                            <span class="text-slate-800 font-medium">10:00 - 16:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-600">Воскресенье</span>
                            <span class="text-slate-800 font-medium">Выходной</span>
                        </div>
                    </div>
                    <p class="text-xs text-slate-500 mt-4">
                        * Прием только по предварительной записи
                    </p>
                </div>
            </div>

            <!-- Contact Form -->
            <div>
                <?php echo UDSC_ContactForm::create(); ?>
            </div>
        </div>

        <!-- Map Section -->
        <div class="mt-16">
            <h2 class="text-2xl font-semibold mb-8 text-center text-slate-800">
                Наш офис на карте
            </h2>
            <div class="bg-slate-50 rounded-lg p-8 text-center">
                <svg class="h-16 w-16 text-primary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <h3 class="text-xl font-semibold mb-2 text-slate-800">
                    <?php echo esc_html(udsc_get_contact_address()); ?>
                </h3>
                <p class="text-slate-600 mb-4">
                    Метро "Площадь Революции", выход к Красной площади
                </p>
                <a href="https://yandex.ru/maps/?pt=37.620070,55.753630&z=16&l=map" 
                   target="_blank" 
                   class="inline-flex items-center px-4 py-2 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition-colors">
                    Построить маршрут
                </a>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
