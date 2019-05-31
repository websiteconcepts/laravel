<?php
use App\Contact;
use Illuminate\Support\Facades\Input;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::resource('contacts', 'ContactController');
Route::resource('addresses', 'AddressController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $user = Contact::where('first_name','LIKE','%'.$q.'%')->orWhere('last_name','LIKE','%'.$q.'%')->orWhere('company','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
        return view('contacts.search')->withDetails($user)->withQuery ( $q );
    else return view ('contacts.search')->withMessage('No Details found. Try to search again !');
});
