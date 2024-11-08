<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\BlogController;




/*

request params attempts

*/





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

Route::prefix('blog')->group(function(){

    Route::get('/', [BlogController::class, 'index']
    )->name('blog.index');
    
    
    Route::get('/{slug}-{id}', function(string $slug, string $id){
        return [
            "slug"=>$slug,
            "id"=>$id, 
            'name' => request('name', 'toto'),
            // 'age'=> request('age','toto'),
            // 'hobby'=> request('hobby', 'toto')
        ];
    })->where([
        'id' => '[0-9]+',
        'slug' => '[a-z0-9\-]+'
    ])->name('blog.show');         


});



// Route::get('/blog/{slug}-{id}', function (Request $request, $slug, $id) {
//     // Vérifie si le paramètre "name" est présent dans la chaîne de requête


//      if (true) {
//         $name = request('name');
        
//         return "Le slug est : $slug et le paramètre 'name' est : $name";
//     } else {
//         return "Le slug est : $slug l'id $id mais le paramètre 'name' est manquant ou vide.";
//     }
// })->where([
//     'id' =>'[0-9]+',
//     'slug' => '[a-z0-9\-]+',


// ]);

    
Route::get('/bonjour/{nom}', function () { return 'Bonjour ' . request('nom'); });


Route::get('/bonjour/{nom}', function ($nom) {return 'Bonjour '.request('prenom') . ' '. $nom;});
