<?php
/**
 * Template part for displaying blog post cards
 *
 * @package udsc
 */

// Получаем ACF поля из hero_block
$article_content = get_field('article_content');
$hero_data = null;

if ($article_content && is_array($article_content)) {
    foreach ($article_content as $block) {
        if ($block['acf_fc_layout'] === 'hero_block') {
            $hero_data = $block;
            break;
        }
    }
}

// Получаем дополнительные поля
$views = $hero_data['views'] ?? 0;
$comments_count = $hero_data['comments_count'] ?? 0;
$author_name = $hero_data['author'] ?? get_the_author();
$category_name = $hero_data['category'] ?? '';
$hero_image = $hero_data['image'] ?? null;
$hero_date = $hero_data['date'] ?? '';

// Определяем изображение для карточки
$card_image = null;
if ($hero_image && is_array($hero_image)) {
    $card_image = $hero_image;
} elseif (has_post_thumbnail()) {
    $card_image = get_post_thumbnail_id();
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300'); ?>>
    <?php if ($card_image) : ?>
        <div class="blog-card__image relative">
            <a href="<?php the_permalink(); ?>" class="block">
                <?php 
                if (is_array($card_image)) {
                    echo wp_get_attachment_image($card_image['ID'], 'medium', false, array('class' => 'w-full h-48 object-cover'));
                } else {
                    the_post_thumbnail('medium', array('class' => 'w-full h-48 object-cover'));
                }
                ?>
            </a>
            
            <!-- Статистика на изображении -->
            <div class="absolute top-3 right-3 flex space-x-2">
                <?php if ($views > 0) : ?>
                    <span class="bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded-full flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                        <?php echo number_format($views); ?>
                    </span>
                <?php endif; ?>
                
                <?php if ($comments_count > 0) : ?>
                    <span class="bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded-full flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                        </svg>
                        <?php echo $comments_count; ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    
    <div class="blog-card__content p-6">
        <!-- Мета-информация -->
        <div class="blog-card__meta mb-3 flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <time class="text-sm text-gray-600" datetime="<?php echo $hero_date ? get_the_date('c', strtotime($hero_date)) : get_the_date('c'); ?>">
                    <?php echo $hero_date ? get_the_date('j M Y', strtotime($hero_date)) : get_the_date(); ?>
                </time>
                
                <?php if ($category_name) : ?>
                    <span class="text-sm text-blue-600 font-medium">
                        <?php echo esc_html($category_name); ?>
                    </span>
                <?php else : ?>
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) :
                    ?>
                        <span class="text-sm text-blue-600 font-medium">
                            <?php echo esc_html($categories[0]->name); ?>
                        </span>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            
            <!-- Время чтения (точное с учетом ACF контента) -->
            <div class="text-xs text-gray-500">
                <?php 
                $reading_time = calculate_blog_reading_time();
                echo $reading_time . ' мин чтения';
                ?>
            </div>
        </div>
        
        <!-- Заголовок -->
        <h2 class="blog-card__title text-xl font-semibold mb-3 line-clamp-2">
            <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-blue-600 transition-colors duration-200">
                <?php the_title(); ?>
            </a>
        </h2>
        
        <!-- Краткое описание -->
        <div class="blog-card__excerpt text-gray-700 mb-4 line-clamp-3">
            <?php 
            if ($hero_data && !empty($hero_data['subtitle'])) {
                echo wp_trim_words($hero_data['subtitle'], 20);
            } else {
                the_excerpt();
            }
            ?>
        </div>
        
        <!-- Подвал карточки -->
        <div class="blog-card__footer flex items-center justify-between">
            <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200 flex items-center">
                Читать далее 
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
            
            <div class="blog-card__author text-sm text-gray-600 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
                <?php echo esc_html($author_name); ?>
            </div>
        </div>
        
        <!-- Дополнительная статистика -->
        <?php if ($views > 0 || $comments_count > 0) : ?>
            <div class="blog-card__stats mt-3 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                <div class="flex items-center space-x-4">
                    <?php if ($views > 0) : ?>
                        <span class="flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                            </svg>
                            <?php echo number_format($views); ?> просмотров
                        </span>
                    <?php endif; ?>
                    
                    <?php if ($comments_count > 0) : ?>
                        <span class="flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                            </svg>
                            <?php echo $comments_count; ?> комментариев
                        </span>
                    <?php endif; ?>
                </div>
                
                <!-- Теги -->
                <?php
                $tags = get_the_tags();
                if ($tags && !empty($tags)) :
                ?>
                    <div class="flex items-center space-x-1">
                        <?php foreach (array_slice($tags, 0, 2) as $tag) : ?>
                            <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-xs">
                                #<?php echo esc_html($tag->name); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</article>
