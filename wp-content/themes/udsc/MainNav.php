<?php
/**
 * Main Navigation Component for UDSC Theme
 * 
 * Handles both desktop and mobile navigation with proper separation of concerns
 * 
 * @package udsc
 * @since 1.0.0
 */

class UDSC_MainNav {
    
    /**
     * Navigation menu items
     */
    private static function get_menu_items() {
        return array(
            array('url' => home_url('/services'), 'title' => 'Услуги'),
            array('url' => home_url('/case-studies'), 'title' => 'Кейсы', 'has_count' => true),
            array('url' => home_url('/blog'), 'title' => 'Финщит'),
            array('url' => home_url('/pricing'), 'title' => 'Стоимость'),
            array('title' => 'О компании', 'children' => array(
                array('url' => home_url('/about'), 'title' => 'О нас'),
                array('url' => home_url('/promotions'), 'title' => 'Акции'),
                array('url' => home_url('/testimonials'), 'title' => 'Отзывы')
            )),
            array('url' => home_url('/contacts'), 'title' => 'Контакты'),
        );
    }
    
    /**
     * Check if navigation item is active
     */
    private static function is_active($url) {
        if ($url === home_url('/')) {
            return is_home();
        }
        return !is_home() && strpos($_SERVER['REQUEST_URI'], parse_url($url, PHP_URL_PATH)) === 0;
    }
    
    /**
     * Get case studies count safely
     */
    private static function get_cases_count() {
        $cases_count = wp_count_posts('case_study');
        if ($cases_count && isset($cases_count->publish)) {
            return $cases_count->publish;
        }
        return '12'; // default fallback
    }
    
    /**
     * Render case count badge
     */
    private static function render_case_count_badge() {
        ob_start();
        ?>
        <div class="relative w-6 h-6 flex items-center justify-center ml-1">
            <svg viewBox="0 0 200 200" class="w-full h-full absolute inset-0" aria-hidden="true">
                <path d="M100 30 C75 30, 25 40, 25 55 C25 90, 35 120, 60 140 C75 150, 85 155, 100 155 C115 155, 125 150, 140 140 C165 120, 175 90, 175 55 C175 40, 125 30, 100 30 Z" fill="hsl(var(--primary))" fill-opacity="0.2"/>
            </svg>
            <span class="relative text-[10px] font-semibold text-foreground z-10 leading-none translate-y-[-1px]">
                <?php echo esc_html(self::get_cases_count()); ?>
            </span>
        </div>
        <?php
        return ob_get_clean();
    }
    
    /**
     * Render dropdown arrow icon
     */
    private static function get_dropdown_icon() {
        return '<svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>';
    }
    
    /**
     * Render CTA button
     */
    public static function render_cta_button($is_mobile = false) {
        $classes = $is_mobile ? 
            'w-full bg-primary text-primary-foreground hover:bg-primary/90 px-6 py-3 rounded-lg font-medium transition-colors' :
            'bg-primary text-primary-foreground hover:bg-primary/90 px-6 py-3 rounded-lg font-medium transition-colors';
        
        $onclick = "window.location.href='" . esc_url(home_url('/contacts')) . "#consultation'";
        
        ob_start();
        ?>
        <button class="<?php echo esc_attr($classes); ?>" onclick="<?php echo esc_attr($onclick); ?>">
            Бесплатная консультация
        </button>
        <?php
        return ob_get_clean();
    }
    
