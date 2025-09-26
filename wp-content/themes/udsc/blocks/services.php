<?php
/**
 * Services Preview Block Template
 * Секция с превью услуг
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$section_title = get_field('services_title') ?: 'Наши услуги';
$section_description = get_field('services_description') ?: 'Полный спектр юридических услуг по банкротству и защите от кредиторов';

// Массив услуг
$services = get_field('services_list') ?: [
    [
        'title' => 'Банкротство физических лиц',
        'description' => 'Полное сопровождение процедуры банкротства от подачи заявления до завершения',
        'link' => '/services/personal-bankruptcy',
        'icon' => 'shield'
    ],
    [
        'title' => 'Реструктуризация долгов',
        'description' => 'Законное снижение долговой нагрузки и оптимизация платежей',
        'link' => '/services/debt-restructuring',
        'icon' => 'calculator'
    ],
    [
        'title' => 'Юридическая защита',
        'description' => 'Защита от коллекторов и кредиторов, представительство в суде',
        'link' => '/services/legal-protection',
        'icon' => 'scale'
    ]
];

// Функция для получения SVG иконки
function get_service_icon($icon_name) {
    $icons = [
        'shield' => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>',
        'calculator' => '<rect width="16" height="20" x="4" y="2" rx="2"/><line x1="8" x2="16" y1="6" y2="6"/><line x1="16" x2="16" y1="14" y2="18"/><path d="M16 10h.01"/><path d="M12 10h.01"/><path d="M8 10h.01"/><path d="M12 14h.01"/><path d="M8 14h.01"/><path d="M12 18h.01"/><path d="M8 18h.01"/>',
        'scale' => '<path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1ZM2 16l3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m7 21 2-4-2-4"/><path d="m17 21-2-4 2-4"/><path d="M14 12h7"/><path d="M3 12h7"/>'
    ];
    
    return isset($icons[$icon_name]) ? $icons[$icon_name] : $icons['shield'];
}
?>

<!-- Services Preview Section -->
<section class="section">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4">
                <?php echo esc_html($section_title); ?>
            </h2>
            <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
                <?php echo esc_html($section_description); ?>
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($services as $service): ?>
                <div class="bg-card rounded-lg border p-6 hover:shadow-md transition-shadow">
                    <!-- Service Icon & Title -->
                    <div class="flex items-center gap-3 mb-4">
                        <svg class="h-8 w-8 text-primary shrink-0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <?php echo get_service_icon($service['icon']); ?>
                        </svg>
                        <h3 class="text-xl font-semibold"><?php echo esc_html($service['title']); ?></h3>
                    </div>
                    
                    <!-- Service Description -->
                    <p class="text-muted-foreground mb-6">
                        <?php echo esc_html($service['description']); ?>
                    </p>
                    
                    <!-- Service Link Button -->
                    <a href="<?php echo esc_url($service['link']); ?>" 
                       class="inline-flex items-center justify-center whitespace-nowrap w-full h-10 px-4 py-2 text-sm font-medium border border-input bg-background hover:bg-accent hover:text-accent-foreground rounded-md ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                        Подробнее
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
