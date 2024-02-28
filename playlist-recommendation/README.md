## Playlist Recommendation

This service contains the information of the musics, genres, playlist available on the platform. It also stores the user favourites musics, genres and playlist as well.

It currently have the functionality to retrieve recommendations based on a user's favourites recorded.

### Running the Application
From the project root folder, run 

```sh
composer install
```

The project is using sqlite for simplicit for data representation, in the .env file setup the DB settings as follow
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
By default, the database is named **playlist**, if you would like to use a different name, you may set the DB_DATABASE as desired
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
php artisan serve --port=8001
```