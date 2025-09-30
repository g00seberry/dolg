<?php
/**
 * Main CTA Block Template
 * Hero Section для банкротства физических лиц
 */

// Получаем данные блока (если используется ACF или аналогичные поля)
$heading = get_field('heading') ?: 'Банкротство физических лиц';
$description = get_field('description') ?: 'Законное списание долгов и защита от кредиторов. Профессиональное сопровождение процедуры банкротства с гарантией результата.';
$hero_image = get_field('hero_image') ?: get_template_directory_uri() . '/assets/images/hero-image.jpg';
?>

<!-- Hero Section -->
 
<section class="relative bg-gradient-to-br from-background to-subtle py-16 lg:py-24">
    <div class="container">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-6xl font-bold text-balance mb-6">
                    <?php echo esc_html($heading); ?>
                </h1>
                <p class="text-xl text-muted-foreground mb-8 text-balance">
                    <?php echo esc_html($description); ?>
                </p>
                
                <!-- Статистика -->
                <div class="grid sm:grid-cols-3 gap-4 mb-8">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-primary">500+</div>
                        <div class="text-sm text-muted-foreground">Успешных дел</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-primary">98%</div>
                        <div class="text-sm text-muted-foreground">Положительных решений</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-primary">12</div>
                        <div class="text-sm text-muted-foreground">Лет опыта</div>
                    </div>
                </div>

                <!-- Кнопки -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="tel:<?php echo esc_attr(udsc_get_contact_phone()); ?>" 
                       class="inline-flex items-center justify-center whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                        <svg class="mr-2 h-5 w-5 pointer-events-none shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Бесплатная консультация
                    </a>
                    <a href="#calculator" 
                       class="inline-flex items-center justify-center gap-2 whitespace-nowrap h-11 rounded-md px-8 text-sm font-medium border border-input bg-background hover:bg-accent hover:text-accent-foreground ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                        Рассчитать стоимость
                    </a>
                </div>
            </div>
            
            <!-- Изображение -->
            <div class="relative">
                <img src="<?php echo esc_url($hero_image); ?>" 
                     alt="Юридическая консультация по банкротству в офисе"
                     class="rounded-lg shadow-lg w-full h-auto object-cover"
                     loading="lazy">
            </div>
        </div>
    </div>
</section>


<div class="flex justify-center">
  <button type="button" data-toggle="modal" data-target="#exampleModal" class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md py-2 px-4 shadow-sm hover:shadow-md bg-slate-800 border-slate-800 text-slate-50 hover:bg-slate-700 hover:border-slate-700"> Open </button>
  <div class="fixed inset-0 bg-slate-950/50 flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 ease-out z-[9999]" id="exampleModal" aria-hidden="true">
    <div class="bg-white rounded-xl shadow-2xl shadow-slate-950/5 border border-slate-200 w-1/3 scale-95">
      <div class="p-4 pb-2 flex justify-between items-center">
        <h1 class="text-lg text-slate-800 font-semibold">Material Tailwind</h1>
        <button type="button" data-dismiss="modal" aria-label="Close" class="inline-grid place-items-center border align-middle select-none font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none data-[shape=circular]:rounded-full text-sm min-w-[34px] min-h-[34px] rounded-md bg-transparent border-transparent text-slate-200-foreground hover:bg-slate-200/10 hover:border-slate-200/10 shadow-none hover:shadow-none outline-none absolute right-2 top-2">
          <svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-5 w-5"><path d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        </button>
      </div>
      <div class="p-4 pt-2 text-slate-600"> Material Tailwind is an open-source library that uses the power of Tailwind CSS and React to help you build unique web projects faster and easier. The stunning design inspired by Material Design is a bonus! Get Material Tailwind and take advantage of its free components and features that will help you set up your web project quickly. </div>
      <div class="p-4 flex justify-end gap-2">
        <button type="button" data-dismiss="modal" class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md py-2 px-4 bg-transparent border-transparent text-red-500 hover:bg-red-500/10 hover:border-red-500/10 shadow-none hover:shadow-none outline-none">Close</button>
        <button type="button" class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md py-2 px-4 shadow-sm hover:shadow-md bg-slate-800 border-slate-800 text-slate-50 hover:bg-slate-700 hover:border-slate-700">Get Started</button>
      </div>
    </div>
  </div>
</div>