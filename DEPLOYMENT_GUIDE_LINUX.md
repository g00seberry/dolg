# Руководство по исправлению 500 ошибки на Linux хостинге

## Основные причины 500 ошибки при переносе с Windows на Linux

### 1. Case-sensitivity (регистр символов)

Linux различает заглавные и строчные буквы в именах файлов, Windows - нет.

### 2. Права доступа к файлам

На Linux хостинге нужно правильно настроить права доступа.

## Исправления уже внесены в код

### ✅ Исправлена проблема с подключением компонентов

- Добавлены проверки существования файлов в `header.php`
- Добавлены проверки существования файлов в `MainNav.php`

### ✅ Исправлена проблема с динамическими блоками

- Добавлена безопасная загрузка блоков в `page.php`
- Добавлено логирование отсутствующих блоков

### ✅ Добавлены функции отладки

- Новая функция `udsc_safe_get_template_part()` в `functions.php`
- Функция логирования ошибок `udsc_log_error()`

## Шаги для развертывания на Linux хостинге

### 1. Обновите wp-config.php

Скопируйте содержимое файла `wp-config-production.php` в ваш `wp-config.php` на хостинге:

```bash
# Замените следующие параметры:
DB_NAME - имя вашей базы данных
DB_USER - пользователь базы данных
DB_PASSWORD - пароль базы данных
WP_HOME - ваш домен (https://your-domain.com)
WP_SITEURL - ваш домен (https://your-domain.com)

# Сгенерируйте новые ключи безопасности:
# https://api.wordpress.org/secret-key/1.1/salt/
```

### 2. Установите правильные права доступа

```bash
# Для папок:
find /path/to/your/site/ -type d -exec chmod 755 {} \;

# Для файлов:
find /path/to/your/site/ -type f -exec chmod 644 {} \;

# Для wp-config.php:
chmod 600 wp-config.php

# Для .htaccess:
chmod 644 .htaccess
```

### 3. Проверьте структуру файлов

Убедитесь что все файлы с заглавными буквами существуют:

- `wp-content/themes/udsc/MainNav.php`
- `wp-content/themes/udsc/inc/components/ContactBar.php`
- `wp-content/themes/udsc/inc/components/Logo.php`

### 4. Проверьте лог ошибок

После загрузки проверьте файл `/wp-content/debug.log` для выявления проблем.

### 5. Дополнительные проверки PHP

#### Минимальные требования:

- PHP 7.4+
- Memory Limit: 512M (установлен в конфигурации)
- Extension: mysqli, gd, curl, zip

#### Проверьте расширения PHP:

```bash
php -m | grep -E "(mysqli|gd|curl|zip|mbstring)"
```

## Возможные дополнительные проблемы

### Проблема с кодировкой файлов

Если файлы сохранены в Windows-1251, пересохраните их в UTF-8:

```bash
# Конвертация кодировки (если нужно)
iconv -f windows-1251 -t utf-8 file.php > file_utf8.php
```

### Проблема с переносами строк

Если файлы имеют Windows переносы строк:

```bash
# Конвертация CRLF в LF
dos2unix *.php
```

### .htaccess файл

Убедитесь что файл `.htaccess` существует в корне сайта:

```apache
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
```

## Отладка проблем

### 1. Включите отладку WordPress

В `wp-config.php` уже настроено:

```php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
```

### 2. Проверьте лог ошибок

```bash
tail -f /wp-content/debug.log
```

### 3. Проверьте лог веб-сервера

```bash
# Apache
tail -f /var/log/apache2/error.log

# Nginx
tail -f /var/log/nginx/error.log
```

## Контрольный список

- [ ] Скопированы все файлы темы
- [ ] Обновлен wp-config.php с правильными данными
- [ ] Установлены права доступа 755/644
- [ ] Проверена кодировка файлов (UTF-8)
- [ ] Конвертированы переносы строк (LF)
- [ ] Создан/проверен .htaccess
- [ ] Импортирована база данных
- [ ] Обновлены URL в базе данных
- [ ] Проверен лог ошибок

## В случае продолжающихся проблем

1. Временно переименуйте тему на стандартную (twenty-twenty-four)
2. Проверьте работоспособность сайта
3. Если работает - проблема в теме
4. Включите тему обратно и проверьте debug.log

## Контакты для помощи

Если проблемы продолжаются, предоставьте:

- Содержимое debug.log
- Сообщение об ошибке в браузере
- Версию PHP на хостинге
- Тип веб-сервера (Apache/Nginx)
