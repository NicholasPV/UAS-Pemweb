@extends('app')

@section('content')
    <div class="mt-4">
        <h1>Edit Developer Details</h1>
        <form action="/editDev/{{$developer->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                    <input name="developer" type="text" class="form-control" value="{{$developer->developer}}">
                </div>
                <div class="form-group">
                    <input name="headquarters" type="text" class="form-control" value="{{$developer->headquarters}}">
                </div>
                <div class="form-group">
                    <input name="description" type="text" class="form-control" value="{{$developer->description}}">
                </div>
                <div class="form-group">
                    <input name="founder" type="text" class="form-control" value="{{$developer->founder}}">
                </div>
                <div class="form-group">
                    <input name="locationFounded" type="text" class="form-control" value="{{$developer->locationFounded}}">
                </div>
                <div class="form-group">
                    <input name="dateFounded" type="date" class="form-control" value="{{$developer->dateFounded}}">
                </div>
                <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
    </div>
@endsection