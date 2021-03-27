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
                        <label>Title</label>
                        <input type="text" class="form-control">
                        <small class="form-text text-muted">Tite of the book</small>
                      </div>
                      <div class="form-group">
                        <label>ISBN</label>
                        <input type="text" class="form-control">
                        <small class="form-text text-muted">ISBN</small>
                      </div>
                      <div class="form-group">
                        <label>Pages</label>
                        <input type="number" class="form-control">
                        <small class="form-text text-muted">Number of pages</small>
                      </div>
                    About: <textarea name="book_about" id="summernote"></textarea>
                    <select name="author_id">
                        @foreach ($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                        @endforeach
                 </select>
                    @csrf
                    <button type="submit">ADD</button>
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
