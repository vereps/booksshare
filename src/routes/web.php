<?php

// use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CoverController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;


// Route::middleware([
//     TrimStrings::class,
// ])->group(function () {
//     Route::post('/middleware-test', function (Request $request) {
//         dd($request->all());
//     });
// });


Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegistrationController::class, 'register']);

Route::middleware([
    'auth'
    // ApiAuthMiddleware::class,
])->group(function () {
    // Route::get('/books', [BookController::class, 'list']);
    // Route::get('/books/user/{id}', [BookController::class, 'listUsersBooks']);
    Route::get('/books/completed', [BookController::class, 'listAllCompleted']);
    // Route::post('/books', [BookController::class, 'create']);
    Route::get('/books/{id}', [BookController::class, 'find'])->whereNumber('id');

    Route::post('/publishers', [PublisherController::class, 'create']);
    Route::post('/publishers/{id}', [PublisherController::class, 'update'])->whereNumber('id');
    Route::delete('/publisher/{id}', [PublisherController::class, 'delete'])->whereNumber('id');

    // Route::post('/books/{id}', [BookController::class, 'update'])->whereNumber('id');
    // Route::delete('/books/{id}', [BookController::class, 'delete'])->whereNumber('id');
});

Route::get('/books/user/{id}', [BookController::class, 'listUsersBooks']);

Route::post('/books/{id}', [BookController::class, 'update'])->whereNumber('id');
Route::post('/books', [BookController::class, 'create']);
Route::delete('/books/{id}', [BookController::class, 'delete'])->whereNumber('id');

Route::get('/books', [BookController::class, 'list']);
Route::get('/book/{id}', [BookController::class, 'find'])->whereNumber('id');
Route::get('/book/{id}/cover', [CoverController::class, 'getCover']);

Route::get('/languages', [LanguageController::class, 'list']);
Route::get('/language/{id}', [LanguageController::class, 'find'])->whereNumber('id');

Route::get('/books/language/{id}', [BookController::class, 'listLanguagesBooks']);
Route::get('/users/language/{id}', [UserController::class, 'listLanguagesUsers']);

Route::get('/authors', [AuthorController::class, 'list']);
Route::get('/author/{id}', [AuthorController::class, 'show']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::delete('/author/{id}', [AuthorController::class, 'delete'])->whereNumber('id');

Route::get('/publishers', [PublisherController::class, 'list']);
Route::get('/publisher/{id}', [PublisherController::class, 'show']);

Route::get('/exchange-rates', [ExchangeController::class, 'index']);

Route::middleware([
    Authenticate::class
])->group(function () {
    Route::get('/auth/me', [AuthController::class, 'me']);

    Route::post('/profile/avatar', [AvatarController::class, 'upload']);
});

Route::middleware(['admin'])->group(function () {
    Route::get('/users', [UserController::class, 'list']);
});

Route::get('/exchange-rates', [ExchangeController::class, 'index']);

Route::get('/users/{id}/avatar', [AvatarController::class, 'getAvatar']);


Route::get('/', [HomeController::class, 'list']);
