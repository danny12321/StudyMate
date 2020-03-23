@extends('layouts.admin')

@section('content')
    <div class="container l-admin-teachers-new">
        <h1>Docent toevoegen</h1>

        <form method="POST" action="{{ route('admin_teacher__create') }}">
            @csrf

            <label for="name">Naam</label>
            <input type="text" required name="name" id="name">

            <button type="submit">Opslaan</button>
        </form>
    </div>
@endsection