<?php
/**
 * Steps Section Component
 * Handles layout_steps_section from ACF flexible content
 */

if (!function_exists('render_steps_section')) {
    function render_steps_section($fields) {
        $steps = $fields['steps'] ?? [];
        
        if (empty($steps)) return '';
        
        ob_start();
        ?>
        <section class="mb-8">

            <?php if (!empty($steps) && is_array($steps)): ?>
                <div class="space-y-6">
                    <?php foreach ($steps as $index => $step): ?>
                        <?php 
                        $step_title = $step['step_title'] ?? '';
                        $step_description = $step['step_description'] ?? '';
                        
                        if (empty($step_title) && empty($step_description)) continue;
                        ?>
                        <div class="flex gap-4">
                            <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold text-sm flex-shrink-0">
                                <?php echo $index + 1; ?>
                            </div>
                            <div class="flex-1">
                                <?php if (!empty($step_title)): ?>
                                    <h4 class="font-semibold text-lg text-gray-900 mb-2">
                                        <?php echo esc_html($step_title); ?>
                                    </h4>
                                <?php endif; ?>
                                
                                <?php if (!empty($step_description)): ?>
                                    <div class="text-gray-700 leading-relaxed">
                                        <?php echo wp_kses_post($step_description); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
        <?php
        return ob_get_clean();
    }
}
