# Laravel



##Установка Laravel

С помощью установщика Laravel
Загрузим установщик Laravel с помощью Composer
composer global require "laravel/installer=~1.1"

Поместим каталог ~/.composer/vendor/bin в переменную PATH, чтобы исполняемый файл laravel мог быть найден системой ( http://sergeyivanov.ru/it/linux/dobavlenie-peremennyh-okruzheniya-path-centos.html )


После установки простая команда laravel new произведёт установку свежего Laravel в указанный каталог. Например, laravel new blog создаст каталог с именем blog, содержащий свежий Laravel со всеми установленными зависимостями. Этот способ установки намного быстрее, чем установка с помощью Composer:

laravel new blog






##Настройка

Для соединения с базой данных (далее БД) у Laravel есть конфигурационный файл database.php, находится он в папке app/config/.
Сначала создадим БД и пользователя в MySQL

mysql -u root -p 
#### Введите свой пароль
> CREATE DATABASE `aisvuz` CHARACTER SET utf8 COLLATE utf8_general_ci;
> CREATE USER 'aisvuz'@'localhost' IDENTIFIED BY 'my_password';
> GRANT ALL PRIVILEGES ON aisvuz.* TO 'aisvuz'@'localhost';
> exit








##Запуск проекта
Перейти в папку с проектом и ввести
###php artisan serve



#Ресурсы:
https://www.youtube.com/watch?v=QsBqsbMPRNA Установка Laravel 5.2 на CentOS 7
https://habrahabr.ru/post/197454/ Установка, настройка, создание и деплой приложения
https://ru.wikipedia.org/wiki/Laravel
http://angrydeer.ru/laravel 
http://angrydeer.ru/laravel/laravel-5-2-sajt-s-nulya-i-do-zapuska-ch-1-vstuplenie#more-9
https://laravel.ru Laravel по-русски

https://gist.github.com/barryvdh/5227822 Хелпер-файл Laravel для Netbeans
http://arhamzul.com/laravel-5-netbeans/ Установка хелпер-файла Laravel для Netbeans


http://blog.phpdreamer.ru/простой-блог-на-Laravel-5.html Простой блог на фреймворке Laravel 5
