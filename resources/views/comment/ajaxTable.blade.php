<div class="text-center"> <h3><b>LIST OF 5 LAST ADDED COMMENTS</b></h3></div>
<br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">User</th>
            <th scope="col">Email</th>
            <th scope="col">Comment</th>
            <th scope="col">Create</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($persons as $person)
        <tr>
            <td>{{$person->name}}</td>
            <td>{{$person->email}}</td>
            <td>{{$person->comment}}</td>
            <td>{{$person->created_at}}</td>
            <td><button  personId="{{ $person->id }}" class="btn btn-danger deleteCommentForm rounded-lg">Delete</button></td>
        </tr>
        @endforeach
    </tbody>
</table>
