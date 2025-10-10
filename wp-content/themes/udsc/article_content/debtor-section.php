<?php
/**
 * Debtor Section Component
 * Handles layout_debtor_section from ACF flexible content
 */

if (!function_exists('render_debtor_section')) {
    function render_debtor_section($fields) {

        $list_title = $fields['list_title'] ?? '';
        $list_items = $fields['list'] ?? [];
        
        if (empty($list_items)) return '';
        
        ob_start();
        ?>
        <section class="mb-8">

            <?php if (!empty($list_items) && is_array($list_items)): ?>
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6">
                    <?php if (!empty($list_title)): ?>
                        <h4 class="font-semibold mb-4 flex items-center gap-2 text-yellow-800">
                            <svg class="h-5 w-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                            <?php echo esc_html($list_title); ?>
                        </h4>
                    <?php endif; ?>
                    
                    <ul class="space-y-2 text-sm text-yellow-700">
                        <?php foreach ($list_items as $item): ?>
                            <?php 
                            $item_text = $item['item_text'] ?? '';
                            if (empty($item_text)) continue;
                            ?>
                            <li>• <?php echo esc_html($item_text); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </section>
        <?php
        return ob_get_clean();
    }
}
