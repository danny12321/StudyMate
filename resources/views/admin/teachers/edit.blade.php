@extends('layouts.admin')

@section('content')
    <div class="container l-admin-teachers-new">
        <h1>Docent wijzigen</h1>

        <form method="POST" action="{{ route('admin_teacher_update', ['id' => $teacher->id] ) }}">
            @csrf
            @method('PUT')

            <label for="name">Naam</label>
            <input type="text" required value="{{$teacher->name}}" name="name" id="name">

            <button type="submit">Opslaan</button>
        </form>


        
        <form method="POST" action="{{ route('admin_teacher_delete', ['id' => $teacher->id] ) }}">
            @csrf
            @method('DELETE')

            <button type="submit">Verwijderen</button>
        </form>
    </div>
@endsection