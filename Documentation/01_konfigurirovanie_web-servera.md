# Часть 1. Конфигурирование веб-сервера

В качестве серверной операционной системы используется CentOS 7 (https://www.centos.org/download/).
ОС установлена в режиме "Веб-сервер".

1. Обновление всех установленных пакетов<br>
<b>yum update</b>

2. Устанавливаем Midnight commander<br>
<b>yum install mc</b>

3. Устанавливаем текстовый веб-сервер Elinks<br>
<b>yum install elinks</b>

4. Установка веб-сервера Apache<br>
<b>yum install httpd -y</b>

5. Поставить Apache в автозагрузку<br>
<b>systemctl enable httpd.service</b>

6. Запускаем Apache<br>
<b>systemctl start httpd.service</b>

7. Проверяем, работает ли веб-сервер.<br>
<b>elinks</b><br>
<b>http://localhost</b><br>
Если все сделано правильно и сервер работает, в браузере elinks будет отображена стартовая страница Apache.<br>
Закрываем браузер командой "q" ? или F10???

8. ук
9. 
