<?php
/**
 * Block Name: Expertise
 * Description: Блок экспертизы и специализации
 */

// Получаем данные из ACF полей
$data = $args['data'];
$expertise_list = $data['expertise_list'] ?? [];

// Если нет данных, не выводим блок
if (empty($expertise_list)) {
    return;
}

?>

<section class="pb-20">
    <div class="container mx-auto max-w-6xl">
        <h2 class="text-3xl font-bold text-center mb-12">
            Экспертиза и специализация
        </h2>
        <div class="grid md:grid-cols-2 gap-8">
            <?php foreach ($expertise_list as $expertise): ?>
                <?php
                $title = $expertise['title'] ?? '';
                $years = $expertise['years'] ?? 0;
                $cases_count = $expertise['cases_count'] ?? 0;
                ?>
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-6 hover:shadow-lg transition-shadow">
                    <div class="p-0">
                        <?php if ($title): ?>
                            <h3 class="text-xl font-semibold mb-3">
                                <?php echo esc_html($title); ?>
                            </h3>
                        <?php endif; ?>
                        
                        <div class="flex justify-between items-center text-sm text-muted-foreground mb-4">
                            <?php if ($years): ?>
                                <span>
                                    Опыт: <?php echo esc_html($years); ?>+ лет
                                </span>
                            <?php endif; ?>
                            <?php if ($cases_count): ?>
                                <span>
                                    Дел: <?php echo esc_html($cases_count); ?>+
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="w-full bg-muted rounded-full h-2">
                            <div class="bg-primary h-2 rounded-full" style="width: 95%;"></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
