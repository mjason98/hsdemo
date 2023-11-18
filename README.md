<p align="center"><img src="logo.png" width="500" alt="Xochi Logo"></p>

# Xochi

This is a social media like app, for food recipes.


## Requirements

 * php
 * composer
 * mysql databse (local or external provider)
 * php gd extention package

## Environment variables

The enciromental variables will be configured in the *.env* file.
If it does not exist, copy *.env.example* to an *.env* file then change the respective variables in it.

```shell
cp .env.example .env
```

Here it is mentiones the ones that are mandatory configuration:

### Email

```txt
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## Instalation Instructions

Firs download the repository, or use git command:

```shell
git clone https://github.com/mjason98/hsdemo
cd hsdemo
```

### MediaLibrary

Before installing all dependencies, be shoure to have *ext-exif* ennabled for php, as it will be necesary for MediaLibary.

For linux, you can uncomment some lines in the php.init, usualy in */etc/php/php.ini*
```ini
;extension=exif
;extension=gd
```
make shure you have installed the dg extention for your linux distribution, for archlinux is:

```shell
sudo pacman -Ss php-gd
```

for other operating systems follow [this instructions](https://serverfault.com/questions/958910/install-and-enable-exif).


### Databse

For linux, you may need to enable mysql by uncommenting a line in the *php.init*:

```ini
;extension=mysqli
;extension=pdo_mysql
```

For the database configuration, follow this [instructions.](docs/database.md)

### Final steps

install all dependencies with composer:

```shell
composer install
```

Run the symbolik linker for the storage:
```shell
php artisan storage:link
```

make shure to configure the enviromental variables if needed, espesialy for the email provider an the database connection in the *.env* file.

## Run the server

use the following command:

```shell
php artisan serve
```



