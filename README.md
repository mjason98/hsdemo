<p align="center"><img src="logo.png" width="500" alt="Xochi Logo"></p>

# Xochi

This is a social media like app, for food recipes.

## Demo

## Requirements

 * php
 * composer
 * mysql databse (local or external provider)
 * php gd extention package

## Environment variables

## Instalation Instructions

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

Run the symbolik linker for the storage:
```shell
php artisan storage:link
```



