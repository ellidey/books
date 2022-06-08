<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::with('user', 'category');

        if ($request->user()->role_id != User::TYPE_ADMINISTRATOR) {
            $books = $books->where('user_id', $request->user()->id);
        }


        return view('home.books.index', ['books' => $books->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:32', 'max:5000'],
        ]);

        $imageName = 'book.jpg';
        if ($request->has('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('/img/books/');
            $image->move($imagePath, $imageName);
        }

        if ($validator->fails()) {
            return redirect(route('books.create'))->withErrors($validator);
        }

        Book::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName
        ]);

        return redirect(route('books.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::where('id', $id)->first();
        return view('home.books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:32', 'max:5000'],
        ]);


        $imageName = Book::where('id', $id)->first()->image;
        if ($request->has('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('/img/books/');
            $image->move($imagePath, $imageName);
        }


        if ($validator->fails()) {
            return redirect(route('books.edit'))->withErrors($validator);
        }

        $book = Book::whereId($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName
        ]);

        return redirect(route('books.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::whereId($id)->delete();
        return redirect(route('books.index'));
    }
}
