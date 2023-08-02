@extends('app')

@section('content')

    <div class="container mt-4">
        <h1 class="main-title">My<span>Games</span>List</h1>

        @auth
            <div class="mt-4">
                <h1>Add Games</h1>
                <form action="/addGame" method="POST">
                    @csrf
                    <div class="form-group">
                        <input name="title" type="text" class="form-control" placeholder="Game Title">
                    </div>
                    <div class="form-group">
                        <input name="genre" type="text" class="form-control" placeholder="Genre">
                    </div>
                    <div class="form-group">
                        <input name="platform" type="text" class="form-control" placeholder="Platform">
                    </div>
                    <div class="form-group">
                        <input name="developer" type="text" class="form-control" placeholder="Developer">
                    </div>
                    <div class="form-group">
                        <input name="publisher" type="text" class="form-control" placeholder="Publisher">
                    </div>
                    <div class="form-group">
                        <input name="dateReleased" type="date" class="form-control" placeholder="Date Released">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Game</button>
                </form>
            </div>

            <div class="mt-4">
                <h1>List of Games</h1>
                @foreach ($games as $game)
                <div class="card lists mb-3">
                    <div class="card-body">
                        <h2 class="card-title">{{$game['title']}}</h2>
                        <p class="card-text">&#40;added by {{$game->user->name}}&#41;</p>
                        <p class="card-text">{{$game['genre']}}</p>
                        <p class="card-text">{{$game['platform']}}</p>
                        <p class="card-text">{{$game['developer']}}</p>
                        <p class="card-text">{{$game['publisher']}}</p>
                        <p class="card-text">{{$game['dateReleased']}}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-4">
                <h1>Game Sendiri</h1>
                @foreach ($ownGames as $ownGame)
                <div class="card lists mb-3">
                    <div class="card-body">
                        <h2 class="card-title">{{$ownGame['title']}}</h2>
                        <p class="card-text">{{$ownGame['genre']}}</p>
                        <p class="card-text">{{$ownGame['platform']}}</p>
                        <p class="card-text">{{$ownGame['developer']}}</p>
                        <p class="card-text">{{$ownGame['publisher']}}</p>
                        <p class="card-text">{{$ownGame['dateReleased']}}</p>
                        <a href="/editGame/{{$game->id}}" class="btn btn-primary">Edit</a><br><br>
                        <form action="/deleteGame/{{$game->id}}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        @endauth
    </div>
@endsection