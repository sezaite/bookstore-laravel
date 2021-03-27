<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Author;
use Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
       return view('book.index', ['books' => $books]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
       return view('book.create', ['authors' => $authors]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'book_title' => ['required'],
            'book_isbn' => ['required'],
            'book_pages' => ['required', 'digits_between:5,6000'],
            'book_about' => ['required', 'min:30', 'max:500']
        ],
        [
             'book_title.required' => 'Title is required',
             'book_isbn.required' => 'ISBN is required',
             'book_pages.required' => 'Pages are required', 
             'book_pages.digits_between' => 'Page number is not valid',
             'book_about.required' => 'Description is required',
             'book_about.min' => 'Description is too short',
             'book_about.max' => 'Description is too long'
        ]
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


       $book = new Book;
       $book->title = $request->book_title;
       $book->isbn = $request->book_isbn;
       $book->pages = $request->book_pages;
       $book->about = $request->book_about;
       $book->author_id = $request->author_id;
       $book->save();
       return redirect()->route('book.index')->with('success_message', 'Sekmingai įrašyta.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('book.edit', ['book' => $book, 'authors' => $authors]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(),
        [
            'author_name' => ['required', 'min:3', 'max:64'],
            'author_surname' => ['required', 'min:3', 'max:64'],
        ],
        [
             'author_surname.min' => 'Surname is too short',
             'author_surname.max' => 'Surname is too long',
             'author_name.min' => 'Name is too short',
             'author_name.max' => 'Name is too long'
        ]
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

       $book->title = $request->book_title;
       $book->isbn = $request->book_isbn;
       $book->pages = $request->book_pages;
       $book->about = $request->book_about;
       $book->author_id = $request->author_id;
       $book->save();
       return redirect()->route('book.index')->with('success_message', 'Sekmingai pakeista.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
       return redirect()->route('book.index')->with('success_message', 'Sekmingai ištrinta.');

    }
}
