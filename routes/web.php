<?php

use Illuminate\Http\Request;
use \Mailjet\Resources;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/newsalesrep', 'HomeController@newsalesrep')->name('newsalesrep');
Route::get('/createpayroll', 'HomeController@createpayroll')->name('createpayroll');

Route::post('/newpayroll', 'HomeController@newpayroll')->name('newpayroll');

Route::post('/addsalesrep', 'HomeController@addsalesrep')->name('addsalesrep');

Route::post('/sendemail',function(Request $request){
    
    $mj = new \Mailjet\Client('575a7a14216e03ff78b6872cd5e7cfe4','b8571c0295ff41b3a088e485f46e7b8a',true,['version' => 'v3.1']);
  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "bryllim@gmail.com",
          'Name' => "Bryl Kezter"
        ],
        'To' => [
          [
            'Email' => $request->emailaddress,
            'Name' => "Bryl Kezter"
          ]
        ],
        'Subject' => "Greetings from Mailjet.",
        'TextPart' => $request->emailbody,
        'HTMLPart' => "<h3>".$request->emailbody."</h3>",
        'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  $response->success() && var_dump($response->getData());

    return back();

})->name('sendemail');




Route::post('/newActivity', 'ActivityController@newActivity')->name('newActivity');
Route::get('/joinActivity/{id}', 'ActivityController@joinActivity')->name('joinActivity');
Route::post('/sponsorActivity/{id}', 'ActivityController@sponsorActivity')->name('sponsorActivity');
Route::get('/viewActivity/{id}', 'ActivityController@viewActivity')->name('viewActivity');
