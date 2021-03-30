@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit</div>
               <div class="card-body">
                <form action="{{route('author.update', [$author->id])}}" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="author_name" value="{{old('author_name', $author->name)}}">
                        <small class="form-text text-muted">Author's name</small>
                      </div>
                      <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" name="author_surname" value="{{old('author_surname', $author->surname)}}">
                        <small class="form-text text-muted">Author's surname</small>
                      </div>
                    @csrf
                    <button type="submit" class="btn large-btn">Edit</button>
                    </form>
                    @extends('layouts.app')
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
