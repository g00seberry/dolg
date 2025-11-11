<?php
/**
 * Logo Component for UDSC Theme
 * 
 * @package udsc
 * @since 1.0.0
 */

class UDSC_Logo {
    
    /**
     * Render logo with shield icon and company info
     */
    public static function render() {
        ob_start();
        ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 min-h-[3rem]" aria-label="Финансовый щит - Главная">
            <svg class="h-8 w-8 text-primary shrink-0 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
				<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path>
			</svg>
            <div>
                <div class="font-bold text-xl text-primary">
                    Финансовый щит
                </div>
                <div class="text-sm text-muted-foreground -mt-1">
                    <?php echo esc_html(udsc_get_contact_tagline()); ?>
                </div>
            </div>
        </a>
        <?php
        return ob_get_clean();
    }
}
