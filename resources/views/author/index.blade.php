@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">List of Authors</div>
               <div class="sort-btn">
                <a class="btn" href="{{route('author.index', ['sort' => 'surname'])}}">Sort by surname</a>
                <a class="btn" href="{{route('author.index', ['sort' => 'name'])}}">Sort by name</a>
                <a class="btn" href="{{route('author.index')}}">Default</a>
            </div>
               <div class="card-body">
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

