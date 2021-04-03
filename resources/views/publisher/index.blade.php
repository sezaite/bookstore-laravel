@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">List of Publishers</div>
               <div class="card-body">
                <div class="sort form-group">
                    <label>Sort by: </label>
                 <a class="btn" href="{{route('publisher.index', ['sort' => 'title'])}}">Title</a>
                 <a class="btn" href="{{route('publisher.index')}}">Default</a>
             </div>
                   <ul>
                @foreach($publishers as $publisher)
               <li class="list-item">
                    <p class="list-item-name highlighted-name"> 
                        {{$publisher->title}}
                    </p> 
                    <a href="{{route('publisher.edit', [$publisher])}}" class="btn">EDIT</a>
                    <form method="POST" action="{{route('publisher.destroy', [$publisher])}}">
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

