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
                @foreach($authors as $author)
                {{$author->name}} {{$author->surname}} <a href="{{route('author.edit', [$author])}}">EDIT</a>
                    <form method="POST" action="{{route('author.destroy', [$author])}}">
                        @csrf
                    <button type="submit">DELETE</button>
                   </form>
            
            @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

