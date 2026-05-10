<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Category;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('category')->get();
        return view('quizzes.index', compact('quizzes'));
    }

    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    public function create()
    {
        $categories = Category::with('level')->get();
        return view('quizzes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question' => 'required|string|max:255',
            'question_ar' => 'required|string|max:255',
            'question_en' => 'required|string|max:255',
            'correct_answer' => 'required|string|max:255',
            'option1' => 'required|string|max:255',
            'option2' => 'required|string|max:255',
            'option3' => 'required|string|max:255',
            'option1_ar' => 'required|string|max:255',
            'option2_ar' => 'required|string|max:255',
            'option3_ar' => 'required|string|max:255',
            'option1_en' => 'required|string|max:255',
            'option2_en' => 'required|string|max:255',
            'option3_en' => 'required|string|max:255'
        ]);

        Quiz::create($request->all());

        return redirect()->route('quizzes.index')
            ->with('success', 'Question de quiz créée avec succès.');
    }

    public function edit(Quiz $quiz)
    {
        $categories = Category::all();
        return view('quizzes.edit', compact('quiz', 'categories'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question' => 'required|string|max:255',
            'question_ar' => 'required|string|max:255',
            'question_en' => 'required|string|max:255',
            'correct_answer' => 'required|string|max:255',
            'option1' => 'required|string|max:255',
            'option2' => 'required|string|max:255',
            'option3' => 'required|string|max:255',
            'option1_ar' => 'required|string|max:255',
            'option2_ar' => 'required|string|max:255',
            'option3_ar' => 'required|string|max:255',
            'option1_en' => 'required|string|max:255',
            'option2_en' => 'required|string|max:255',
            'option3_en' => 'required|string|max:255'
        ]);

        $quiz->update($request->all());

        return redirect()->route('quizzes.index')
            ->with('success', 'Question de quiz mise à jour avec succès.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->route('quizzes.index')
            ->with('success', 'Question de quiz supprimée avec succès.');
    }

    public function startQuiz(Category $category)
    {
        $quizzes = Quiz::where('category_id', $category->id)->inRandomOrder()->get();
        return view('quizzes.start', compact('category', 'quizzes'));
    }

    public function submitQuiz(Request $request, Category $category)
    {
        $quizzes = Quiz::where('category_id', $category->id)->get();
        $score = 0;
        $totalQuestions = $quizzes->count();

        foreach ($quizzes as $quiz) {
            if ($request->input('answer_' . $quiz->id) === $quiz->correct_answer) {
                $score++;
            }
        }

        // Enregistrer le résultat du quiz
        QuizResult::create([
            'user_id' => Auth::id(),
            'category_id' => $category->id,
            'score' => $score,
            'total_questions' => $totalQuestions
        ]);

        return view('quizzes.result', compact('score', 'totalQuestions', 'category'));
    }

    public function showResults()
    {
        $results = QuizResult::with(['category', 'user'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('quizzes.results', compact('results'));
    }
}
