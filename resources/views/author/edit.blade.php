<form action="{{route('author.update', [$author->id])}}" method="post">
    Name: <input type="text" name="author_name" value="{{$author->name}}"></input>
    Surname: <input type="text" name="author_surname" value="{{$author->surname}}"></input>
    @csrf
    <button type="submit">Edit</button>
    </form>