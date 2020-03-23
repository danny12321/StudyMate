@extends('layouts.admin')

@section('content')
    <div class="container l-admin-teachers">
        <h1>Docenten</h1>
        <a href="{{ route('admin_teacher_new') }}">Docent toevoegen</a>

        @if(count($teachers))
        @foreach ($teachers as $teacher)
        <div>
            {{$teacher->name}}
            <a href="{{route('admin_teacher_edit', ['teacher' => $teacher->id])}}">edit</a>
        </div>
        @endforeach
        @else
            <b>Er zijn geen docenten gevonden</b>
        @endif
    </div>
@endsection