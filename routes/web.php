<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TestEvent implements ShouldBroadcast{
    public $text;

    function __construct($text){
        $this->text = $text;
    }

    public function broadcastOn(){
        // TODO: Implement broadcastOn() method.
        return ['test-channel'];

    }
}


Route::get('/', 'WelcomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('welcome', function (){
    return view('/welcome');
})->name('welcome');



