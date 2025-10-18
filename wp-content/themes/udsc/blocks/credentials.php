<?php
/**
 * Block Name: Credentials
 * Description: Блок достижений и квалификации
 */

// Получаем данные из ACF полей
$data = $args['data'];
$achievements = $data['achievements'] ?? [];

// Если нет данных, не выводим блок
if (empty($achievements)) {
    return;
}

?>

<section class="pb-20">
    <div class="container mx-auto">
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm p-8">
            <h3 class="text-2xl font-semibold mb-6">
                Достижения и квалификация
            </h3>
            <div class="grid md:grid-cols-2 gap-6">
                <?php foreach ($achievements as $achievement): ?>
                <?php
            $text = $achievement['text'] ?? '';
            if (empty($text)) {
                continue;
            }
            ?>
                <div class="flex items-start gap-3">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-circle-check-big w-5 h-5 text-primary mt-0.5 flex-shrink-0"
                    >
                        <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                        <path d="m9 11 3 3L22 4"></path>
                    </svg>
                    <span>
                        <?php echo esc_html($text); ?>
                    </span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
