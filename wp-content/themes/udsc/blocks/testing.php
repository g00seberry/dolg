<?php
/**
 * Test Section Block Template
 * Блок для тестирования банкротства через МФЦ
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$heading = get_field('test_heading') ?: 'Возможно, вам подойдёт банкротство через МФЦ?';
$description = get_field('test_description') ?: 'В законе №127-ФЗ «О банкротстве» внесены изменения (№289-ФЗ от 31.07.2020), которые позволяют физлицам воспользоваться бесплатной внесудебной процедурой банкротства через МФЦ. Новые изменения помогают государству разгрузить суды и сделать процесс списания долгов проще и дешевле для граждан.';
$test_link = get_field('test_link') ?: '#test-form';
?>

<!-- Test Section -->
<section class="section bg-background">
    <div class="container">
        <div class="relative bg-gradient-to-br from-muted/20 to-muted/40 rounded-2xl p-8 lg:p-12 overflow-hidden">
            
            <!-- Decorative shields -->
            <div class="absolute inset-0 pointer-events-none overflow-hidden">
                <?php for ($i = 0; $i < 8; $i++): 
                    $top = rand(10, 90);
                    $left = rand(10, 90);
                    $rotation = rand(0, 360);
                    $scale = (rand(50, 100) / 100);
                    $size = rand(24, 40);
                    $animation = ($i % 2 === 0) ? 'animate-pulse' : 'animate-bounce';
                    $delay = $i * 0.5;
                    $duration = 3 + (rand(0, 200) / 100);
                ?>
                    <div class="absolute text-primary/10 <?php echo $animation; ?>" 
                         style="top: <?php echo $top; ?>%; left: <?php echo $left; ?>%; transform: rotate(<?php echo $rotation; ?>deg) scale(<?php echo $scale; ?>); animation-delay: <?php echo $delay; ?>s; animation-duration: <?php echo $duration; ?>s;">
                        <svg width="<?php echo $size; ?>" height="<?php echo $size; ?>" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>
                        </svg>
                    </div>
                <?php endfor; ?>
            </div>
            
            <!-- Main content grid -->
            <div class="grid lg:grid-cols-2 gap-8 items-center relative z-10">
                <!-- Left column - Content -->
                <div>
                    <h2 class="text-2xl lg:text-3xl font-bold mb-6">
                        <?php echo esc_html($heading); ?>
                    </h2>
                    
                    <p class="text-muted-foreground mb-6 leading-relaxed">
                        В <a href="/blog/fz127" class="text-primary hover:underline">законе №127-ФЗ «О банкротстве»</a> внесены 
                        изменения (<a href="/blog/fz289" class="text-primary hover:underline">№289-ФЗ от 31.07.2020</a>), 
                        которые позволяют физлицам воспользоваться бесплатной внесудебной процедурой банкротства через МФЦ. 
                        Новые изменения помогают государству разгрузить суды и сделать процесс списания долгов проще и дешевле для граждан.
                    </p>

                    <!-- Button and description -->
                    <div class="flex flex-col sm:flex-row gap-4 items-start">
                        <a href="<?php echo esc_url($test_link); ?>" 
                           class="inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                            Начать тест
                        </a>
                        <p class="text-sm text-muted-foreground">
                            Пройдите тест из 5 вопросов и узнайте, подходит ли вам эта процедура по списанию долгов
                        </p>
                    </div>
                </div>
                
                <!-- Right column - 3D Arrow -->
                <div class="flex justify-center lg:justify-end">
                    <div class="relative">
                        <!-- 3D Arrow with question mark -->
                        <div class="relative transform rotate-12 hover:rotate-6 transition-transform duration-300">
                            <div class="w-32 h-32 lg:w-40 lg:h-40">
                                <!-- Arrow shaft -->
                                <div class="absolute bottom-0 left-1/2 w-8 h-24 bg-gradient-to-t from-orange-400 to-orange-300 rounded-full transform -translate-x-1/2 shadow-lg"></div>
                                <!-- Arrow head -->
                                <div class="absolute top-0 left-1/2 w-0 h-0 transform -translate-x-1/2 border-l-[20px] border-r-[20px] border-b-[24px] border-l-transparent border-r-transparent border-b-red-500 shadow-lg"></div>
                                <!-- Question mark circle -->
                                <div class="absolute bottom-2 right-2 w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg transform rotate-12">
                                    ?
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
