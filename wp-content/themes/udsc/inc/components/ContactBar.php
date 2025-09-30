<?php
/**
 * Contact Bar Component for UDSC Theme
 * 
 * @package udsc
 * @since 1.0.0
 */

class UDSC_ContactBar {
    
    /**
     * Get contact information
     */
    private static function get_contact_info() {
        return array(
            'phone' => udsc_get_contact_phone(),
            'email' => udsc_get_contact_email(),
            'hours' => udsc_get_contact_hours(),
            'social' => array(
                'vk' => udsc_get_contact_vk(),
                'telegram' => udsc_get_contact_telegram(),
                'whatsapp' => udsc_get_contact_whatsapp()
            )
        );
    }
    
    /**
     * Render phone icon
     */
    private static function get_phone_icon() {
        return '<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>';
    }
    
    /**
     * Render email icon
     */
    private static function get_email_icon() {
        return '<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>';
    }
    
    /**
     * Render VK icon
     */
    private static function get_vk_icon() {
        return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hash h-4 w-4" data-lov-id="src\components\Navigation.tsx:63:20" data-lov-name="Hash" data-component-path="src\components\Navigation.tsx" data-component-line="63" data-component-file="Navigation.tsx" data-component-name="Hash" data-component-content="%7B%22className%22%3A%22h-4%20w-4%22%7D"><line x1="4" x2="20" y1="9" y2="9"></line><line x1="4" x2="20" y1="15" y2="15"></line><line x1="10" x2="8" y1="3" y2="21"></line><line x1="16" x2="14" y1="3" y2="21"></line></svg>';
    }
    
    /**
     * Render Telegram icon
     */
    private static function get_telegram_icon() {
        return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle h-4 w-4" data-lov-id="src\components\Navigation.tsx:66:20" data-lov-name="MessageCircle" data-component-path="src\components\Navigation.tsx" data-component-line="66" data-component-file="Navigation.tsx" data-component-name="MessageCircle" data-component-content="%7B%22className%22%3A%22h-4%20w-4%22%7D"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path></svg>';
    }

    /**
     * Render WhatsApp icon
     */
    private static function get_whatsapp_icon() {
        return '<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>';
    }

    /**
     * Render contact bar
     */
    public static function render() {
        $contact = self::get_contact_info();
        
        ob_start();
        ?>
        <div class="bg-muted/50 py-2">
            <div class="container">
                <div class="flex items-center justify-between text-sm text-muted-foreground">
                    <!-- Contact Info -->
                    <div class="flex items-center gap-6">
                        <a href="tel:<?php echo esc_attr($contact['phone']); ?>" 
                           class="flex items-center gap-2 hover:text-primary transition-colors"
                           aria-label="Позвонить <?php echo esc_attr($contact['phone']); ?>">
                            <?php echo self::get_phone_icon(); ?>
                            <span><?php echo esc_html($contact['phone']); ?></span>
                        </a>
                        <a href="mailto:<?php echo esc_attr($contact['email']); ?>" 
                           class="flex items-center gap-2 hover:text-primary transition-colors"
                           aria-label="Написать на <?php echo esc_attr($contact['email']); ?>">
                            <?php echo self::get_email_icon(); ?>
                            <span><?php echo esc_html($contact['email']); ?></span>
                        </a>
                    </div>
                    
                    <!-- Hours and Social -->
                    <div class="hidden md:flex items-center gap-4">
                        <span><?php echo esc_html($contact['hours']); ?></span>
                        <div class="flex items-center gap-2 ml-4">
                            <?php if (!empty($contact['social']['vk'])): ?>
                            <a href="<?php echo esc_url($contact['social']['vk']); ?>" 
                               target="_blank" rel="noopener noreferrer" 
                               class="hover:text-primary transition-colors"
                               aria-label="Перейти в ВКонтакте">
                                <?php echo self::get_vk_icon(); ?>
                            </a>
                            <?php endif; ?>
                            
                            <?php if (!empty($contact['social']['telegram'])): ?>
                            <a href="<?php echo esc_url($contact['social']['telegram']); ?>" 
                               target="_blank" rel="noopener noreferrer" 
                               class="hover:text-primary transition-colors"
                               aria-label="Перейти в Telegram">
                                <?php echo self::get_telegram_icon(); ?>
                            </a>
                            <?php endif; ?>
                            
                            <?php if (!empty($contact['social']['whatsapp'])): ?>
                            <a href="<?php echo esc_url($contact['social']['whatsapp']); ?>" 
                               target="_blank" rel="noopener noreferrer" 
                               class="hover:text-primary transition-colors"
                               aria-label="Написать в WhatsApp">
                                <?php echo self::get_whatsapp_icon(); ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
