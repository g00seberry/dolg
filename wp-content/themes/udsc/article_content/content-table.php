<?php
/**
 * Content Table Component
 * Handles layout_content_table from ACF flexible content
 */

if (!function_exists('render_content_table')) {
    function render_content_table($fields) {
        $title = $fields['title'] ?? '';
        $items = $fields['items'] ?? [];
        
        if (empty($items) || !is_array($items)) return '';
        
        ob_start();
        ?>
        <div class="mb-8">
            <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                <h3 class="text-xl font-semibold mb-4 flex items-center gap-2 text-gray-900">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <?php echo esc_html($title ?: 'Содержание статьи'); ?>
                </h3>
                <ul class="space-y-2 text-sm">
                    <?php foreach ($items as $index => $item): ?>
                        <?php 
                        $link_label = $item['link_label'] ?? '';
                        $link_anchor = $item['link_anchor'] ?? '';
                        
                        if (empty($link_label)) continue;
                        
                        $anchor = !empty($link_anchor) ? $link_anchor : 'section-' . ($index + 1);
                        ?>
                        <li>
                            <a 
                                href="#<?php echo esc_attr($anchor); ?>" 
                                class="text-blue-600 hover:text-blue-800 hover:underline transition-colors duration-200"
                            >
                                <?php echo esc_html($link_label); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
