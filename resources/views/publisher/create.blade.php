@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create</div>
               <div class="card-body">
                <form action="{{route('publisher.store')}}" method="post">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="publisher_title" value="{{old('publisher_title')}}">
                        <small class="form-text text-muted">Publisher's title</small>
                      </div>
                    @csrf
                    <button type="submit" class="btn large-btn">Create</button>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
