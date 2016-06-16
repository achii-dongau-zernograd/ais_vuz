# Firewalld

<p>firewalld это надстройка над iptables (он как и iptables использует для работы iptables tool и управляет тем же сетевым фильтром ядра).</p>
<p>firewalld хранит свои настройки в XML файлах, размещенных в папках /usr/lib/firewalld/ и /etc/firewalld/</p>


Открыть порт 5280 tcp (22 tcp по умолчанию открыт) и перезагрузить правила межсетевого экрана с сохранением информации о состоянии:

####firewall-cmd --zone=public --add-port=5280/tcp --permanent
####firewall-cmd --reload

параметр --permanent добавлен для того, чтобы изменения хранились постоянно. Если его опустить, то настройки пропадут после перезагрузки.


Cписок открытых портов:
####firewall-cmd --zone=public --list-ports

Cписок сервисов, порты для которых открыты (т.е. сервисы добавлены в зону public):
####firewall-cmd --zone=public --list-services

В зону можно добавлять как порт, так и сервис. Если в зону public добавлен сервис, то порт, на котором он работает, не отображается в списке портов.


Ресурсы:
<ul>
<li>http://kyrych.ru/linux/firewall/25-nastrojka-firewalld Блог системного администратора. Настройка Firewalld</li>
<li>http://kyrych.ru/linux/32-linuxfirewall/56-shpargalka-po-parametram-fierwalld-cmd Блог системного администратора. Шпаргалка по параметрам fierwalld-cmd или опять настройка firewalld</li>
</ul>