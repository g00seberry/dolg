<?php
/**
 * Hero Block Component (Article Header)
 * Handles layout_hero_block from ACF flexible content
 */

if (!function_exists('render_hero_block')) {
    function render_hero_block($fields) {
        $title = $fields['title'] ?? '';
        $subtitle = $fields['subtitle'] ?? '';
        $author = $fields['author'] ?? '';
        $date = $fields['date'] ?? '';
        $views = $fields['views'] ?? 0;
        $category = $fields['category'] ?? 'Законодательство';
        $comments_count = $fields['comments_count'] ?? 0;
        
        if (empty($title)) return '';
        
        $formatted_date = '';
        if ($date) {
            $formatted_date = date('j F Y', strtotime($date));
        }
        
        ob_start();
        ?>
        <header class="mb-8">
            <!-- Category Badge -->
            <div class="inline-flex items-center px-2.5 py-0.5 rounded-md border border-gray-200 text-sm font-medium text-gray-700 bg-white mb-4">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <?php echo esc_html($category); ?>
            </div>
            
            <!-- Title -->
            <h1 class="text-3xl lg:text-4xl font-bold mb-4 text-balance">
                <?php echo esc_html($title); ?>
            </h1>
            
            <!-- Subtitle -->
            <?php if (!empty($subtitle)): ?>
                <p class="text-lg text-muted-foreground mb-6">
                    <?php echo wp_kses_post($subtitle); ?>
                </p>
            <?php endif; ?>

            <!-- Meta information -->
            <div class="flex flex-wrap items-center justify-between border-y py-4 mb-6">
                <div class="flex flex-wrap items-center gap-6 text-sm text-muted-foreground">
                    <?php if (!empty($author)): ?>
                        <div class="flex items-center gap-2">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span><?php echo esc_html($author); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($formatted_date)): ?>
                        <div class="flex items-center gap-2">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span><?php echo esc_html($formatted_date); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <div class="flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>15 мин чтения</span>
                    </div>
                    
                    <?php if ($views > 0): ?>
                        <div class="flex items-center gap-2">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <span><?php echo number_format($views); ?> просмотров</span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($comments_count > 0): ?>
                        <div class="flex items-center gap-2">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <span><?php echo number_format($comments_count); ?> комментариев</span>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Bookmark button -->
                <button class="inline-flex items-center gap-2 px-3 py-1.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                    </svg>
                    В закладки
                </button>
            </div>
        </header>
        <?php
        return ob_get_clean();
    }
}