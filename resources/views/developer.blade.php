@extends('app')

@section('content')
    <div class="container mt-4">
        <h1 class="main-title">My<span>Games</span>List</h1>

        @auth
            <div class="mt-4">
                <h1>Add Developers</h1>
                <form action="/addDev" method="POST">
                    @csrf
                    <div class="form-group">
                        <input name="developer" type="text" class="form-control" placeholder="Developer Name">
                    </div>
                    <div class="form-group">
                        <input name="headquarters" type="text" class="form-control" placeholder="Headquarter(s) Location">
                    </div>
                    <div class="form-group">
                        <input name="description" type="text" class="form-control" placeholder="Description">
                    </div>
                    <div class="form-group">
                        <input name="founder" type="text" class="form-control" placeholder="Founder">
                    </div>
                    <div class="form-group">
                        <input name="locationFounded" type="text" class="form-control" placeholder="Location Founded">
                    </div>
                    <div class="form-group">
                        <input name="dateFounded" type="date" class="form-control" placeholder="Date Founded">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Developers</button>
                </form>
            </div>

            <div class="mt-4">
                <h1>List of Developers</h1>
                @foreach ($developers as $developer)
                <div class="card lists mb-3">
                    <div class="card-body">
                        <h2 class="card-title">{{$developer['developer']}}</h2>
                        <p class="card-text">&#40;added by {{$developer->user->name}}&#41;</p>
                        <p class="card-text">{{$developer['headquarters']}}</p>
                        <p class="card-text">{{$developer['description']}}</p>
                        <p class="card-text">Founded by {{$developer['founder']}}</p>
                        <p class="card-text">in {{$developer['locationFounded']}}</p>
                        <p class="card-text">{{$developer['dateFounded']}}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-4">
                <h1>Edit/Delete Developers</h1>
                @foreach ($ownDevs as $ownDev)
                <div class="card lists mb-3">
                    <div class="card-body">
                        <h2 class="card-title">{{$ownDev['developer']}}</h2>
                        <p class="card-text">{{$ownDev['headquarters']}}</p>
                        <p class="card-text">{{$ownDev['description']}}</p>
                        <p class="card-text">{{$ownDev['founder']}}</p>
                        <p class="card-text">{{$ownDev['locationFounded']}}</p>
                        <p class="card-text">{{$ownDev['dateFounded']}}</p>
                        <a href="/editDev/{{$developer->id}}" class="btn btn-primary">Edit</a><br><br>
                        <form action="/deleteDev/{{$developer->id}}" method="POST" class="d-inline-block">
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