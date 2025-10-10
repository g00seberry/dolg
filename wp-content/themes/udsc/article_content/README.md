# Article Content Components

Набор компонентов для обработки ACF flexible content в статьях WordPress.

## Структура

```
article_content/
├── article-content.php          # Основной обработчик
├── hero-block.php              # Блок героя статьи
├── intro-text.php              # Вводный текст
├── content-table.php           # Содержание статьи
├── list-section.php            # Секция со списком
├── columns-section.php         # Секция с колонками
├── steps-section.php           # Секция с шагами
├── debtor-section.php          # Секция о должнике
├── consequences-section.php    # Секция с последствиями
├── conclusion-section.php      # Заключительная секция
├── cta-block.php              # Блок призыва к действию
├── styles.css                 # Дополнительные стили
└── README.md                  # Документация
```

## Использование

### В шаблоне single.php или single-post.php

```php
<?php
// Подключить основной файл
require_once get_template_directory() . '/article_content/article-content.php';

// Отобразить содержимое статьи
display_article_content();
?>
```

### Получение данных программно

```php
<?php
// Получить данные flexible content
$flexible_content = get_article_flexible_content($post_id);

// Отрендерить содержимое
$content = render_article_content($flexible_content);
echo $content;
?>
```

### В functions.php

```php
// Подключить компоненты
require_once get_template_directory() . '/article_content/article-content.php';

// Добавить стили
function enqueue_article_styles() {
    wp_enqueue_style(
        'article-content-styles',
        get_template_directory_uri() . '/article_content/styles.css',
        array(),
        '1.0.0'
    );
}
add_action('wp_enqueue_scripts', 'enqueue_article_styles');
```

## Поддерживаемые блоки

### 1. Hero Block (layout_hero_block)

- Заголовок статьи
- Подзаголовок
- Автор
- Дата публикации
- Количество просмотров
- Изображение

### 2. Intro Text (layout_intro_text)

- Вводный текст с поддержкой WYSIWYG

### 3. Content Table (layout_content_table)

- Заголовок содержания
- Список ссылок на разделы

### 4. List Section (layout_list_section)

- Заголовок секции
- Описание
- Список элементов с иконками

### 5. Columns Section (layout_columns_section)

- Заголовок секции
- Две колонки с заголовками и списками

### 6. Steps Section (layout_steps_section)

- Заголовок секции
- Вводный текст
- Нумерованные шаги

### 7. Debtor Section (layout_debtor_section)

- Заголовок секции
- Вводный текст
- Список требований к должнику

### 8. Consequences Section (layout_consequences_section)

- Заголовок секции
- Вводный текст
- Положительные последствия
- Отрицательные последствия

### 9. Conclusion Section (layout_conclusion_section)

- Заголовок заключения
- Текст заключения

### 10. CTA Block (layout_cta_block)

- Текст призыва
- Кнопка с ссылкой

## Стили

Компоненты используют Tailwind CSS классы для стилизации. Дополнительные стили находятся в файле `styles.css`.

### Основные классы:

- `article-prose` - стили для текстового контента
- `article-card` - стили для карточек
- `article-button` - стили для кнопок
- `article-icon` - стили для иконок

## Требования

- WordPress 5.0+
- Advanced Custom Fields (ACF) Pro
- Tailwind CSS (рекомендуется)

## Настройка ACF

1. Создайте поле группы "Article Content"
2. Добавьте поле типа "Flexible Content" с именем "article_content"
3. Настройте layouts согласно структуре в `acf-article-flexible.json`

## Кастомизация

Каждый компонент можно легко кастомизировать, изменив соответствующий PHP файл. Все стили используют Tailwind CSS классы для максимальной гибкости.
