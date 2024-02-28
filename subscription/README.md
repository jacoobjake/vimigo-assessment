## Subscription Service

This service contains the list of products that is available for subscriptions, user's active subscriptions as well as the ability to create a new subscriptions

This service will be required to get the user billing info from the api-gateway project which also serves as the user profile service, and since the microservice will be directly calling a request to the api gateway without a client, we will need a way to authenticate the request.

For this purpose we are using API Key to authenticate system API call.

### Running the Application
From the project root folder, run 

```sh
composer install
```

The project is using sqlite for simplicity for data, in the .env file setup the DB settings as follow
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
By default, the database is named **subscription**, if you would like to use a different name, you may set the DB_DATABASE as desired
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

Setup the Gateway API Key and URL in the .env file. Ensure that the values matches the settings of API Gateway application.
```sh
GATEWAY_API_KEY=your_api_key_here
GATEWAY_API_URL=http://localhost:8003/api
```
Take note that if you are not using any service discovery, the gateway application might need to have multiple instance and call to different instance of api-gateway on your main request call and the api-call from the application to prevent port locking

Once the database settings is set, run the migration and seeder with 
```sh
php artisan migrate --seed
```

Finally run the application with 
```sh
php artisan serve
```

_*Note: As you will need to serve the application concurrently with other services, it is recommended that you manually set the server port to prevent clashing_
```sh
php artisan serve --port=8002
```