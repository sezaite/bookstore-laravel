<ol>
@foreach($authors as $author)
    <li>{{$author->name}} {{$author->surname}} <a href="{{route('author.edit', [$author])}}">[EDIT]</a></li>
@endforeach
</ol>
