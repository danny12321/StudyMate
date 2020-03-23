@extends('layouts.admin')

@section('content')
    <div class="container l-admin-teachers-new">
        <h1>Docent wijzigen</h1>

        <form method="POST" action="{{ route('admin_teacher_update', ['teacher' => $teacher->id] ) }}">
            @csrf
            @method('PUT')

            <label for="name">Naam</label>
            <div class="input-group mb-3">
                <input type="text" required value="{{$teacher->name}}" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Naam" aria-label="Name" aria-describedby="basic-addon1">
            </div>

            @error('name')
                <p class="text-danger">{{$errors->first('name')}}</p>
            @enderror
            <button class="btn btn-primary" type="submit">Opslaan</button>
        </form>

        <form method="POST" action="{{ route('admin_teacher_delete', ['teacher' => $teacher->id] ) }}">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger" type="submit">Verwijderen</button>
        </form>
    </div>
@endsection