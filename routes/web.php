<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PacketController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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


Route::get('/',function(){
    $html =  view('user.login.login')->render();
    return view('user.index', compact('html')); 
});

Route::prefix('page')->group(function(){
    Route::get('/among',function(){
        $html =  view('user.front.page_among')->render();
        return view('user.index', compact('html')); 
    });

    Route::get('/user',function(){
        $html =  view('user.front.page_user')->render();
        return view('user.index', compact('html')); 
    })->name('page.user');

    Route::get('/ayu',function(){
        $html =  view('user.front.page_ayu')->render();
        return view('user.index', compact('html')); 
    })->name('page.ayu');
    
});

Route::prefix('integrated')->group(function(){
    Route::get('display/system', function(){ 
        $token = random_bytes(3); 
        // Since random_bytes() returns a string with all kinds of bytes, 
        // it can't be presented "as is".
        // We need to convert it to a better format. Let's use hex
        $token = bin2hex($token);
        $html =  view('user.front.sapa')->render();
        return view('user.index', compact('html')); 
    })->name('display.monitor');
});

Route::prefix('auth')->group(function () {
    Route::controller(LoginController::class)->group(function(){ 
        Route::get('/login', 'index')->name('login')->middleware('guest');
        Route::post('/login',  'authenticate')->name('auth.login')->middleware('guest');
        Route::post('/logout', 'logout')->name('logout');
        Route::get('/register', 'registrasi')->name('regis');
        Route::post('/change/password', 'change_password')->name('change.password'); 
    });
});

Route::prefix('account')->group(function () {
    Route::get('/profile/show', [AccountController::class, 'show'])->name('profile.show');
    Route::middleware('auth')->group(function(){
        Route::get('/', function (Request $request) {   
            $url = $request->url ?? '';
            return view('admin.index', compact('url')); 
        })->name('account');
        Route::get('/dashboard', function (Request $request) { 
            if(!$request->ajax()){
                $url = route('dashboard');
                return redirect()->route('account',['url' => $url]);
            }
            $title = "Dashboard";
            return view('admin.dashboard.index', compact('title')) ;
        })->name('dashboard');
        // BAGIAN PROFILE
        Route::get('/profile',  [AccountController::class, 'index'])->name('profile');
        Route::post('/profile',  [AccountController::class, 'store'])->name('profile.post');
        // BAGIAN USER 
        Route::get('/user/{opt?}', [UserController::class, 'index'])->name('user');
        Route::get('/change/user', function () { return view('admin.account.change_user'); })->name('user.modal');
        Route::post('/change/user',  [LoginController::class, 'change_profile'])->name('change.user');
        // BAGIAN category 
        Route::get('/category/{opt?}', [CategoryController::class, 'index'])->name('category');
        Route::post('/category/', [CategoryController::class, 'store'])->name('category.post');
        Route::get('/change/category/{opt?}', [CategoryController::class, 'show'])->name('category.modal');
        Route::delete('/category/{opt?}', [CategoryController::class, 'destroy'])->name('category.delete'); 
        // BAGIAN PAKET 
        Route::get('/paket/{opt?}', [PacketController::class, 'index'])->name('paket');
        Route::post('/paket/', [PacketController::class, 'store'])->name('paket.post');
        Route::get('/paket/modal/{opt?}', [PacketController::class, 'show'])->name('paket.modal');
        Route::delete('/paket/{opt?}', [PacketController::class, 'destroy'])->name('paket.delete');
        // BAGIAN PAKET 
        Route::get('/asset/{opt?}', [AssetController::class, 'index'])->name('asset');
        Route::post('/asset/', [AssetController::class, 'store'])->name('asset.post');
        Route::get('/asset/category/{opt?}', [AssetController::class, 'show'])->name('asset.modal');
        Route::delete('/asset/{opt?}', [AssetController::class, 'destroy'])->name('asset.delete');
    });
});

Route::get('/tes', function () {
    $title = 'testing ug.post';
    return view('admin.pages.main', compact('title'))->render();
})->name('form.tes');

Route::post('account', [AccountController::class, 'index'])->name('account.post');