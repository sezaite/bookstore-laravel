<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Publisher;
use Validator;
use PDF;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authors = Author::all();
        if($request->author_id){
           $books = Book::where('author_id', $request->author_id)->get();
        } else {
        $books = Book::all();
        }
        return view('book.index', ['books' => $books, 'authors' => $authors]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();
       return view('book.create', ['authors' => $authors, 'publishers' => $publishers]);

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
            'book_pages' => ['required'],
            'book_about' => ['required', 'min:20', 'max:500'],
        ],
        [
             'book_title.required' => 'Title is required',
             'book_isbn.required' => 'ISBN is required',
             'book_pages.required' => 'Pages are required', 
             'book_about.required' => 'Description is required',
             'book_about.min' => 'Description is too short',
             'book_about.max' => 'Description is too long',
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
       $book->publisher_id = $request->publisher_id;
       $book->save();
       return redirect()->route('book.index')->with('success_message', 'Sėkmingai įrašyta.');

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
        $publishers = Publisher::all();
        return view('book.edit', ['book' => $book, 'authors' => $authors, 'publishers' => $publishers]);
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
            'book_title' => ['required'],
            'book_isbn' => ['required'],
            'book_pages' => ['required'],
            'book_about' => ['required', 'min:20', 'max:500'],
        ],
        [
             'book_title.required' => 'Title is required',
             'book_isbn.required' => 'ISBN is required',
             'book_pages.required' => 'Pages are required', 
             'book_about.required' => 'Description is required',
             'book_about.min' => 'Description is too short',
             'book_about.max' => 'Description is too long',
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

    public function pdf(Book $book)
    {
        $pdf = PDF::loadView('book.pdf', ['book' => $book]);//standartinis view
        return $pdf->download('book-id'. $book->id. 'pdf'); //failo pavadinimas

    }
}
