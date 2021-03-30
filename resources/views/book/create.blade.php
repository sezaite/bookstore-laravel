@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create</div>
               <div class="card-body">
                <form method="POST" action="{{route('book.store')}}">
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control" name="book_title" value="{{old('book_title')}}">
                        <small class="form-text text-muted">Tite of the book</small>
                      </div>
                      <div class="form-group">
                        <label>ISBN:</label>
                        <input type="text" class="form-control" name="book_isbn" value="{{old('book_isbn')}}">
                        <small class="form-text text-muted">ISBN</small>
                      </div>
                      <div class="form-group">
                        <label>Pages:</label>
                        <input type="number" class="form-control" name="book_pages" value="{{old('book_pages')}}">
                        <small class="form-text text-muted">Number of pages</small>
                      </div>
                      <div class="form-group">
                      <label>About:</label> <textarea name="book_about">{{old('book_about')}}</textarea>
                      <small class="form-text text-muted">Short info</small>
                      </div>
                      <div class="form-group author">
                          <label>Author:</label>
                    <select name="author_id">
                        @foreach ($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                        @endforeach
                 </select>
                </div>
                    @csrf
                    <button type="submit" class="btn large-btn">ADD</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        $('#summernote').summernote();
    });
    </script>
@endsection
