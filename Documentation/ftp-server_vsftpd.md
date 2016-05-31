# FTP-сервер vsftpd

yum -y install vsftpd


Конфигурационный файл /etc/vsftpd/vsftpd.conf

Запуск сервера в режиме службы
listen=YES

Работа в фоновом режиме
background=YES

Имя pam сервиса для vsftpd
pam_service_name=vsftpd

Входящие соединения контроллируются через tcp_wrappers
tcp_wrappers=YES

Запрещает подключение анонимных пользователей
anonymous_enable=NO

Каталог, куда будут попадать анонимные пользователи, если они разрешены
anon_root=/var/asuvuz_data/ftp/share

Разрешает вход для локальных пользователей
local_enable=YES

Разрешены команды на запись и изменение
write_enable=YES

Указывает исходящим с сервера соединениям использовать 20-й порт
connect_from_port_20=YES

Логирование всех действий на сервере
xferlog_enable=YES

Путь к лог-файлу
xferlog_file=/var/log/vsftpd.log

Включение специальных ftp команд, некоторые клиенты без этого могут зависать
async_abor_enable=YES

Локальные пользователи по-умолчанию не могут выходить за пределы своего домашнего каталога
chroot_local_user=YES

Разрешить список пользователей, которые могут выходить за пределы домашнего каталога
chroot_list_enable=YES

Список пользователей, которым разрешен выход из домашнего каталога
chroot_list_file=/etc/vsftpd/chroot_list

Разрешить запись в корень chroot каталога пользователя
allow_writeable_chroot=YES

Контроль доступа к серверу через отдельный список пользователей
userlist_enable=YES

Файл со списками разрешенных к подключению пользователей
userlist_file=/etc/vsftpd/user_list

Пользователь будет отклонен, если его нет в user_list
userlist_deny=NO

Директория с настройками пользователей
user_config_dir=/etc/vsftpd/users

Показывать файлы, начинающиеся с точки
force_dot_files=YES

Маска прав доступа к создаваемым файлам
local_umask=022

Порты для пассивного режима работы
pasv_min_port=49000
pasv_max_port=55000

<hr>


Создаем необходимых пользователей, файлы и каталоги для установленной конфигурации. Добавим тестового пользователя ftp в систему:

useradd -s /sbin/nologin ftp-user
passwd ftp-user


Создаем каталог для персональных настроек пользователей:
mkdir /etc/vsftpd/users


В каталоге можно будет создать отдельно файлы с именами пользователей и передать им персональные параметры. Для примера создадим файл с именем пользователя ftp-user и укажем его домашний каталог:

touch /etc/vsftpd/users/ftp-user
echo 'local_root=/var/asuvuz_data/ftp/share' >> /etc/vsftpd/users/ftp-user

Не забываем создать этот каталог и назначить ему владельца:
mkdir /var/asuvuz_data/ftp/share && chmod 0777 /var/asuvuz_data/ftp/share
chown ftp-user. /var/asuvuz_data/ftp/share



Создаем файл c пользователями, которым можно выходить за пределы домашнего каталога:
touch /etc/vsftpd/chroot_list

Добавляем туда рута:
echo 'root' >> /etc/vsftpd/chroot_list


Создаем файл со списком пользователей ftp, которым разрешен доступ к серверу:
touch /etc/vsftpd/user_list
echo 'root' >> /etc/vsftpd/user_list && echo 'ftp-user' >> /etc/vsftpd/user_list
Этим списком мы можем ограничить доступ к ftp серверу системных пользователей, которым туда ходить не нужно.

Создадим файл для логов:
touch /var/log/vsftpd.log && chmod 600 /var/log/vsftpd.log

Все готово для работы. Добавляем vsftpd в автозагрузку и запускаем:
systemctl enable vsftpd
systemctl start vsftpd

Проверяем, запустился ли он:
netstat -tulnp | grep vsftpd




http://serveradmin.ru/ustanovka-i-nastroyka-ftp-servera-na-centos-7/