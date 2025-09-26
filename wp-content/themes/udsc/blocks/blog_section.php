<?php
/**
 * Blog Section - Финщит Block Template
 * Секция с информацией о блоге и статьях
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$blog_title = get_field('blog_title') ?: 'Финщит - экспертные материалы о банкротстве';
$blog_description = get_field('blog_description') ?: 'Получайте актуальную информацию о банкротстве, изменениях в законодательстве и практические советы от наших экспертов';
$blog_link = get_field('blog_link') ?: '/blog';

// Карточки статей
$article_cards = get_field('article_cards') ?: [
    [
        'title' => 'Актуальные статьи',
        'description' => 'Разбираем сложные вопросы банкротства простым языком. Новые статьи каждую неделю',
        'stat' => 'Более 50 экспертных материалов',
        'icon' => 'file-text',
        'color' => 'primary'
    ],
    [
        'title' => 'Изменения в законах',
        'description' => 'Следим за всеми изменениями в законодательстве и объясняем, как они влияют на ваши права',
        'stat' => 'Еженедельные обновления',
        'icon' => 'scale',
        'color' => 'success'
    ],
    [
        'title' => 'Практические советы',
        'description' => 'Пошаговые инструкции, калькуляторы и чек-листы для самостоятельного изучения вопроса',
        'stat' => 'Более 10 000 просмотров в месяц',
        'icon' => 'calculator',
        'color' => 'warning'
    ]
];

// Популярные темы
$popular_topics = get_field('popular_topics') ?: [
    'ФЗ №127 о банкротстве',
    'Процедуры банкротства',
    'Защита имущества',
    'Работа с кредиторами',
    'Судебная практика',
    'Новости законодательства'
];

// Функция для получения SVG иконки
function get_blog_icon($icon_name) {
    $icons = [
        'book-open' => '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>',
        'file-text' => '<path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/>',
        'trending-up' => '<polyline points="22,7 13.5,15.5 8.5,10.5 2,17"/><polyline points="16,7 22,7 22,13"/>',
        'scale' => '<path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1ZM2 16l3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m7 21 2-4-2-4"/><path d="m17 21-2-4 2-4"/><path d="M14 12h7"/><path d="M3 12h7"/>',
        'check-circle' => '<path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
        'calculator' => '<rect width="16" height="20" x="4" y="2" rx="2"/><line x1="8" x2="16" y1="6" y2="6"/><line x1="16" x2="16" y1="14" y2="18"/><path d="M16 10h.01"/><path d="M12 10h.01"/><path d="M8 10h.01"/><path d="M12 14h.01"/><path d="M8 14h.01"/><path d="M12 18h.01"/><path d="M8 18h.01"/>',
        'eye' => '<path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>'
    ];
    
    return isset($icons[$icon_name]) ? $icons[$icon_name] : $icons['file-text'];
}
?>

<!-- Blog Section - Финщит -->
<section class="section">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <!-- Blog Badge -->
            <div class="inline-flex items-center gap-2 bg-primary/10 text-primary px-4 py-2 rounded-full text-sm font-medium mb-6">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <?php echo get_blog_icon('book-open'); ?>
                </svg>
                Наш блог
            </div>
            
            <!-- Title & Description -->
            <h2 class="text-3xl lg:text-4xl font-bold mb-4">
                <?php echo esc_html($blog_title); ?>
            </h2>
            <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
                <?php echo esc_html($blog_description); ?>
            </p>
        </div>

        <!-- Article Cards Grid -->
        <div class="grid md:grid-cols-3 gap-8 mb-12">
            <?php foreach ($article_cards as $card): ?>
                <div class="bg-card rounded-lg border p-6 hover:shadow-lg transition-all duration-300 group">
                    <!-- Icon -->
                    <div class="bg-<?php echo esc_attr($card['color']); ?>/10 text-<?php echo esc_attr($card['color']); ?> p-3 rounded-lg w-12 h-12 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <?php echo get_blog_icon($card['icon']); ?>
                        </svg>
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-xl font-semibold mb-3">
                        <?php echo esc_html($card['title']); ?>
                    </h3>
                    
                    <!-- Description -->
                    <p class="text-muted-foreground mb-4">
                        <?php echo esc_html($card['description']); ?>
                    </p>
                    
                    <!-- Stat -->
                    <div class="flex items-center gap-2 text-sm text-muted-foreground">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <?php echo get_blog_icon($card['icon'] === 'file-text' ? 'trending-up' : ($card['icon'] === 'scale' ? 'check-circle' : 'eye')); ?>
                        </svg>
                        <span><?php echo esc_html($card['stat']); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Popular Topics & CTA Section -->
        <div class="bg-gradient-to-br from-muted/30 to-muted/10 rounded-2xl p-8">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <!-- Popular Topics -->
                <div>
                    <h3 class="text-2xl font-bold mb-4">
                        Популярные темы нашего блога
                    </h3>
                    <div class="grid grid-cols-2 gap-3 mb-6">
                        <?php foreach ($popular_topics as $topic): ?>
                            <div class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-success" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <?php echo get_blog_icon('check-circle'); ?>
                                </svg>
                                <span class="text-sm"><?php echo esc_html($topic); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <p class="text-muted-foreground">
                        Подписывайтесь на обновления, чтобы не пропускать важную информацию о ваших правах и возможностях
                    </p>
                </div>
                
                <!-- CTA Block -->
                <div class="text-center">
                    <div class="bg-primary/5 border-2 border-dashed border-primary/20 rounded-xl p-8">
                        <svg class="h-16 w-16 text-primary mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <?php echo get_blog_icon('book-open'); ?>
                        </svg>
                        <h4 class="text-lg font-semibold mb-2">Читайте "Финщит"</h4>
                        <p class="text-muted-foreground text-sm mb-6">
                            Станьте экспертом в вопросах банкротства
                        </p>
                        <a href="<?php echo esc_url($blog_link); ?>" 
                           class="inline-flex items-center justify-center whitespace-nowrap w-full h-11 rounded-md px-8 text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <?php echo get_blog_icon('book-open'); ?>
                            </svg>
                            Перейти к статьям
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
