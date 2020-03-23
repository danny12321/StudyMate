@extends('layouts.admin')

@section('content')
    <div class="container l-admin-teachers">
        <h1>Vakken</h1>
        <a href="{{ route('admin_course_new') }}">Vak toevoegen</a>
        
        @if(count($courses))
        @foreach ($courses as $course)
        <div>
            {{$course->name}}
            <a href="{{ route('admin_teacher_edit', ['course' => $couese->id]) }}">edit</a>
        </div>
        @endforeach
        @else
            <b>Er zijn geen vakken gevonden</b>
        @endif
    </div>
@endsection