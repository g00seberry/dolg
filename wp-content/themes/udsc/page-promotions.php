<?php
/**
 * Template Name: Акции
 * 
 * Шаблон страницы акций и скидок
 * 
 * @package udsc
 * @since 1.0.0
 */

get_header(); ?>

<main class="main-content">
    <div class="min-h-screen bg-gradient-to-br from-background via-slate-50 to-slate-100">
        <!-- Background decorations with gift shields -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 right-10 w-32 h-32 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-10 w-40 h-40 bg-green-500/5 rounded-full blur-3xl"></div>
            
            <!-- Gift Shield decorations - Multiple sizes and positions -->
            <div class="absolute top-32 left-20 w-24 h-24 opacity-8 rotate-12">
                <svg viewBox="0 0 200 200" class="w-full h-full">
                    <path 
                        d="M100 20 C80 20, 40 35, 40 55 C40 100, 60 140, 100 180 C140 140, 160 100, 160 55 C160 35, 120 20, 100 20 Z" 
                        fill="hsl(142, 76%, 36%)"
                    />
                </svg>
                <div class="absolute inset-0 flex items-center justify-center">
                    <svg class="h-8 w-8 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                    </svg>
                </div>
            </div>
            
            <div class="absolute top-80 right-32 w-16 h-16 opacity-6 -rotate-6">
                <svg viewBox="0 0 200 200" class="w-full h-full">
                    <path 
                        d="M100 20 C80 20, 40 35, 40 55 C40 100, 60 140, 100 180 C140 140, 160 100, 160 55 C160 35, 120 20, 100 20 Z" 
                        fill="hsl(var(--primary))"
                    />
                </svg>
                <div class="absolute inset-0 flex items-center justify-center">
                    <svg class="h-6 w-6 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                    </svg>
                </div>
            </div>
            
            <div class="absolute bottom-40 left-40 w-20 h-20 opacity-7 rotate-45">
                <svg viewBox="0 0 200 200" class="w-full h-full">
                    <path 
                        d="M100 20 C80 20, 40 35, 40 55 C40 100, 60 140, 100 180 C140 140, 160 100, 160 55 C160 35, 120 20, 100 20 Z" 
                        fill="hsl(45, 93%, 47%)"
                    />
                </svg>
                <div class="absolute inset-0 flex items-center justify-center">
                    <svg class="h-7 w-7 text-white/75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="relative">
            <div class="container mx-auto px-4 py-16">
                <!-- Header Section -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-medium mb-6">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                        </svg>
                        Специальные предложения
                    </div>
                    <h1 class="text-4xl lg:text-5xl font-bold mb-6 text-slate-800">
                        Акции и скидки на услуги банкротства
                    </h1>
                    <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
                        Воспользуйтесь нашими специальными предложениями и получите профессиональную 
                        помощь в банкротстве по выгодным ценам
                    </p>
                </div>

                <!-- Promotions Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                    <!-- Promotion 1: Free Consultation -->
                    <div class="relative overflow-hidden transition-all duration-300 hover:shadow-xl ring-2 ring-primary shadow-lg scale-105 bg-white rounded-lg border border-slate-200">
                        <div class="absolute top-0 right-0 bg-primary text-white px-3 py-1 text-xs font-semibold rounded-bl-lg">
                            Популярное
                        </div>
                        
                        <div class="p-6">
                            <!-- Icon and discount -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="bg-primary/10 text-primary p-3 rounded-lg">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                                    </svg>
                                </div>
                                <div class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm font-bold">
                                    -100%
                                </div>
                            </div>

                            <!-- Title and description -->
                            <h3 class="text-xl font-semibold mb-3 text-slate-800">Бесплатная консультация</h3>
                            <p class="text-slate-600 mb-4 leading-relaxed">
                                Получите профессиональную консультацию по банкротству совершенно бесплатно
                            </p>

                            <!-- Price -->
                            <div class="mb-4">
                                <div class="text-sm text-slate-500 line-through mb-1">
                                    3 000 ₽
                                </div>
                                <div class="text-2xl font-bold text-primary">
                                    0 ₽
                                </div>
                            </div>

                            <!-- Validity -->
                            <div class="flex items-center gap-2 text-sm text-slate-500 mb-4">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Действует до: 31.12.2025</span>
                            </div>

                            <!-- Conditions -->
                            <div class="mb-6">
                                <h4 class="font-semibold mb-3 text-sm text-slate-800">Условия акции:</h4>
                                <ul class="space-y-2">
                                    <li class="flex items-start gap-2 text-sm text-slate-600">
                                        <svg class="h-4 w-4 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Первичная консультация длительностью до 1 часа</span>
                                    </li>
                                    <li class="flex items-start gap-2 text-sm text-slate-600">
                                        <svg class="h-4 w-4 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Анализ документов и ситуации</span>
                                    </li>
                                    <li class="flex items-start gap-2 text-sm text-slate-600">
                                        <svg class="h-4 w-4 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Рекомендации по дальнейшим действиям</span>
                                    </li>
                                    <li class="flex items-start gap-2 text-sm text-slate-600">
                                        <svg class="h-4 w-4 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Расчет стоимости услуг</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- CTA Button -->
                            <a href="/contacts" class="w-full inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white bg-primary hover:bg-primary/90 rounded-lg transition-colors">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Получить предложение
                            </a>
                        </div>
                    </div>

                    <!-- Promotion 2: Complex Service Discount -->
                    <div class="relative overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 bg-white rounded-lg border border-slate-200">
                        <div class="p-6">
                            <!-- Icon and discount -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="bg-primary/10 text-primary p-3 rounded-lg">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <div class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm font-bold">
                                    -15%
                                </div>
                            </div>

                            <!-- Title and description -->
                            <h3 class="text-xl font-semibold mb-3 text-slate-800">Скидка на комплексное сопровождение</h3>
                            <p class="text-slate-600 mb-4 leading-relaxed">
                                При заключении договора на полное сопровождение банкротства
                            </p>

                            <!-- Price -->
                            <div class="mb-4">
                                <div class="text-sm text-slate-500 line-through mb-1">
                                    80 000 ₽
                                </div>
                                <div class="text-2xl font-bold text-primary">
                                    68 000 ₽
                                </div>
                            </div>

                            <!-- Validity -->
                            <div class="flex items-center gap-2 text-sm text-slate-500 mb-4">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Действует до: 30.11.2025</span>
                            </div>

                            <!-- Conditions -->
                            <div class="mb-6">
                                <h4 class="font-semibold mb-3 text-sm text-slate-800">Условия акции:</h4>
                                <ul class="space-y-2">
                                    <li class="flex items-start gap-2 text-sm text-slate-600">
                                        <svg class="h-4 w-4 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Полное ведение дела от подачи заявления до завершения</span>
                                    </li>
                                    <li class="flex items-start gap-2 text-sm text-slate-600">
                                        <svg class="h-4 w-4 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Представительство в суде</span>
                                    </li>
                                    <li class="flex items-start gap-2 text-sm text-slate-600">
                                        <svg class="h-4 w-4 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Подготовка всех документов</span>
                                    </li>
                                    <li class="flex items-start gap-2 text-sm text-slate-600">
                                        <svg class="h-4 w-4 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Взаимодействие с управляющим</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- CTA Button -->
                            <a href="/contacts" class="w-full inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white bg-primary hover:bg-primary/90 rounded-lg transition-colors">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Получить предложение
                            </a>
                        </div>
                    </div>

                    <!-- Promotion 3: Installment Plan -->
                    <div class="relative overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 bg-white rounded-lg border border-slate-200">
                        <div class="p-6">
                            <!-- Icon and discount -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="bg-primary/10 text-primary p-3 rounded-lg">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm font-bold">
                                    Рассрочка
                                </div>
                            </div>

                            <!-- Title and description -->
                            <h3 class="text-xl font-semibold mb-3 text-slate-800">Рассрочка без переплат</h3>
                            <p class="text-slate-600 mb-4 leading-relaxed">
                                Оплачивайте услуги частями без процентов и комиссий
                            </p>

                            <!-- Price -->
                            <div class="mb-4">
                                <div class="text-sm text-slate-500 mb-1">
                                    От 50 000 ₽
                                </div>
                                <div class="text-2xl font-bold text-primary">
                                    От 8 333 ₽/мес
                                </div>
                            </div>

                            <!-- Validity -->
                            <div class="flex items-center gap-2 text-sm text-slate-500 mb-4">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Действует: Постоянно</span>
                            </div>

                            <!-- Conditions -->
                            <div class="mb-6">
                                <h4 class="font-semibold mb-3 text-sm text-slate-800">Условия акции:</h4>
                                <ul class="space-y-2">
                                    <li class="flex items-start gap-2 text-sm text-slate-600">
                                        <svg class="h-4 w-4 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Рассрочка до 6 месяцев</span>
                                    </li>
                                    <li class="flex items-start gap-2 text-sm text-slate-600">
                                        <svg class="h-4 w-4 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Без первоначального взноса</span>
                                    </li>
                                    <li class="flex items-start gap-2 text-sm text-slate-600">
                                        <svg class="h-4 w-4 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Без скрытых комиссий</span>
                                    </li>
                                    <li class="flex items-start gap-2 text-sm text-slate-600">
                                        <svg class="h-4 w-4 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Гибкий график платежей</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- CTA Button -->
                            <a href="/contacts" class="w-full inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white bg-primary hover:bg-primary/90 rounded-lg transition-colors">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Получить предложение
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Additional Info Section -->
                <div class="grid md:grid-cols-2 gap-8 mb-16">
                    <div class="p-8 bg-white rounded-lg border border-slate-200">
                        <div class="text-center">
                            <div class="bg-primary/10 text-primary p-4 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold mb-3 text-slate-800">Более 1000 клиентов</h3>
                            <p class="text-slate-600">
                                Уже воспользовались нашими акциями и получили качественную помощь в банкротстве
                            </p>
                        </div>
                    </div>

                    <div class="p-8 bg-white rounded-lg border border-slate-200">
                        <div class="text-center">
                            <div class="bg-green-100 text-green-700 p-4 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold mb-3 text-slate-800">Гарантия результата</h3>
                            <p class="text-slate-600">
                                Даем гарантию на все наши услуги и обеспечиваем полное сопровождение процедуры
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="bg-gradient-to-br from-primary/5 to-primary/10 border border-primary/20 p-8 text-center rounded-lg">
                    <div class="max-w-2xl mx-auto">
                        <div class="bg-primary/20 text-primary p-4 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold mb-4 text-slate-800">Готовы начать процедуру банкротства?</h2>
                        <p class="text-lg text-slate-600 mb-6">
                            Свяжитесь с нами прямо сейчас и получите персональное предложение с максимальными скидками
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="/contacts" class="inline-flex items-center justify-center px-8 py-4 text-sm font-semibold text-white bg-primary hover:bg-primary/90 rounded-lg transition-colors">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Получить консультацию
                            </a>
                            <a href="/services" class="inline-flex items-center justify-center px-8 py-4 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition-colors">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Посмотреть услуги
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
