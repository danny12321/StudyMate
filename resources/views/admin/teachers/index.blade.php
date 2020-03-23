@extends('layouts.admin')

@section('content')
    <div class="container l-admin-teachers">
        <h1>Docenten</h1>
        <a href="{{ route('admin_teacher__new') }}">Docent toevoegen</a>
        
        @if(count($teachers))
        @foreach ($teachers as $teacher)
        <div>
            {{$teacher->name}}
        </div>
        @endforeach
        @else
            <b>Er zijn geen docenten gevonden</b>
        @endif
    </div>
@endsection