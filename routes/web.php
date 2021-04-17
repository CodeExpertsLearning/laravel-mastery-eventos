<?php

use Illuminate\Support\Facades\Route;

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

//Rotas para Home e Single do site de Eventos
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/eventos/{slug}', [\App\Http\Controllers\HomeController::class, 'show'])->name('event.single');


Route::get('/queries/{event?}', function($event = null){
//    $events = \App\Models\Event::all(); //select * from events
//    $events = \App\Models\Event::all(['title', 'description']); //select title, description from events
//      $event = \App\Models\Event::where('id', 1)->first(); //select * from events where id = 1
 //       $event =  \App\Models\Event::find($event);  //select * from events where id = 1

    //insert into events(title, description, body, start_event) values(?, ?, ?, ?);
//     Active Record - Inserção...
//    $event = new \App\Models\Event();

//    $event->title = 'Evento via Eloquent e AR';
//    $event->description = 'Descrição do Evento';
//    $event->body = 'Conteúdo do evento...';
//    $event->start_event = date('Y-m-d H:i:s');
//    $event->slug = \Illuminate\Support\Str::slug($event->title);

//     update events set title = ?, description = ?, body = ? , start_event = ?, slug = ? where id = ?;

//     Active Record - Atualização...
//    $event = \App\Models\Event::find(31);
//    $event->title = 'Evento Atualizado...';
//    $event->slug = \Illuminate\Support\Str::slug($event->title);

//    return $event->save();

//     Atribuição Massa ou Mass Assignment
//    $event = [
//        'title' => 'Evento Atribuição em Massa',
//        'description' => 'Descrição...',
//        'body' => 'Conteúdo do evento',
//        'slug' => 'evento-atribuicao-em-massa',
//        'start_event' => date('Y-m-d H:i:s'),
//    ];

//    return \App\Models\Event::create($event);

//     Mass Update ou Atualização em Massa
//    $eventData = [
//        'title' => 'Evento Atribuição em Massa',
//        'description' => 'Descrição atualizada...',
//         'body' => 'Conteúdo do evento atualizado com atualização em massa',
//        'slug' => 'evento-atribuicao-em-massa',
//        'start_event' => date('Y-m-d H:i:s'),
//     ];

//    $event = \App\Models\Event::find(33);
//    $event->update($eventData);
//    return $event;

//     Delete Model via busca do model
//    $event = \App\Models\Event::findOrFail(33);
//    return $event->delete();

//     Delete Models via ids... [30,31,32]

//     return \App\Models\Event::destroy([30, 31, 32]);

    return \App\Models\Event::orderBy('id', 'DESC')->limit(3)->get(); // select * from events order by id DESC limit 3;

    return $event;
});

Route::get('/hello-world', [\App\Http\Controllers\HelloWorldController::class, 'helloWorld']);
Route::get('/hello/{name?}', [\App\Http\Controllers\HelloWorldController::class, 'hello']);

//Rotas CRUD base da base para eventos...

Route::prefix('/admin')->name('admin.')->group(function() {

    Route::prefix('/events')->name('events.')->group(function(){

        Route::get('/', [\App\Http\Controllers\Admin\EventController::class, 'index'])->name('index');

        Route::get('/create', [\App\Http\Controllers\Admin\EventController::class, 'create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Admin\EventController::class, 'store'])->name('store');

        Route::get('/{event}/edit', [\App\Http\Controllers\Admin\EventController::class, 'edit'])->name('edit');
        Route::post('/update/{event}', [\App\Http\Controllers\Admin\EventController::class, 'update'])->name('update');

        Route::get('/destroy/{event}', [\App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('destroy');

    });
});


//GET | POST | PUT | DELETE | OPTIONS | HEAD
//Route::get(), Route::post(), Route::put(), Route::delete() ...
//any a qualquer verbo ou match
//Route::any('/teste-any', fn() => 'Rota Any'); //match com qualquer verbo, sendo um dos verbos permitidos acima
//para fazer match com post e put
//Route::match(['post', 'put'], '/teste-match', fn() => 'Rota Match');
