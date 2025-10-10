<?php
/**
 * List Section Component
 * Handles layout_list_section from ACF flexible content
 */

if (!function_exists('render_list_section')) {
    function render_list_section($fields) {
        $content = $fields['content'] ?? '';
        $list_items = $fields['list'] ?? [];
        
        if (empty($title) && empty($content) && empty($list_items)) return '';
        
        ob_start();
        ?>
        <section class="mb-8">
            <?php if (!empty($list_items) && is_array($list_items)): ?>
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                    <ul class="space-y-3">
                        <?php foreach ($list_items as $item): ?>
                            <?php 
                            $item_text = $item['item_text'] ?? '';
                            if (empty($item_text)) continue;
                            ?>
                            <li class="flex items-start gap-3">
                                <svg class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700"><?php echo esc_html($item_text); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </section>
        <?php
        return ob_get_clean();
    }
}
