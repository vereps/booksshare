@extends('layouts.app')

@extends('layouts.header')

@section('content')

<div class="card" style="width: 48rem;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Book name</th>
                <th scope="col">subject</th>
                <th scope="col">audience</th>
                <th scope="col">author</th>
                <th scope="col">ISBN</th>
                <th scope="col">language</th>
                <th scope="col">comment</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{$book->name}}</th>
                <td>{{$book->subject}}</td>
                <td>{{$book->audience}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->ISBN}}</td>
                <td>{{$book->language}}</td>
                <td>{{$book->comment}}</td>
            </tr>
        </tbody>
    </table>
</div>
{{$title = $book->name}}

@endsection