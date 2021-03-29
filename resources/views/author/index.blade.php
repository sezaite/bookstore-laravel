@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">List of Authors</div>
               <div class="card-body">
                <div class="sort form-group">
                    <label>Sort by: </label>
                 <a class="btn" href="{{route('author.index', ['sort' => 'surname'])}}">Surname</a>
                 <a class="btn" href="{{route('author.index', ['sort' => 'name'])}}">Name</a>
                 <a class="btn" href="{{route('author.index')}}">Default</a>
             </div>
                   <ul>
                @foreach($authors as $author)
               <li class="list-item">
                    <p class="list-item-name"> 
                        {{$author->name}} {{$author->surname}} 
                    </p> 
                    <a href="{{route('author.edit', [$author])}}" class="btn">EDIT</a>
                    <form method="POST" action="{{route('author.destroy', [$author])}}">
                        @csrf
                    <button type="submit" class="btn">DELETE</button>
                   </form> </li>
                </ul>
            @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

