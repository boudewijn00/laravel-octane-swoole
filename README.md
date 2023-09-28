based on https://github.com/exaco/laravel-octane-dockerfile but then simplified. supervisor not configured yet, so for now run manually:

_docker-compose exec app php artisan octane:start --server=swoole --host=0.0.0.0 --port=8000_

if you want to compare the performance of the application with and without octane, you can run the application without octane by running:

_docker-compose exec app php artisan serve --host=0.0.0.0 --port=8000_

in both cases you can access the laravel application on http://localhost:8000

im slowly working my way through https://www.packtpub.com/product/high-performance-with-laravel-octane/9781801819404 and adding the examples to this repository
