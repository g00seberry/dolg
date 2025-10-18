<?php
/**
 * Block Name: Two Columns List
 * Description: Двухколоночный список
 */

// Получаем данные из ACF полей
$data = $args['data'];
$columns = $data['columns'] ?? [];
?>
<section class="py-20">
    <div class="container mx-auto">
    <?php if ($columns): ?>
<div class="grid lg:grid-cols-2 gap-12 mb-16">
    <?php foreach ($columns as $column): ?>
        <?php
        $title = $column['title'];
        $icon_color = $column['icon_color'] ?? 'blue';
        $items = $column['items'] ?? [];
        
        // Определяем классы для иконок в зависимости от цвета
        $icon_classes = '';
        $icon_svg = '';
        
        switch ($icon_color) {
            case 'blue':
                $icon_classes = 'h-5 w-5 text-primary mt-0.5';
                $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text ' . $icon_classes . '"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path><path d="M14 2v4a2 2 0 0 0 2 2h4"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg>';
                break;
            case 'green':
                $icon_classes = 'h-5 w-5 text-success mt-0.5';
                $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big ' . $icon_classes . '"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>';
                break;
            case 'gray':
                $icon_classes = 'h-5 w-5 text-muted-foreground mt-0.5';
                $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle ' . $icon_classes . '"><circle cx="12" cy="12" r="10"></circle></svg>';
                break;
        }
        ?>
        
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-6">
            <!-- Заголовок колонки -->
            <?php if ($title): ?>
                <h2 class="text-2xl font-semibold mb-6">
                    <?php echo esc_html($title); ?>
        </h2>
            <?php endif; ?>
            
            <!-- Список пунктов -->
            <?php if ($items): ?>
                <ul class="space-y-3">
                    <?php foreach ($items as $item): ?>
                        <?php $text = $item['text']; ?>
                        <?php if ($text): ?>
                            <li class="flex items-start gap-3">
                                <?php echo $icon_svg; ?>
                                <span>
                                    <?php echo esc_html($text); ?>
                </span>
            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
        </ul>
            <?php endif; ?>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

    </div>
</section>
