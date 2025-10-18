<?php
/**
 * Block Name: Education
 * Description: Блок образования
 */

// Получаем данные из ACF полей
$data = $args['data'];
$education_list = $data['education_list'] ?? [];

// Если нет данных, не выводим блок
if (empty($education_list)) {
    return;
}

?>

<section class="pb-20 bg-card/30">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12">
            Образование
        </h2>
        <div class="space-y-6">
            <?php foreach ($education_list as $education): ?>
                <?php
                $institution = $education['institution'] ?? '';
                $specialty = $education['specialty'] ?? '';
                $year = $education['year'] ?? '';
                
                // Пропускаем если нет основных данных
                if (empty($institution) && empty($specialty)) {
                    continue;
                }
                ?>
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-6">
                    <div class="p-0">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div>
                                <?php if ($specialty): ?>
                                    <h3 class="text-xl font-semibold">
                                        <?php echo esc_html($specialty); ?>
                                    </h3>
                                <?php endif; ?>
                                
                                <?php if ($institution): ?>
                                    <p class="text-lg text-muted-foreground">
                                        <?php echo esc_html($institution); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            
                            <?php if ($year): ?>
                                <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground self-start md:self-center">
                                    <?php echo esc_html($year); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
