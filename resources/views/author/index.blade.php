<ol>
@foreach($authors as $author)
    <li>{{$author->name}} {{$author->surname}} <a href="{{route('author.edit', [$author])}}">[EDIT]</a>
        <form method="POST" action="{{route('author.destroy', [$author])}}">
            @csrf
        <button type="submit">DELETE</button>
       </form>
     </li>
@endforeach
</ol>
