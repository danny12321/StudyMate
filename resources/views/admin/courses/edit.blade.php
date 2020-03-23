@extends('layouts.admin')

@section('content')
    <div class="container l-admin-courses-new">
        <h1>Vak toevoegen</h1>

        <form method="POST" action="{{ route('admin_course_create') }}">
            @csrf

            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" required name="name" id="name">
            </div>

            <div class="form-group">
                <select name="coordinator">
                    @foreach($teachers as $teacher)
                     <option value="{{ $teacher->id }}">{{ $teacher->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <select name="assessmenttype">
                    @foreach($assessment_types as $assessment_type)
                     <option value="{{ $assessment_type->id }}">{{ $assessment_type->type}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="studypoints">Studie punten</label>
                <input type="number" required name="studypoints" id="studypoints">
            </div>

            <div class="form-group">
                <label for="block">Blok</label>
                <input type="number" required name="block" id="block">
            </div>

            <div class="form-group">
                <label for="deadline">Blok</label>
                <input type="date" required name="deadline" id="deadline">
            </div>

            <button type="submit">Opslaan</button>
        </form>
    </div>
@endsection