<?php
/**
 * Block Name: Lawyer Credentials
 * Description: Карточка юриста
 */

// Получаем данные из ACF полей
$data = $args['data'];
$photo = $data['photo'];
$badge = $data['badge'];
$name = $data['name'];
$description = $data['description'];
$facts = $data['facts'] ?? [];
?>

<!-- Lawyer Credentials Section -->
<section class="section bg-muted/20">
    <div class="container">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left column - Image -->
            <?php if ($photo): ?>
                <div>
                    <img src="<?php echo esc_url($photo['url']); ?>" 
                         alt="<?php echo esc_attr($photo['alt'] ?: $name . ' - юрист по банкротству'); ?>"
                         class="rounded-lg shadow-md w-full max-w-md mx-auto"
                         loading="lazy">
                </div>
            <?php endif; ?>
            
            <!-- Right column - Content -->
            <div>
                <!-- Award badge -->
                <?php if ($badge): ?>
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                        <span class="text-sm font-medium text-primary"><?php echo esc_html($badge); ?></span>
                    </div>
                <?php endif; ?>
                
                <!-- Name -->
                <?php if ($name): ?>
                    <h2 class="text-3xl font-bold mb-4">
                        <?php echo esc_html($name); ?>
                    </h2>
                <?php endif; ?>
                
                <!-- Description -->
                <?php if ($description): ?>
                    <p class="text-muted-foreground mb-6">
                        <?php echo nl2br(esc_html($description)); ?>
                    </p>
                <?php endif; ?>
                
                <!-- Facts list -->
                <?php if ($facts): ?>
                    <div class="space-y-3 mb-6">
                        <?php foreach ($facts as $fact): ?>
                            <?php
                            $fact_text = $fact['text'] ?? '';
                            if (empty($fact_text)) {
                                continue;
                            }
                            ?>
                            <div class="flex items-center gap-3">
                                <svg class="h-5 w-5 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span><?php echo esc_html($fact_text); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- CTA Button -->
                <button type="button" data-toggle="modal" data-target="#consultation-modal" class="inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                    Записаться на консультацию
                </button>
            </div>
        </div>
    </div>
</section>


