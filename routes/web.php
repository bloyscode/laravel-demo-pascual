<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\CalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


Route::get('/dd', function () {
    return view('welcome');
});

Route::get('/calculator',[CalculatorController::class,'showCalculatorPage']);
Route::post('/calculator',[CalculatorController::class,'calculate'])->name('callcalculate');
//Route::post('/calculate', 'CalculatorController@calculate')->name('callcalculate');



Route::get('/index', function () {
    return view('mypages.index');
})->name('index ');

Route::get('/gallery', function () {
    return view('mypages.gallery');
})-> name('gallery');

Route::get('/services', function () {
    return view('mypages.services');
})-> name('services');

Route::get('/bloyskie',function(){
	return view("pascual");
})->name ('cojie');

Route::get('/bloyskie1',function(){
	return view("pascual1");
})->name ('cojie1');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//para prelim nga operator
Route::get('/operator', function () {
    return view('prelim-pascual.operator');
})->name('operator');

Route::get('/add', function () {
    return view('prelim-pascual.add');
})->name('add');

Route::get('/sub', function () {
    return view('prelim-pascual.sub');
})->name('sub');

Route::get('/multiply', function () {
    return view('prelim-pascual.multiply');
})->name('multiply');

Route::get('/division', function () {
    return view('prelim-pascual.division');
})->name('division');

//para sa controller prelim
Route::post('/add',[CalController::class,'add'])->name('pascual-prelim.add');
Route::post('/sub',[CalController::class,'sub'])->name('pascual-prelim.sub');
Route::post('/multiply',[CalController::class,'multiply'])->name('pascual-prelim.multiply');
Route::post('/division',[CalController::class,'division'])->name('pascual-prelim.division');


//middleware
Route::get('/showLogin', function () {
    return view('mymiddlewaredemo.login');
})->name('login_Form');

Route::post('/showLogin', function () {
    return view('mymiddlewaredemo.login');
})->middleware('login.middleware');

Route::get('/showDashboard', function (){
    return view('mymiddlewaredemo.dashboard');
})->name('gotodashboard');

//design
Route::get('/', function () {
    return view('SIR_PASCUAL.login');
})->name('login-form');

Route::get('/signup', function () {
    return view('SIR_PASCUAL.signup');
})->name('signup-form');


require __DIR__.'/auth.php';

Route::get('/main-dashboard', function () {
    return view('SIR_PASCUAL.dashboard');
})->name('main-dashboard');

Route::get('/dashboard', function () {
    return view('SIR_PASCUAL.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



//admin routes
Route::middleware(['auth'])->group(function(){
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function(){
//route 1


//route 2
        Route::controller(EventController::class)->group(function (){
            Route::get('/main-dashboard','index')->name('main-dashboard');
            Route::post('/add_event','add_event')->name('add_event');
        });

    });



//registrar route
    Route::middleware(['role:registrar'])->prefix('registrar')->name('registrar.')->group(function(){

        Route::get('/main-dashboard', function () {
            return view('SIR_PASCUAL.dashboard');
        })->name('dashboard');

    });

//faculty route
    Route::middleware(['role:faculty'])->prefix('faculty')->name('faculty.')->group(function(){

        Route::get('/main-dashboard', function () {
            return view('SIR_PASCUAL.dashboard');
        })->name('dashboard');
    });
});
