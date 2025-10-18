<?php
/**
 * Block Name: Pricing Table
 * Description: Детальная таблица цен
 */

// Получаем данные из ACF полей
$data = $args['data'];
$section_title = $data['section_title'];
$section_subtitle = $data['section_subtitle'];
$table = $data['table'] ?? [];
$note = $data['note'];

// Обработка заголовка с помощью утилитарной функции
$title_html = udsc_parse_title_with_tag($section_title, 'h2', 'text-3xl lg:text-4xl font-bold mb-4');
?>

<!-- Pricing Table -->
<section class="section bg-muted/30">
    <div class="container">
        <!-- Section Header -->
        <?php if ($section_title || $section_subtitle): ?>
            <div class="text-center mb-12">
                <?php if ($title_html): ?>
                    <?php echo $title_html; ?>
                <?php endif; ?>
                
                <?php if ($section_subtitle): ?>
                    <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
                        <?php echo nl2br(esc_html($section_subtitle)); ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Table -->
        <?php if ($table): ?>
            <div class="max-w-6xl mx-auto">
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-primary text-primary-foreground">
                                <tr>
                                    <th class="text-left p-4 font-semibold">Услуга</th>
                                    <th class="text-left p-4 font-semibold">Описание</th>
                                    <th class="text-left p-4 font-semibold">Срок</th>
                                    <th class="text-right p-4 font-semibold">Стоимость</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-border">
                                <?php foreach ($table as $index => $service): ?>
                                    <?php
                                    $name = $service['name'];
                                    $description = $service['description'];
                                    $term = $service['term'];
                                    $price = $service['price'];
                                    
                                    // Определяем стили для строки
                                    $is_highlighted = false; // Можно добавить логику для выделения
                                    $has_border_top = false; // Можно добавить логику для верхней границы
                                    $price_class = '';
                                    
                                    // Определяем класс для цены
                                    if ($price && (strpos(strtolower($price), 'бесплатно') !== false || strpos(strtolower($price), 'бесплатн') !== false)) {
                                        $price_class = 'text-success';
                                    }
                                    ?>
                                    
                                    <tr class="hover:bg-muted/50 <?php echo $is_highlighted ? 'bg-primary/5' : ''; ?> <?php echo $has_border_top ? 'border-t-2 border-primary/20' : ''; ?>">
                                        <td class="p-4 font-medium">
                                            <?php echo esc_html($name); ?>
                                        </td>
                                        <td class="p-4 text-muted-foreground">
                                            <?php echo esc_html($description); ?>
                                        </td>
                                        <td class="p-4 text-muted-foreground">
                                            <?php echo esc_html($term); ?>
                                        </td>
                                        <td class="p-4 text-right font-semibold <?php echo esc_attr($price_class); ?>">
                                            <?php echo esc_html($price); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Note -->
                    <?php if ($note): ?>
                        <div class="bg-muted/50 p-4 text-center">
                            <p class="text-sm text-muted-foreground">
                                <?php echo nl2br(esc_html($note)); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
