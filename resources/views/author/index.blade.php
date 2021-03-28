@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">List of Authors</div>
                <a href="{{route('author.index', ['sort' => 'surname'])}}">Sort by surname</a>
                <a href="{{route('author.index', ['sort' => 'name'])}}">Sort by name</a>
                <a href="{{route('author.index')}}">Default</a>
               <div class="card-body">
                   <ul>
                @foreach($authors as $author)
               <li class="list-item"> {{$author->name}} {{$author->surname}} <a href="{{route('author.edit', [$author])}}" class="btn btn-outline-info">EDIT</a>
                    <form method="POST" action="{{route('author.destroy', [$author])}}">
                        @csrf
                    <button type="submit" class="btn btn-outline-dark">DELETE</button>
                   </form> </li>
                </ul>
            @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

