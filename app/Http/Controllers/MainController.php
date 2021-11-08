<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $books = Book::all();
        return view('welcome', ['books' => $books]);
    }
}