    /**
     * Render desktop navigation
     */
    public static function render_desktop_nav() {
        $menu_items = self::get_menu_items();
        
        ob_start();
        ?>
        <div class="hidden lg:flex items-center space-x-6">
            <?php foreach ($menu_items as $item): ?>
                <?php if (isset($item['children'])): ?>
                    <!-- Dropdown Menu Item -->
                    <div class="relative group">
                        <button class="text-sm font-medium transition-colors hover:text-primary flex items-center gap-1 text-foreground group-hover:text-primary">
                            <span><?php echo esc_html($item['title']); ?></span>
                            <?php echo self::get_dropdown_icon(); ?>
                        </button>
                        <div class="absolute top-full left-0 bg-popover border border-border rounded-lg shadow-lg min-w-[200px] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-10 mt-1">
                            <?php foreach ($item['children'] as $child): ?>
                                <a href="<?php echo esc_url($child['url']); ?>" 
                                   class="block px-4 py-3 text-sm hover:bg-accent rounded-lg transition-colors <?php echo self::is_active($child['url']) ? 'bg-accent' : ''; ?>">
                                    <?php echo esc_html($child['title']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Regular Menu Item -->
                    <?php $is_active = self::is_active($item['url']); ?>
                    <a href="<?php echo esc_url($item['url']); ?>" 
                       class="text-sm font-medium transition-colors hover:text-primary flex items-center gap-1 <?php echo $is_active ? 'text-primary' : 'text-foreground'; ?>">
                        <span class="<?php echo $is_active ? 'border-b-2 border-primary pb-1' : ''; ?>">
                            <?php echo esc_html($item['title']); ?>
                        </span>
                        <?php if (isset($item['has_count']) && $item['has_count']): ?>
                            <?php echo self::render_case_count_badge(); ?>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
            
            <?php echo self::render_cta_button(); ?>
        </div>
        <?php
        return ob_get_clean();
    }
    
    /**
     * Render mobile navigation
     */
    public static function render_mobile_nav() {
        $menu_items = self::get_menu_items();
        
        ob_start();
        ?>
        <!-- Mobile Menu Button -->
        <button id="mobile-menu-toggle" class="lg:hidden p-2" aria-label="Toggle mobile menu" aria-expanded="false">
            <svg id="menu-open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg id="menu-close" class="h-6 w-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <?php
        return ob_get_clean();
    }
    
    /**
     * Render mobile navigation menu
     */
    public static function render_mobile_menu() {
        $menu_items = self::get_menu_items();
        
        ob_start();
        ?>
        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="lg:hidden mt-4 pb-4 border-t border-border hidden" role="navigation" aria-label="Mobile navigation">
            <div class="pt-4 space-y-2">
                <?php foreach ($menu_items as $item): ?>
                    <?php if (isset($item['children'])): ?>
                        <!-- Mobile Dropdown Section -->
                        <div class="space-y-1">
                            <div class="py-2 px-4 font-medium text-muted-foreground text-sm">
                                <?php echo esc_html($item['title']); ?>
                            </div>
                            <?php foreach ($item['children'] as $child): ?>
                                <?php $is_active = self::is_active($child['url']); ?>
                                <a href="<?php echo esc_url($child['url']); ?>" 
                                   class="block py-2 px-8 rounded-lg transition-colors <?php echo $is_active ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted'; ?>">
                                    <?php echo esc_html($child['title']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <!-- Mobile Regular Item -->
                        <?php $is_active = self::is_active($item['url']); ?>
                        <a href="<?php echo esc_url($item['url']); ?>" 
                           class="block py-2 px-4 rounded-lg transition-colors flex items-center justify-between <?php echo $is_active ? 'bg-primary text-primary-foreground' : 'text-foreground hover:bg-muted'; ?>">
                            <span><?php echo esc_html($item['title']); ?></span>
                            <?php if (isset($item['has_count']) && $item['has_count']): ?>
                                <div class="relative w-6 h-6 flex items-center justify-center">
                                    <svg viewBox="0 0 200 200" class="w-full h-full absolute inset-0" aria-hidden="true">
                                        <path d="M100 30 C75 30, 25 40, 25 55 C25 90, 35 120, 60 140 C75 150, 85 155, 100 155 C115 155, 125 150, 140 140 C165 120, 175 90, 175 55 C175 40, 125 30, 100 30 Z" fill="hsl(var(--primary))" fill-opacity="0.2"/>
                                    </svg>
                                    <span class="relative text-[10px] font-semibold text-foreground z-10 leading-none translate-y-[-1px]">
                                        <?php echo esc_html(self::get_cases_count()); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
                
                <div class="pt-2">
                    <?php echo self::render_cta_button(true); ?>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
    
    /**
     * Render complete navigation
     */
    public static function render() {
        ob_start();
        ?>
        <nav class="py-4" role="navigation" aria-label="Main navigation">
            <div class="container">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <?php 
                    // Ensure Logo component is loaded
                    if (!class_exists('UDSC_Logo')) {
                        require_once get_template_directory() . '/inc/components/Logo.php';
                    }
                    echo UDSC_Logo::render(); 
                    ?>
                    
                    <!-- Desktop Navigation -->
                    <?php echo self::render_desktop_nav(); ?>
                    
                    <!-- Mobile Menu Button -->
                    <?php echo self::render_mobile_nav(); ?>
                </div>
                
                <!-- Mobile Menu -->
                <?php echo self::render_mobile_menu(); ?>
            </div>
        </nav>
        <?php
        return ob_get_clean();
    }
}
