<?php
/**
 * Template part for empty case studies state
 *
 * @package udsc
 */
?>

<div class="p-12 text-center rounded-lg border bg-card text-card-foreground shadow-sm">
    <svg class="h-12 w-12 text-muted-foreground mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
    </svg>
    <h3 class="text-xl font-semibold mb-2">Кейсы не найдены</h3>
    <p class="text-muted-foreground mb-4">
        По выбранным фильтрам кейсы не найдены. Попробуйте изменить параметры поиска.
    </p>
    <a href="<?php echo get_post_type_archive_link('case_study'); ?>" 
       class="border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
        Сбросить фильтры
    </a>
</div>
