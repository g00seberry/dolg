<?php
/**
 * Template Name: О нас
 * 
 * Шаблон страницы о компании
 * 
 * @package udsc
 * @since 1.0.0
 */

get_header(); ?>

<main class="main-content">
    <div class="min-h-screen bg-gradient-to-br from-background via-background to-primary/5">
        <!-- Hero Section -->
        <section class="py-20 px-4 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-primary/5 via-transparent to-accent/5 opacity-50"></div>
            
            <!-- Decorative shield background -->
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="w-[768px] h-[768px] opacity-[0.03]">
                    <svg viewBox="0 0 100 100" class="w-full h-full">
                        <path
                            d="M50 10 C30 10, 10 15, 10 25 C10 45, 15 65, 30 75 C40 80, 45 85, 50 85 C55 85, 60 80, 70 75 C85 65, 90 45, 90 25 C90 15, 70 10, 50 10 Z"
                            fill="currentColor"
                            class="text-primary"
                        />
                    </svg>
                </div>
            </div>
            
            <div class="container relative">
                <div class="text-center max-w-4xl mx-auto mb-16">
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium border border-slate-300 bg-white/50 backdrop-blur-sm mb-4">
                        О нашей компании
                    </div>
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 text-slate-800">
                        Финансовый щит
                    </h1>
                    <p class="text-xl text-slate-600 mb-8">
                        8 лет помогаем избавиться от долгов.<br />
                        500+ успешных банкротств.
                    </p>
                </div>

                <!-- Statistics -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                    <div class="p-6 text-center border-2 border-slate-200 rounded-lg hover:border-primary/30 transition-colors bg-white">
                        <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <div class="text-3xl font-bold text-primary mb-2">500+</div>
                        <div class="text-sm text-slate-500">Довольных клиентов</div>
                    </div>

                    <div class="p-6 text-center border-2 border-slate-200 rounded-lg hover:border-primary/30 transition-colors bg-white">
                        <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                            </svg>
                        </div>
                        <div class="text-3xl font-bold text-primary mb-2">8+</div>
                        <div class="text-sm text-slate-500">Лет опыта</div>
                    </div>

                    <div class="p-6 text-center border-2 border-slate-200 rounded-lg hover:border-primary/30 transition-colors bg-white">
                        <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <div class="text-3xl font-bold text-primary mb-2">100%</div>
                        <div class="text-sm text-slate-500">Успешных дел</div>
                    </div>

                    <div class="p-6 text-center border-2 border-slate-200 rounded-lg hover:border-primary/30 transition-colors bg-white">
                        <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <div class="text-3xl font-bold text-primary mb-2">4.9/5</div>
                        <div class="text-sm text-slate-500">Средняя оценка</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mission -->
        <section class="py-16 px-4 bg-slate-50">
            <div class="container">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl font-bold mb-8 text-slate-800">Наша миссия</h2>
                    <p class="text-lg text-slate-600 leading-relaxed mb-8">
                        Мы верим, что каждый человек заслуживает второго шанса. Наша миссия — 
                        помочь людям, попавшим в сложную финансовую ситуацию, законно 
                        освободиться от долгов и вернуться к полноценной жизни без постоянного 
                        стресса и давления кредиторов.
                    </p>
                    <div class="bg-primary/5 rounded-lg p-8 border border-primary/20">
                        <h3 class="text-xl font-semibold mb-4 text-primary">
                            Почему мы занимаемся банкротством?
                        </h3>
                        <p class="text-slate-600">
                            Мы понимаем, что финансовые трудности могут случиться с каждым. 
                            Потеря работы, болезнь, семейные обстоятельства — жизнь непредсказуема. 
                            Наша цель — предоставить профессиональную юридическую помощь тем, 
                            кто нуждается в защите от кредиторов и возможности начать все сначала.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values -->
        <section class="py-16 px-4">
            <div class="container">
                <h2 class="text-3xl font-bold text-center mb-12 text-slate-800">Наши ценности</h2>
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                    <div class="p-6 text-center hover:shadow-lg transition-all duration-300 bg-white rounded-lg border border-slate-200">
                        <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-slate-800">Надежность</h3>
                        <p class="text-slate-600 text-sm">Мы защищаем интересы наших клиентов на всех этапах процедуры банкротства</p>
                    </div>

                    <div class="p-6 text-center hover:shadow-lg transition-all duration-300 bg-white rounded-lg border border-slate-200">
                        <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-slate-800">Человечность</h3>
                        <p class="text-slate-600 text-sm">Понимаем, что финансовые трудности - это стресс. Поддерживаем клиентов морально</p>
                    </div>

                    <div class="p-6 text-center hover:shadow-lg transition-all duration-300 bg-white rounded-lg border border-slate-200">
                        <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-slate-800">Законность</h3>
                        <p class="text-slate-600 text-sm">Все процедуры проводим строго в рамках действующего законодательства</p>
                    </div>

                    <div class="p-6 text-center hover:shadow-lg transition-all duration-300 bg-white rounded-lg border border-slate-200">
                        <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-slate-800">Результативность</h3>
                        <p class="text-slate-600 text-sm">100% наших клиентов успешно завершили процедуру банкротства</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Advantages -->
        <section class="py-16 px-4 bg-slate-50">
            <div class="container">
                <div class="max-w-4xl mx-auto">
                    <h2 class="text-3xl font-bold text-center mb-12 text-slate-800">Почему выбирают нас</h2>
                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="flex items-center gap-3 p-4 bg-white rounded-lg border border-slate-200">
                            <svg class="h-5 w-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-slate-700">Бесплатная первичная консультация</span>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-white rounded-lg border border-slate-200">
                            <svg class="h-5 w-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-slate-700">Полное юридическое сопровождение</span>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-white rounded-lg border border-slate-200">
                            <svg class="h-5 w-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-slate-700">Фиксированная стоимость услуг</span>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-white rounded-lg border border-slate-200">
                            <svg class="h-5 w-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-slate-700">Рассрочка платежа без процентов</span>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-white rounded-lg border border-slate-200">
                            <svg class="h-5 w-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-slate-700">Опыт работы с любыми типами долгов</span>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-white rounded-lg border border-slate-200">
                            <svg class="h-5 w-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-slate-700">Представительство во всех судебных инстанциях</span>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-white rounded-lg border border-slate-200">
                            <svg class="h-5 w-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-slate-700">Защита от действий коллекторов</span>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-white rounded-lg border border-slate-200">
                            <svg class="h-5 w-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-slate-700">Сохранение единственного жилья</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team -->
        <section class="py-16 px-4">
            <div class="container text-center">
                <h2 class="text-3xl font-bold mb-8 text-slate-800">Наша команда</h2>
                <div class="max-w-3xl mx-auto">
                    <div class="p-8 bg-white rounded-lg border border-slate-200">
                        <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="h-12 w-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-slate-800">Профессиональные юристы</h3>
                        <p class="text-slate-600 mb-6">
                            Наша команда состоит из опытных юристов, специализирующихся исключительно 
                            на процедурах банкротства физических лиц. Каждый член команды имеет 
                            высшее юридическое образование и многолетний опыт работы в сфере 
                            финансового права.
                        </p>
                        
                        <!-- Featured Lawyer -->
                        <div class="mb-8 p-6 bg-primary/5 rounded-lg border border-primary/20">
                            <h4 class="text-xl font-semibold mb-2 text-primary">Ведущий специалист</h4>
                            <p class="font-medium text-lg mb-2 text-slate-800">Дмитрий Викторович Бондарчук</p>
                            <p class="text-slate-600 mb-4">
                                Магистр права с отличием, 15+ лет опыта в сфере банкротства, 
                                более 500 успешно завершенных дел
                            </p>
                            <a href="/lawyer" class="inline-flex items-center px-4 py-2 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition-colors">
                                Подробнее о юристе
                            </a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
                            <div>
                                <div class="font-semibold text-primary mb-2">Образование</div>
                                <div class="text-slate-600">Высшее юридическое</div>
                            </div>
                            <div>
                                <div class="font-semibold text-primary mb-2">Специализация</div>
                                <div class="text-slate-600">Банкротство физлиц</div>
                            </div>
                            <div>
                                <div class="font-semibold text-primary mb-2">Опыт</div>
                                <div class="text-slate-600">От 5 лет</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 px-4 bg-slate-100">
            <div class="container text-center">
                <h2 class="text-3xl font-bold mb-6 text-slate-800">Готовы помочь вам прямо сейчас</h2>
                <p class="text-xl text-slate-600 mb-8 max-w-2xl mx-auto">
                    Не откладывайте решение финансовых проблем. Получите бесплатную 
                    консультацию и узнайте, как мы можем помочь именно вам.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-primary text-white hover:bg-primary/90 px-8 py-4 rounded-lg font-medium transition-colors" data-toggle="modal" data-target="#consultation-modal">
                        Бесплатная консультация
                    </button>
                    <a href="/services" class="inline-flex items-center px-8 py-4 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition-colors">
                        Посмотреть услуги
                    </a>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
