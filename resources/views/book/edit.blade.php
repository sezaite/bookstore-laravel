@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit</div>

               <div class="card-body">
                <form method="POST" action="{{route('book.update',[$book])}}">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" value="{{old('book_title'), $book->title}}">
                        <small class="form-text text-muted">Tite of the book</small>
                      </div>
                      <div class="form-group">
                        <label>ISBN</label>
                        <input type="text" class="form-control" value="{{old('book_isbn'), $book->isbn}}">
                        <small class="form-text text-muted">ISBN</small>
                      </div>
                      <div class="form-group">
                        <label>Pages</label>
                        <input type="number" class="form-control" value="{{old('book_pages'), $book->pages}}">
                        <small class="form-text text-muted">Number of pages</small>
                      </div>
                      <div class="form-group">
                      <label>About:</label> <textarea name="book_about">{{old('book_about'), $book->about}}</textarea> <small class="form-text text-muted">Short info</small></div>
                      <div class="form-group author">
                        <label>Author:</label>
                    <select name="author_id">
                        @foreach ($authors as $author)
                            <option value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif>
                                {{$author->name}} {{$author->surname}}
                            </option>
                        @endforeach
                </select>
            </div>
                    @csrf
                    <button type="submit" class="btn large-btn">EDIT</button>
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


