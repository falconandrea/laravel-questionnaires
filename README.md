<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Requirements

-   Laravel
-   Composer
-   Docker
-   Sail

## Initial

### Update file .env

```
APP_NAME="Laravel Blog"
APP_URL="http://laravel-blog.test"
DB_USERNAME="laravel"
DB_PASSWORD="laravel"
```

### Sail Installation (only for first start)

```
composer require laravel/sail --dev
```

and add alias into your bash/zsh file

```
alias sail='bash vendor/bin/sail'
```

add docker-compose.yml, update .env vars with docker vars

```
php artisan sail:install
```

start docker containers

```
sail up -d
```

and add APP_KEY in .env with

```
sail artisan key:generate
```

connect storage folder

```
sail artisan storage:link
```

### Start up (after first installation)

```
sail up -d
```

Update database with new migrations

```
sail artisan migrate
```

## Notes

-   After update docker-compose.yml, rebuild docker containers with

```
sail build --no-cache
sail up
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
