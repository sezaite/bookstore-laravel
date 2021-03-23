<form action="{{route('author.store')}}" method="post">
Name: <input type="text" name="author_name"></input>
Surname: <input type="text" name="author_surname"></input>
@csrf
<button type="submit">Create</button>
</form>