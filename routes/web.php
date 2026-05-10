<?php
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AlphabetController;
use App\Http\Controllers\NumbersController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\ShapesController;
use App\Http\Controllers\GamesController;
use Illuminate\Support\Facades\Route;

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

// Routes publiques
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/prescolaire', [FrontendController::class, 'prescolaire'])->name('prescolaire');
Route::get('/primaire', [FrontendController::class, 'primaire'])->name('primaire');
Route::get('/categorie/{id}', [FrontendController::class, 'showCategorie'])->name('categorie.show');
Route::get('/element/{id}', [FrontendController::class, 'showElement'])->name('element.show');
Route::get('/levels/{level}/categories', [CategoryController::class, 'showByLevel'])->name('categories.by-level');
Route::get('/categories/{category}/elements', [ElementController::class, 'showByCategory'])->name('elements.by-category');
Route::get('/numbers', [NumbersController::class, 'index'])->name('numbers.index');
Route::get('/numbers/quiz', [NumbersController::class, 'quiz'])->name('numbers.quiz');
Route::get('/colors', [ColorsController::class, 'index'])->name('colors.index');
Route::get('/colors/quiz', [ColorsController::class, 'quiz'])->name('colors.quiz');
Route::get('/colors/sound/{color}', [ColorsController::class, 'playSound'])->name('colors.sound');

// Routes pour les formes
Route::get('/shapes', [ShapesController::class, 'index'])->name('shapes');
Route::get('/categories/shapes', [ShapesController::class, 'index'])->name('categories.shapes');
Route::get('/categories/shapes/quiz', [ShapesController::class, 'quiz'])->name('categories.shapes.quiz');
Route::get('/categories/shapes/sound/{shape}', [ShapesController::class, 'playSound'])->name('categories.shapes.sound');

// Routes pour l'alphabet
Route::get('/alphabet', [AlphabetController::class, 'index'])->name('alphabet.index');
Route::get('/alphabet/quiz', [AlphabetController::class, 'quiz'])->name('alphabet.quiz');
Route::get('/alphabet/sound/{letter}', [AlphabetController::class, 'playSound'])->name('alphabet.sound');

// Routes d'authentification
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Routes protégées par authentification (administration)
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Routes des niveaux
    Route::resource('levels', LevelController::class);

    // Routes des catégories
    Route::resource('categories', CategoryController::class);

    // Routes des éléments
    Route::resource('elements', ElementController::class);

    // Routes des quiz
    Route::resource('quizzes', QuizController::class);
    Route::get('/categories/{category}/quiz', [QuizController::class, 'startQuiz'])->name('quiz.start');
    Route::post('/categories/{category}/quiz', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
    Route::get('/quiz/results', [QuizController::class, 'showResults'])->name('quiz.results');
});

// Routes pour les jeux
Route::prefix('games')->group(function () {
    Route::get('/', [GamesController::class, 'index'])->name('games.index');
    Route::get('/memory', [GamesController::class, 'memoryGame'])->name('games.memory');
    Route::get('/puzzle', [GamesController::class, 'puzzleGame'])->name('games.puzzle');
    Route::get('/matching', [GamesController::class, 'matchingGame'])->name('games.matching');
    Route::get('/drag-and-drop', [GamesController::class, 'dragAndDropGame'])->name('games.drag-and-drop');
});

Route::get('/games', function () {
    return view('categories.games');
})->name('games.index');

// Routes pour le niveau primaire
Route::prefix('primaire')->group(function () {
    Route::get('/animaux', function () {
        return view('primaire.animaux');
    })->name('primaire.animaux');

    Route::get('/animaux/quiz', function () {
        return view('primaire.animaux-quiz');
    })->name('primaire.animaux.quiz');

    Route::get('/corps-humain', function () {
        return view('primaire.corps');
    })->name('primaire.corps');

    Route::get('/corps-humain/quiz', function () {
        return view('primaire.corps-quiz');
    })->name('primaire.corps.quiz');

    Route::get('/fruits', function () {
        return view('primaire.fruits');
    })->name('primaire.fruits');

    Route::get('/fruits/quiz', function () {
        return view('primaire.fruits-quiz');
    })->name('primaire.fruits.quiz');

    Route::get('/legumes', function () {
        return view('primaire.legumes');
    })->name('primaire.legumes');

    Route::get('/transport', function () {
        return view('primaire.transport');
    })->name('primaire.transport');

    Route::get('/fournitures', function () {
        return view('primaire.fournitures');
    })->name('primaire.fournitures');

    Route::get('/fournitures/quiz', function () {
        return view('primaire.fournitures-quiz');
    })->name('primaire.fournitures.quiz');

    Route::get('/transport/quiz', function () {
        return view('primaire.transport-quiz');
    })->name('primaire.transport.quiz');

    Route::get('/legumes/quiz', function () {
        return view('primaire.legumes-quiz');
    })->name('primaire.legumes.quiz');
});

Route::get('/categories/formes/quiz', function () {
    return view('categories.formes-quiz');
})->name('formes.quiz');

Route::get('/formes/quiz', function () {
    return view('categories.formes-quiz');
})->name('formes.quiz');

Route::get('/primaire/corps/quiz', function () {
    return view('primaire.corps-quiz');
})->name('primaire.corps.quiz');