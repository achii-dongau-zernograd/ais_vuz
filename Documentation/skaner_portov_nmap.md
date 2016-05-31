# Сканер портов nmap

Установка: 
yum install nmap


To find out nmap version, run:
nmap --version


To scan an IP address or a host name (FQDN), run:
nmap 1.2.3.4
nmap localhost
nmap 192.168.1.1


The -v option forces verbose output and the -A optipn enables OS detection and Version detection, Script scanning and traceroute in a single command:
nmap -v -A scanme.nmap.org
nmap -v -A 192.168.1.1


To scan a range of IP addresses
nmap 192.168.1.1-50

To scan an entire subnet
nmap 192.168.1.0/24

Ping only scan
nmap -sP 192.168.1.1

TCP SYN scan
nmap -sS 192.168.1.1

UDP scan
nmap -sU 192.168.1.1
IP protocol scan
nmap -sO 192.168.1.1

Scan port 80, 25, 443, and 110
nmap -p 80,25,443,110 192.168.1.1

Scan port ranges 1024-2048
nmap -p 1024-2048 192.168.1.1

Operating system detection
nmap -O --osscan-guess 192.168.1.1


http://www.cyberciti.biz/faq/howto-install-nmap-on-centos-rhel-redhat-enterprise-linux/