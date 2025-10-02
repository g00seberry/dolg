<?php
/**
 * Case Studies Filter Class
 *
 * @package udsc
 */

if (!defined('ABSPATH')) {
    exit;
}

class UDSC_Case_Studies_Filter {
    
    private $post_type = 'case_study';
    
    public function __construct() {
        add_action('wp_ajax_filter_case_studies', [$this, 'ajax_filter_case_studies']);
        add_action('wp_ajax_nopriv_filter_case_studies', [$this, 'ajax_filter_case_studies']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts'], 20);
    }
    
    /**
     * Enqueue scripts and styles
     */
    public function enqueue_scripts() {
        if (is_post_type_archive('case_study')) {
            // Проверяем, что скрипт зарегистрирован и еще не локализован
            if (wp_script_is('udsc-main', 'registered') && !wp_scripts()->get_data('udsc-main', 'data')) {
                wp_localize_script('udsc-main', 'udsc_ajax', [
                    'ajax_url' => admin_url('admin-ajax.php'),
                    'nonce' => wp_create_nonce('udsc_filter_nonce')
                ]);
            }
        }
    }
    
    /**
     * Get all unique regions
     */
    public function get_regions() {
        $regions = get_posts([
            'post_type' => $this->post_type,
            'posts_per_page' => -1,
            'meta_key' => 'case_region',
            'orderby' => 'meta_value',
            'order' => 'ASC'
        ]);
        
        $unique_regions = [];
        foreach ($regions as $post) {
            $region = get_field('case_region', $post->ID);
            if ($region && !in_array($region, $unique_regions)) {
                $unique_regions[] = $region;
            }
        }
        
        return array_values(array_unique($unique_regions));
    }
    
    /**
     * Get all unique years
     */
    public function get_years() {
        $years = get_posts([
            'post_type' => $this->post_type,
            'posts_per_page' => -1,
            'meta_key' => 'case_end_date',
            'orderby' => 'meta_value',
            'order' => 'DESC'
        ]);
        
        $unique_years = [];
        foreach ($years as $post) {
            $end_date = get_field('case_end_date', $post->ID);
            if ($end_date) {
                $year = date('Y', strtotime(str_replace('.', '-', $end_date)));
                if (!in_array($year, $unique_years)) {
                    $unique_years[] = $year;
                }
            }
        }
        
        return array_values(array_unique($unique_years));
    }
    
    /**
     * Get debt ranges
     */
    public function get_debt_ranges() {
        return [
            ['label' => 'До 500 тыс. ₽', 'min' => 0, 'max' => 500000],
            ['label' => '500 тыс. - 1 млн ₽', 'min' => 500000, 'max' => 1000000],
            ['label' => '1 - 2 млн ₽', 'min' => 1000000, 'max' => 2000000],
            ['label' => '2 - 5 млн ₽', 'min' => 2000000, 'max' => 5000000],
            ['label' => 'Свыше 5 млн ₽', 'min' => 5000000, 'max' => PHP_INT_MAX]
        ];
    }
    
    /**
     * Filter cases based on parameters
     */
    public function filter_cases($filters = [], $page = 1, $per_page = 6) {
        $args = [
            'post_type' => $this->post_type,
            'posts_per_page' => $per_page,
            'paged' => $page,
            'post_status' => 'publish',
            'meta_query' => []
        ];
        
        // Filter by year
        if (!empty($filters['year']) && $filters['year'] !== 'all') {
            $args['meta_query'][] = [
                'key' => 'case_end_date',
                'value' => $filters['year'],
                'compare' => 'LIKE'
            ];
        }
        
        // Filter by region
        if (!empty($filters['region']) && $filters['region'] !== 'all') {
            $args['meta_query'][] = [
                'key' => 'case_region',
                'value' => $filters['region'],
                'compare' => '='
            ];
        }
        
        // Filter by debt range
        if (isset($filters['debt_range']) && $filters['debt_range'] !== 'all' && $filters['debt_range'] !== '') {
            $debt_ranges = $this->get_debt_ranges();
            $range_index = intval($filters['debt_range']);
            
            if (isset($debt_ranges[$range_index])) {
                $range = $debt_ranges[$range_index];
                
                // Для диапазона "Свыше 5 млн ₽" используем >= вместо BETWEEN
                if ($range['max'] == PHP_INT_MAX) {
                    $args['meta_query'][] = [
                        'key' => 'case_debt_amount',
                        'value' => $range['min'],
                        'compare' => '>=',
                        'type' => 'NUMERIC'
                    ];
                } else {
                    $args['meta_query'][] = [
                        'key' => 'case_debt_amount',
                        'value' => [$range['min'], $range['max']],
                        'compare' => 'BETWEEN',
                        'type' => 'NUMERIC'
                    ];
                }
            }
        }
        
        return get_posts($args);
    }
    
    /**
     * Get total count of cases matching filters
     */
    public function get_cases_count($filters = []) {
        $args = [
            'post_type' => $this->post_type,
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'meta_query' => [],
            'fields' => 'ids'
        ];
        
        // Apply same filters as filter_cases but without pagination
        if (!empty($filters['year']) && $filters['year'] !== 'all') {
            $args['meta_query'][] = [
                'key' => 'case_end_date',
                'value' => $filters['year'],
                'compare' => 'LIKE'
            ];
        }
        
        if (!empty($filters['region']) && $filters['region'] !== 'all') {
            $args['meta_query'][] = [
                'key' => 'case_region',
                'value' => $filters['region'],
                'compare' => '='
            ];
        }
        
        if (isset($filters['debt_range']) && $filters['debt_range'] !== 'all' && $filters['debt_range'] !== '') {
            $debt_ranges = $this->get_debt_ranges();
            $range_index = intval($filters['debt_range']);
            
            if (isset($debt_ranges[$range_index])) {
                $range = $debt_ranges[$range_index];
                
                if ($range['max'] == PHP_INT_MAX) {
                    $args['meta_query'][] = [
                        'key' => 'case_debt_amount',
                        'value' => $range['min'],
                        'compare' => '>=',
                        'type' => 'NUMERIC'
                    ];
                } else {
                    $args['meta_query'][] = [
                        'key' => 'case_debt_amount',
                        'value' => [$range['min'], $range['max']],
                        'compare' => 'BETWEEN',
                        'type' => 'NUMERIC'
                    ];
                }
            }
        }
        
        $posts = get_posts($args);
        return count($posts);
    }
    
    /**
     * Generate pagination HTML
     */
    public function render_pagination($filters = [], $current_page = 1, $per_page = 6) {
        $total_cases = $this->get_cases_count($filters);
        $total_pages = ceil($total_cases / $per_page);
        
        if ($total_pages <= 1) {
            return '';
        }
        
        ob_start();
        ?>
        <div class="flex items-center justify-center gap-2 mt-8">
            <?php if ($current_page > 1): ?>
                <button type="button" 
                        class="pagination-btn px-3 py-2 text-sm border border-input bg-background hover:bg-accent hover:text-accent-foreground rounded-md transition-colors"
                        data-page="<?php echo $current_page - 1; ?>">
                    ← Назад
                </button>
            <?php endif; ?>
            
            <div class="flex space-x-1 gap-2">
                <?php
                $start_page = max(1, $current_page - 2);
                $end_page = min($total_pages, $current_page + 2);
                
                if ($start_page > 1): ?>
                    <button type="button" 
                            class="pagination-btn px-3 py-2 text-sm border border-input bg-background hover:bg-accent hover:text-accent-foreground rounded-md transition-colors"
                            data-page="1">1</button>
                    <?php if ($start_page > 2): ?>
                        <span class="px-3 py-2 text-sm text-muted-foreground">...</span>
                    <?php endif; ?>
                <?php endif; ?>
                
                <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                    <button type="button" 
                            class="pagination-btn px-3 py-2 text-sm border rounded-md transition-colors <?php echo $i == $current_page ? 'bg-primary text-primary-foreground' : 'border-input bg-background hover:bg-accent hover:text-accent-foreground'; ?>"
                            data-page="<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </button>
                <?php endfor; ?>
                
                <?php if ($end_page < $total_pages): ?>
                    <?php if ($end_page < $total_pages - 1): ?>
                        <span class="px-3 py-2 text-sm text-muted-foreground">...</span>
                    <?php endif; ?>
                    <button type="button" 
                            class="pagination-btn px-3 py-2 text-sm border border-input bg-background hover:bg-accent hover:text-accent-foreground rounded-md transition-colors"
                            data-page="<?php echo $total_pages; ?>"><?php echo $total_pages; ?></button>
                <?php endif; ?>
            </div>
            
            <?php if ($current_page < $total_pages): ?>
                <button type="button" 
                        class="pagination-btn px-3 py-2 text-sm border border-input bg-background hover:bg-accent hover:text-accent-foreground rounded-md transition-colors"
                        data-page="<?php echo $current_page + 1; ?>">
                    Вперед →
                </button>
            <?php endif; ?>
        </div>
        <?php
        return ob_get_clean();
    }
    
    /**
     * Get case statistics
     */
    public function get_statistics() {
        $all_cases = get_posts([
            'post_type' => $this->post_type,
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ]);
        
        $total_debt = 0;
        $regions = [];
        
        foreach ($all_cases as $case) {
            $debt_amount = get_field('case_debt_amount', $case->ID);
            if ($debt_amount) {
                $total_debt += $debt_amount;
            }
            
            $region = get_field('case_region', $case->ID);
            if ($region && !in_array($region, $regions)) {
                $regions[] = $region;
            }
        }
        
        $average_debt = count($all_cases) > 0 ? $total_debt / count($all_cases) : 0;
        
        return [
            'total_cases' => count($all_cases),
            'total_debt' => $total_debt,
            'average_debt' => $average_debt,
            'unique_regions' => count($regions),
            'regions' => $regions
        ];
    }
    
    /**
     * AJAX handler for filtering
     */
    public function ajax_filter_case_studies() {
        // Verify nonce
        if (!wp_verify_nonce($_POST['nonce'], 'udsc_filter_nonce')) {
            wp_die('Security check failed');
        }
        
        $filters = [
            'year' => sanitize_text_field($_POST['year'] ?? 'all'),
            'region' => sanitize_text_field($_POST['region'] ?? 'all'),
            'debt_range' => sanitize_text_field($_POST['debt_range'] ?? 'all')
        ];
        
        // Get pagination parameters
        $page = intval($_POST['page'] ?? 1);
        $per_page = 6; // Количество кейсов на странице
        
        // Get filtered cases with pagination
        $filtered_cases = $this->filter_cases($filters, $page, $per_page);
        $total_cases = $this->get_cases_count($filters);
        
        // Prepare response data
        $response = [
            'success' => true,
            'count' => $total_cases,
            'page' => $page,
            'total_pages' => ceil($total_cases / $per_page),
            'html' => $this->render_cases_grid($filtered_cases),
            'pagination' => $this->render_pagination($filters, $page, $per_page)
        ];
        
        wp_send_json($response);
    }
    
    /**
     * Render cases grid HTML
     */
    private function render_cases_grid($cases) {
        if (empty($cases)) {
            ob_start();
            get_template_part('template-parts/case-studies-empty');
            return ob_get_clean();
        }
        
        ob_start();
        ?>
        <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
            <?php foreach ($cases as $case): ?>
                <?php
                global $post;
                $post = $case;
                setup_postdata($post);
                get_template_part('template-parts/content', 'case_study');
                wp_reset_postdata();
                ?>
            <?php endforeach; ?>
        </div>
        <?php
        return ob_get_clean();
    }
    
    /**
     * Render filter form
     */
    public function render_filter_form() {
        $regions = $this->get_regions();
        $years = $this->get_years();
        $debt_ranges = $this->get_debt_ranges();
        
        ob_start();
        ?>
        <div class="p-6 border border-muted-foreground/20 bg-background shadow-sm rounded-lg border">
            <div class="flex items-center gap-2 mb-4">
                <svg class="h-5 w-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
                <h2 class="text-xl font-semibold">Фильтры</h2>
            </div>
            
            <form id="case-studies-filter" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="text-sm font-medium mb-2 block">Год завершения</label>
                    <select name="year" class="filter-select flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <option value="all">Все годы</option>
                        <?php foreach ($years as $year): ?>
                        <option value="<?php echo esc_attr($year); ?>"><?php echo esc_html($year); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div>
                    <label class="text-sm font-medium mb-2 block">Регион</label>
                    <select name="region" class="filter-select flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <option value="all">Все регионы</option>
                        <?php foreach ($regions as $region): ?>
                        <option value="<?php echo esc_attr($region); ?>"><?php echo esc_html($region); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div>
                    <label class="text-sm font-medium mb-2 block">Сумма долга</label>
                    <select name="debt_range" class="filter-select flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <option value="all">Любая сумма</option>
                        <?php foreach ($debt_ranges as $index => $range): ?>
                        <option value="<?php echo esc_attr($index); ?>"><?php echo esc_html($range['label']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="md:col-span-3 flex gap-2">
                    <button type="button" id="apply-filters" class="bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                        Применить фильтры
                    </button>
                    <button type="button" id="reset-filters" class="border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                        Сбросить
                    </button>
                </div>
            </form>
            
            <div class="mt-4 text-sm text-muted-foreground">
                Найдено кейсов: <span id="cases-count" class="font-medium">0</span>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}

// Initialize the filter class
new UDSC_Case_Studies_Filter();
