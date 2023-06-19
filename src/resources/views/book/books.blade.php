@extends('layouts.app')

@extends('layouts.header')

@section('content')

<div class="card" style="width: 48rem;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Book name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $result)
            <tr>
                <th scope="row">{{$result->id}}</th>
                <td><a href="/book/{{$result->id}}" class="link-underline-light">{{$result->name}}</a></td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$title = 'Books'}}

@endsection