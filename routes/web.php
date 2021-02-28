<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Autenticado;

# Login
Route::prefix('login')->group(function () {
    Route::get('/', 'LoginController@index')->name('login');
    Route::post('/logar', 'LoginController@login')->name('login.logar');
    Route::get('/logout', 'LoginController@logout')->name('login.logout');
});


Route::prefix('registrar')->group(function () {
    Route::get('/', 'UsuarioController@create')->name('usuario.registrar');
    Route::post('/criar-conta', 'UsuarioController@store')->name('usuario.store');
});

Route::middleware([Autenticado::class])->group(function () {
    Route::prefix('painel')->group(function () {
        Route::get('/', 'HomeController@index')->name('painel');

        # Espécie
        Route::prefix('especie')->group(function () {
            Route::get('/', 'EspecieController@index')->name('especie');
            Route::get('/registrar', 'EspecieController@create')->name('especie.registrar');
            Route::post('/salvar', 'EspecieController@store')->name('especie.store');
            Route::get('/editar/{id}', 'EspecieController@edit')->name('especie.editar');
            Route::post('/atualizar/{id}', 'EspecieController@update')->name('especie.atualizar');
            Route::get('/excluir/{id}', 'EspecieController@destroy')->name('especie.excluir');
            Route::delete('/excluir-varios', 'EspecieController@destroyAll')->name('especie.excluirvarios');
        });

        # Raça
        Route::prefix('raca')->group(function () {
            Route::get('/', 'RacaController@index')->name('raca');
            Route::get('/registrar', 'RacaController@create')->name('raca.registrar');
            Route::post('/salvar', 'RacaController@store')->name('raca.store');
            Route::get('/editar/{id}', 'RacaController@edit')->name('raca.editar');
            Route::post('/atualizar/{id}', 'RacaController@update')->name('raca.atualizar');
            Route::get('/excluir/{id}', 'RacaController@destroy')->name('raca.excluir');
            Route::delete('/excluir-varios', 'RacaController@destroyAll')->name('raca.excluirvarios');
            Route::get('/raca-especie', 'RacaController@racaEspecie')->name('raca.racaespecie');
        });

        # Proprietário
        Route::prefix('proprietario')->group(function () {
            Route::get('/', 'ProprietarioController@index')->name('proprietario');
            Route::get('/registrar', 'ProprietarioController@create')->name('proprietario.registrar');
            Route::post('/salvar', 'ProprietarioController@store')->name('proprietario.store');
            Route::get('/editar/{id}', 'ProprietarioController@edit')->name('proprietario.editar');
            Route::post('/atualizar/{id}', 'ProprietarioController@update')->name('proprietario.atualizar');
            Route::get('/excluir/{id}', 'ProprietarioController@destroy')->name('proprietario.excluir');
            Route::delete('/excluir-varios', 'ProprietarioController@destroyAll')->name('proprietario.excluirvarios');
        });

        # Animal
        Route::prefix('animal')->group(function () {
            Route::get('/', 'AnimalController@index')->name('animal');
            Route::get('/registrar', 'AnimalController@create')->name('animal.registrar');
            Route::post('/salvar', 'AnimalController@store')->name('animal.store');
            Route::get('/detalhes/{id}', 'AnimalController@detalhes')->name('animal.detalhes');
            Route::get('/excluir/{id}', 'AnimalController@destroy')->name('animal.excluir');
            Route::get('/editar/{id}', 'AnimalController@edit')->name('animal.editar');
            Route::post('/atualizar/{id}', 'AnimalController@update')->name('animal.atualizar');
            //Route::delete('/excluir-varios', 'VeiculosController@excluirVarios')->name('veiculo.excluirvarios');
        });


        # Vacina
        Route::prefix('vacina')->group(function () {
            Route::get('/animal', 'VacinaController@animal')->name('vacina');
            Route::get('/{idAnimal}', 'VacinaController@index')->name('vacina.animal');
            Route::get('{idAnimal}/registrar', 'VacinaController@create')->name('vacina.registrar');
            Route::post('/salvar', 'VacinaController@store')->name('vacina.store');
            Route::get('/editar/{id}', 'VacinaController@edit')->name('vacina.editar');
            Route::post('/atualizar/{id}', 'VacinaController@update')->name('vacina.atualizar');
            Route::get('/excluir/{id}', 'VacinaController@destroy')->name('vacina.excluir');
            Route::delete('/excluir-varios', 'VacinaController@destroyAll')->name('vacina.excluirvarios');
        });


        Route::prefix('vermifugo')->group(function () {
            Route::get('/', 'VermifugoController@index')->name('vermifugo');
        });

        // Fallback
        Route::fallback(function() {
            echo 'erro';
        });

        // redireciona a primeira rota, para segunda.
        //Route::redirect('route1', 'route2');
    });
});