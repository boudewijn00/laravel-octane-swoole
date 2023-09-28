based on https://github.com/exaco/laravel-octane-dockerfile but then simplified. supervisor not configured yet, so for now run manually:

_docker-compose exec app php artisan octane:start --server=swoole --host=0.0.0.0 --port=8000_

then you can access the laravel application on http://localhost:8000
