<p align="center"><img src="logo.png" width="500" alt="Xochi Logo"></p>

# Xochi

This app mirrors the format of social media platforms but centers around sharing and discovering food recipes.

## Demo

For a live demo, follow this [link](https://xochi.harbourspace.site/)

## Requirements

 * php
 * composer
 * mysql databse (local or external provider)
 * php gd extention package

## Environment variables

The environmental variables will be configured within the *.env* file. If it doesn't exist, duplicate the *.env.example* file and create a new *.env* file. Subsequently, modify the relevant variables within the *.env* file.

```shell
cp .env.example .env
```

Here are the mandatory configuration variables that need to be set in the .env file:

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

### Database

```txt
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hsdemo
DB_USERNAME=root
DB_PASSWORD=root
```

## Instalation Instructions


First, download the repository by using the following Git command:

```shell
git clone https://github.com/mjason98/hsdemo
cd hsdemo
```

### MediaLibrary

Before installing all dependencies, make sure to have the ext-exif extension enabled for PHP, as it is necessary for MediaLibrary.

For Linux, you can uncomment specific lines in the php.ini file, usually located in */etc/php/php.ini*. Look for the following lines and remove the semicolon (;) at the beginning if present:

```ini
;extension=exif
;extension=gd
```
On Arch Linux, you can install the GD extension for PHP using the following command:

```shell
sudo pacman -Ss php-gd
```

### Databse

To enable the MySQL extension for PHP on Linux, you might need to uncomment a line in the `php.ini` file. Follow these general steps:

1. Open the `php.ini` file using a text editor. The location of this file may vary depending on your Linux distribution. Common paths include `/etc/php/php.ini` or `/etc/php.ini`. You might need superuser privileges to edit this file.

    ```bash
    sudo nano /etc/php/php.ini
    ```

    Replace `nano` with your preferred text editor (e.g., `vim` or `gedit`).

2. Look for the following line (it may be commented out with a semicolon `;` at the beginning):

    ```ini
    ;extension=mysqli
    ;extension=pdo_mysql
    ```

3. Uncomment the line by removing the semicolon:

    ```ini
    extension=mysqli
    extension=pdo_mysql
    ```

4. Save the changes and close the text editor.

For database configuration, please refer to the instructions provided in [this document](docs/database.md).

### Final steps

Install all dependencies using Composer:

```shell
composer install
```

Run the symbolic linker for storage:

```shell
php artisan storage:link
```

Ensure to configure the environmental variables if needed, especially for the email provider and the database connection in the `.env` file.

## Run the server

Execute the following command:

```shell
php artisan serve
```



