@extends('app')

@section('content')
    <div class="mt-4">
        <h1>Edit Game</h1>
        <form action="/editGame/{{$game->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                    <input name="title" type="text" class="form-control" value="{{$game->title}}">
                </div>
                <div class="form-group">
                    <input name="genre" type="text" class="form-control" value="{{$game->genre}}">
                </div>
                <div class="form-group">
                    <input name="platform" type="text" class="form-control" value="{{$game->platform}}">
                </div>
                <div class="form-group">
                    <input name="developer" type="text" class="form-control" value="{{$game->developer}}">
                </div>
                <div class="form-group">
                    <input name="publisher" type="text" class="form-control" value="{{$game->publisher}}">
                </div>
                <div class="form-group">
                    <input name="dateReleased" type="date" class="form-control" value="{{$game->dateReleased}}">
                </div>
                <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
    </div>
@endsection