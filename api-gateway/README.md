## API Gateway

The API Gateway application handles the authentication and authorization of users/clients using the services. This is to ensure that the users/clients are granted the right access and permission.

This application leverages the use of Laravel Passport to authentication users using OAuth2 methods.

### Running the Application
From the project root folder, run 

```sh
composer install
```

Next, initiate Laravel passport 
```sh
php artisan passport:install
```

The project is using sqlite for simplicity for data representation, in the .env file setup the DB settings as follow
```sh
DB_CONNECTION=sqlite
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=
# DB_USERNAME=root
# DB_PASSWORD=
DB_FOREIGN_KEYS=true
```
By default, the database is named **api-gateway**, if you would like to use a different name, you may set the DB_DATABASE as desired
```sh
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_USERNAME=root
# DB_PASSWORD=
DB_FOREIGN_KEYS=true
```
Feel free to use any other DB system as required

Setup the microservice URL in the .env file. In real-life scenrio, a service registry is a more realistic implementation, but for the purpose of this project, we will be directly setting the url of the services in the .env file.
```sh
PLAYLIST_SERVICE_URL=http://localhost:8001/api
SUBSCRIPTION_SERVICE_URL=http://localhost:8002/api
```
Some instances will require an API Key to autheticate the application, generate and set your API Key in the .env file
```sh
API_KEY=your_api_key_here
```
Once the database settings is set, run the migration and seeder with 
```sh
php artisan migrate --seed
```

Finally run the application with 
```sh
php artisan serve
```

_*Note: You will need multiple instances of the API Gateway for some use cases. To host multiple instances locally, simply open a new terminal and run artisan:serve on a different port_
```sh
php artisan serve --port=8000
php artisan serve --port=8003
```