# Сканер портов nmap

Установка: 
yum install nmap


Версия программы nmap:
nmap --version


Сканирование указанного IP адреса или хоста (FQDN):
nmap 1.2.3.4
nmap localhost
nmap 192.168.1.1


The -v option forces verbose output and the -A optipn enables OS detection and Version detection, Script scanning and traceroute in a single command:
nmap -v -A scanme.nmap.org
nmap -v -A 192.168.1.1


Сканирование диапазона IP адресов
nmap 192.168.1.1-50

Сканирование подсети
nmap 192.168.1.0/24

Ping only scan
nmap -sP 192.168.1.1

TCP SYN scan
nmap -sS 192.168.1.1

UDP scan
nmap -sU 192.168.1.1
IP protocol scan
nmap -sO 192.168.1.1

Сканирование портов 80, 25, 443, and 110
nmap -p 80,25,443,110 192.168.1.1

Сканирование диапазона портов 1024-2048
nmap -p 1024-2048 192.168.1.1

Определение операционной системы
nmap -O --osscan-guess 192.168.1.1


http://www.cyberciti.biz/faq/howto-install-nmap-on-centos-rhel-redhat-enterprise-linux/