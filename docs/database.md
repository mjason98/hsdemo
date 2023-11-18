## Configuration

In this project, MySQL has been chosen as the database manager. Feel free to opt for another relational database of your preference by adjusting the configuration in the respective locations.

You can utilize an installed/remote MySQL database or set up a local one using Docker:

```shell
docker run -d --name mysql_docker -p 3306:3306 --env MYSQL_ROOT_PASSWORD=root --env MYSQL_ROOT_HOST=% mysql:latest
```

Connect to the MySQL instance and create the database:

```shell
mysql -h127.0.0.1 -uroot -proot

[]> create database hsdemo;
[]> exit;
```

Lastly, update the `.env` file in the root folder of the project with the connection configuration for the database.

### Laravel Migrations

To execute your initial migrations, use the following command:

```shell
php artisan migrate:fresh --seed
```

## RDB Design

The database structure for this project follows the design depicted below:

<p align="center"><img src="images/db_architecture.png" width="900" alt="DB design"></p>