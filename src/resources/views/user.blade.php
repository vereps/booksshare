@extends('layouts.app')

@extends('layouts.header')

@section('content')
<div class="card" style="width: 48rem;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Mail</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
            <tr>
                <th scope="row">{{$result->id}}</th>
                <td><a href="/book/user/{{$result->id}}" class="link-underline-light">{{$result->name}}</a></td>
                <td>{{$result->email}}</td>
                <td>{{$result->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$title = 'Users'}}

@endsection