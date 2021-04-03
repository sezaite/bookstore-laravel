@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit</div>
               <div class="card-body">
                <form action="{{route('publisher.update', [$publisher->id])}}" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="publisher_name" value="{{old('publisher_title', $publisher->title)}}">
                        <small class="form-text text-muted">Publisher's title</small>
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
@endsection
