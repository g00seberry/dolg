<?php

$data = $args['data'];

$experience = $data['experience'];
$cases = $data['cases'];
$success_rate = $data['success_rate'];
$availability = $data['availability'];

?>

<section class="pb-20 bg-card/50">
    <div class="container mx-auto max-w-6xl">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl font-bold text-primary mb-2">
                    <?php echo $cases; ?>
                </div>
                <div class="text-muted-foreground">
                    Успешных дел
                </div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-primary mb-2">
                    <?php echo $experience; ?>
                </div>
                <div class="text-muted-foreground">
                    Лет опыта
                </div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-primary mb-2">
                    <?php echo $success_rate; ?>
                </div>
                <div class="text-muted-foreground">
                    Успешных кейсов
                </div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-primary mb-2">
                    <?php echo $availability; ?>
                </div>
                <div class="text-muted-foreground">
                    Поддержка клиентов
                </div>
            </div>
        </div>
    </div>
</section>
