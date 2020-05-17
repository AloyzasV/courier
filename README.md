# Service ordering application

This application allows user to order flowers or coffee. Courier can access all orders in JSON or XML format. If Google API key is set, coordinates will be transformed to full address.

## Installation

Clone this repository and run following command in root directory to start docker containers:
```
docker-compose up
```
Docker is set up to run in DEV environment so all environment variables must be set in `.env.dev` file. You can change this in `docker-compose.yml` file's line APP_ENV. Working example:
```
DATABASE_URL=mysql://user:root@mysql_courier:3306/courier_db?serverVersion=8.0

MYSQL_ROOT_PASSWORD=root
MYSQL_DATABASE=courier_db
MYSQL_USER=user
MYSQL_PASSWORD=root

GOOGLE_API_KEY=
```
Update all dependencies:
```
composer update
```
Next step is to go inside PHP container:
```
docker exec -it courier_apps_1 bash
```
And run migrations from it:
```
php bin/console doctrine:migrations:migrate
```
Application can be accessed in your browser by link:
```
http://localhost/
```