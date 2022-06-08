<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request) {
        $books = Book::query();
        $categories = Category::all();

        if ($request->get('search')) {
            $books = $books = $books->where('name', 'like', $request->search . '%');
        }

        return view('welcome', [
            'books' => $books->get(),
            'categories' => $categories
        ]);
    }

    public function category($id) {
        $category = Category::where('id', $id)->first();

        if (!$category) {
            return redirect(route('index'));
        }

        $books = Book::where('category_id', $category->id)->get();
        $categories = Category::all();
        return view('welcome', [
            'books' => $books,
            'categories' => $categories,
            'category' => $category
        ]);
    }

    public function book($id) {
        $book = Book::whereId($id)->first();
        if(!$book) {
            return redirect('/');
        }

        return view('book', ['book' => $book]);
    }
}
