## OffTopic: a Web Widget for Mailing Lists

## Install

    git clone https://github.com/madbob/offtopic.git
    cd offtopic
    pecl install mailparse
    composer install
    cp .env.sample .env
    [edit the .env file accordly to your local settings]
    php artisan migrate
    php artisan key:generate


To pipe mails incoming to your exim4 instance, put in the aliases file a line like this:

    offtopic@madbob.org : "| /usr/bin/php -q /var/www/offtopic/artisan --env=local parse"

For further details about other mail servers, get a look here: 
http://www.sitepoint.com/piping-emails-laravel-application/


Alternatively, if you do not manage system aliases or use a different MTA, you can run in cron a command like this

    php artisan maildir /var/mail/madbob.org/offtopic/new/

Pointing to the local Maildir of your account, to parse messages found there. Be aware: parsed files are deleted!


Your nginx configuration should look like this:

    server {
     listen   80;
     server_name  ot.madbob.org;
     root   /var/www/offtopic/public/;
     index  index.php index.html index.htm;
     location / {
      try_files $uri $uri/ /index.php?$query_string;
     }
     location ~ \.php$ {
      try_files       $uri /index.php =404;
      fastcgi_pass   unix:/var/run/php5-fpm.sock;
      fastcgi_param  SCRIPT_FILENAME $document_root$fastcgi_script_name;
      include        fastcgi_params;
     }
    }

