@extends('layouts.app')

@extends('layouts.header')

@section('content')
<div class="card" ">
    <h1>Welcome to BooksShare</h1>
</div>
<div class="row">
    @foreach ($books as $book)
    <div class="col-sm-4 mb-3 mb-sm-0">
        <div class="card" style="width: 18rem;">
            <img src="https://nors.ku.dk/english/research/arnamagnaean/the-book-of-books/AM02-0377_03-opslag_21v-22r-550x300.png" class="card-img-top" alt="{{$book->name}}">
            <div class="card-body">
                <h5 class="card-title">{{$book->name}}</h5>
                <p class="card-text col-10 text-truncate">{{$book->description}}</p>
                <a href="/book/{{$book->id}}" class="link-underline-light" class="btn btn-primary">Go details</a>
            </div>
        </div>
    </div>
    @endforeach
</div>


<div class="card" style="width: 18rem;">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png" class="card-img-top" alt="{{$user->name}}">
    <div class="card-body">
        <h5 class="card-title">{{$user->name}}</h5>
        <p class="card-text">{{$user->email}}</p>
        <a href="/book/user/{{$user->id}}" class="link-underline-light" class="btn btn-primary">Go books of user</a>
    </div>
</div>


{{$title = 'BooksShare'}}

@endsection