@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">List of books</div>
               <div class="card-body">
                <ul>
                @foreach ($books as $book)
                <li class="list-item">
                <p class="list-item-name"> <span style="font-weight: 600">{{$book->title}}</span> - by {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}} </p>
                  <a href="{{route('book.edit',[$book])}}" class="btn">EDIT</a>
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
