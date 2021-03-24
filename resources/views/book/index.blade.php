<ol>
@foreach ($books as $book)
<li>{{$book->title}} - {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}
  <a href="{{route('book.edit',[$book])}}">[EDIT]</a>
  <form method="POST" action="{{route('book.destroy', [$book])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
</li>
@endforeach
</ol>
