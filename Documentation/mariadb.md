

Вход: mysql -u root -p

Выход: quit;



Создать пользователя с полными правами, который сможет подключаться с любого хоста

GRANT ALL PRIVILEGES ON \`имя\_базы\`.\* TO myuser@'%' IDENTIFIED BY 'пароль';

