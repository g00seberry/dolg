<?php
/**
 * Pricing Table Block Template
 * Детальная таблица цен для услуг банкротства
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$section_title = get_field('section_title') ?: 'Детальная таблица цен';
$section_description = get_field('section_description') ?: 'Полный перечень услуг с прозрачным ценообразованием';
$disclaimer = get_field('disclaimer') ?: '* Окончательная стоимость определяется индивидуально после анализа вашей ситуации';

// Массив услуг для таблицы
$pricing_services = get_field('pricing_services') ?: array(
    array(
        'name' => 'Бесплатная консультация',
        'description' => 'Анализ ситуации, оценка перспектив банкротства',
        'duration' => '30 мин',
        'price' => 'Бесплатно',
        'price_class' => 'text-success',
        'highlight' => false
    ),
    array(
        'name' => 'Базовый пакет банкротства',
        'description' => 'Полное сопровождение процедуры физлица',
        'duration' => '2-4 месяца',
        'price' => 'от 25 000 ₽',
        'price_class' => '',
        'highlight' => true
    ),
    array(
        'name' => 'Премиум пакет',
        'description' => 'Максимальная защита интересов и имущества',
        'duration' => '2-6 месяцев',
        'price' => 'от 45 000 ₽',
        'price_class' => '',
        'highlight' => false
    ),
    array(
        'name' => 'Корпоративное банкротство',
        'description' => 'Банкротство ООО, ИП с защитой учредителей',
        'duration' => '6-12 месяцев',
        'price' => 'от 150 000 ₽',
        'price_class' => '',
        'highlight' => false
    ),
    array(
        'name' => 'Реструктуризация долгов',
        'description' => 'Досудебное урегулирование с кредиторами',
        'duration' => '1-3 месяца',
        'price' => 'от 15 000 ₽',
        'price_class' => '',
        'highlight' => false,
        'border_top' => true
    ),
    array(
        'name' => 'Защита от коллекторов',
        'description' => 'Правовая защита от незаконных действий',
        'duration' => 'по факту',
        'price' => 'от 10 000 ₽',
        'price_class' => '',
        'highlight' => false
    ),
    array(
        'name' => 'Списание долгов ЖКХ',
        'description' => 'Оспаривание незаконных начислений ЖКХ',
        'duration' => '2-4 месяца',
        'price' => 'от 8 000 ₽',
        'price_class' => '',
        'highlight' => false
    ),
    array(
        'name' => 'Представительство в суде',
        'description' => 'Разовое участие в судебном заседании',
        'duration' => '1 заседание',
        'price' => 'от 5 000 ₽',
        'price_class' => '',
        'highlight' => false
    ),
    array(
        'name' => 'Подготовка документов',
        'description' => 'Составление исковых заявлений, жалоб',
        'duration' => '3-7 дней',
        'price' => 'от 3 000 ₽',
        'price_class' => '',
        'highlight' => false
    ),
    array(
        'name' => 'Срочная консультация',
        'description' => 'Консультация в нерабочее время, выходные',
        'duration' => '1 час',
        'price' => 'от 2 000 ₽',
        'price_class' => '',
        'highlight' => false
    )
);
?>

<!-- Pricing Table -->
<section class="section bg-muted/30">
    <div class="container">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4">
                <?php echo esc_html($section_title); ?>
            </h2>
            <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
                <?php echo esc_html($section_description); ?>
            </p>
        </div>

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
                            <?php foreach ($pricing_services as $service): ?>
                                <tr class="hover:bg-muted/50 <?php echo $service['highlight'] ? 'bg-primary/5' : ''; ?> <?php echo isset($service['border_top']) && $service['border_top'] ? 'border-t-2 border-primary/20' : ''; ?>">
                                    <td class="p-4 font-medium"><?php echo esc_html($service['name']); ?></td>
                                    <td class="p-4 text-muted-foreground"><?php echo esc_html($service['description']); ?></td>
                                    <td class="p-4 text-muted-foreground"><?php echo esc_html($service['duration']); ?></td>
                                    <td class="p-4 text-right font-semibold <?php echo esc_attr($service['price_class']); ?>"><?php echo esc_html($service['price']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="bg-muted/50 p-4 text-center">
                    <p class="text-sm text-muted-foreground">
                        <?php echo esc_html($disclaimer); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
