<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Laravel\Octane\Facades\Octane;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/serial-task', function () {
    $start = hrtime(true);
    [$fn1, $fn2] = [
        function () {
            sleep(2);
            return 'Hello';
        },
        function () {
            sleep(2);
            return 'World';
        },
    ];
    $result1 = $fn1();
    $result2 = $fn2();
    $end = hrtime(true);
    return "{$result1} {$result2} in ".($end - $start) /
        1000000000 .' seconds';
});

Route::get('/concurrent-task', function () {
    $start = hrtime(true);
    [$result1, $result2] = Octane::concurrently([
        function () {
            sleep(2);
            return 'Hello';
        },
        function () {
            sleep(2);
            return 'World';
        },
    ]);
    $end = hrtime(true);
    return "{$result1} {$result2} in ".($end - $start) /
        1000000000 .' seconds';
});

Route::get('/who-is-the-first', function () {
    $start = hrtime(true);
    [$result1, $result2] = Octane::concurrently([
        function () {
            sleep(2);
            Log::info('Concurrent function: First');
            return 'Hello';
        },
        function () {
            sleep(1);
            Log::info('Concurrent function: Second');
            return 'World';
        },
    ]);
    $end = hrtime(true);
    return "{$result1} {$result2} in ".($end - $start) /
        1000000000 .' seconds';
});
