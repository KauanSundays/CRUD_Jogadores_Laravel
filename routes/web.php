<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Candidato;
use Illuminate\Console\View\Components\Alert;

Route::get('/', function () {
    return view('welcome');
});


//Route::post('cadastrar-candidato', function (Request $info) {
//    dd($info->all());
//});

Route::post('cadastrar-candidato', function (Request $info) {
    Candidato::create([
        'name' => $info->nome_candidato,
        'telefone' => $info->telefone_candidato
    ]);
    echo "Candidato Criado com sucesso!";
});




Route::get('/mostrar-candidatos/{id_do_candidato}', function ($id_do_candidato) {
    $candidato = Candidato::findOrFail($id_do_candidato);
    
    echo $candidato->name;
    echo "<br>";
    echo $candidato->telefone;
});

Route::get('/mostrar-candidatos', function () {
    $candidatos = Candidato::all();
    
    return view('mostrar', ['candidatos' => $candidatos]);
});



Route::get('/editar-candidatos/{id_do_candidato}', function ($id_do_candidato) {
    $candidato = Candidato::findOrFail($id_do_candidato);
    return view('editar', ['candidato'=>$candidato]);
});

Route::put('/atualizar/{id_do_candidato}', function (Request $info, $id_do_candidato) {
    $candidato = Candidato::findOrFail($id_do_candidato);
    $candidato->name = $info->nome_candidato;
    $candidato->telefone = $info->telefone_candidato;
    $candidato->save();
    return redirect('/mostrar-candidatos')->with('mensagem', 'Candidato atualizado com sucesso!');
});


Route::delete('/excluir-candidato/{id_do_candidato}', function ($id_do_candidato) {
    $candidato = Candidato::findOrFail($id_do_candidato);
    $candidato->delete();
    return redirect('/mostrar-candidatos')->with('mensagem', 'Candidato excluído com sucesso!');
});


