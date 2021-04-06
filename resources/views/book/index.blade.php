@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">List of books</div>
               <div class="card-body">
                <div class="filter form-group author">
                    <form action="{{route('book.index')}}" method="get">
                 <label>Filter by author:</label>
                 <select name="author_id">
                     @foreach ($authors as $author)
                         <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                     @endforeach
              </select>
                 <button type="submit" class="btn">Filter</button>
                 <a href="{{route('book.index')}}" class="btn clear">Clear</a>
             </div>
         </form>
                <ul>
                @foreach ($books as $book)
                <li class="list-item">
                <p class="list-item-name"> <span class="highlighted-main-name">{{$book->title}}</span> - written by <span class="highlighted-name">{{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</span>; <span style="display: block">Published by <span class="highlighted-name">{{$book->bookPublisher->title}}</span>.</p>
                  <a href="{{route('book.edit', [$book])}}" class="btn">EDIT</a>
                  <a href="{{route('book.pdf', [$book])}}" class="btn">PDF</a>
                  <form method="POST" action="{{route('book.destroy', [$book])}}">
                   @csrf
                   <button type="submit" class="btn">DELETE</button>
                  </form></li>
                </ul>
                @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
