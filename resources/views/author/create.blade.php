@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create</div>
               <div class="card-body">
                <form action="{{route('author.store')}}" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control">
                        <small class="form-text text-muted">Author's name</small>
                      </div>
                      <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control">
                        <small class="form-text text-muted">Author's surname</small>
                      </div>
                    @csrf
                    <button type="submit">Create</button>
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
