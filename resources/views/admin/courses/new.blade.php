@extends('layouts.admin')

@section('content')


    <div class="container l-admin-courses-new">
        <h1>Vak toevoegen</h1>
        
        <form method="POST" action="{{ route('admin_course_create') }}">
            @csrf

            <div class="form-group">
                <label for="name">Naam</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name">

                @error('name') 
                    <div class="invalid-feedback">
                        {{ $errors->first("name") }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="coordinator">Coordinator</label>
                <select name="coordinator" class="form-control @error('coordinator') is-invalid @enderror">
                    @foreach($teachers as $teacher)
                     <option value="{{ $teacher->id }}">{{ $teacher->name}}</option>
                    @endforeach
                </select>

                @error('coordinator') 
                    <div class="invalid-feedback">
                        {{ $errors->first("coordinator") }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="assessmenttype">Assessment type</label>
                <select name="assessmenttype" class="form-control @error('assessmenttype') is-invalid @enderror">
                    @foreach($assessment_types as $assessment_type)
                     <option value="{{ $assessment_type->id }}">{{ $assessment_type->type}}</option>
                    @endforeach
                </select>

                @error('assessmenttype') 
                    <div class="invalid-feedback">
                        {{ $errors->first("assessmenttype") }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="studypoints">Studie punten</label>
                <input class="form-control @error('studypoints') is-invalid @enderror" type="number" name="studypoints" id="studypoints">

                @error('studypoints') 
                    <div class="invalid-feedback">
                        {{ $errors->first("studypoints") }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="block">Blok</label>
                <input class="form-control @error('block') is-invalid @enderror" type="number" name="block" id="block">

                @error('block') 
                    <div class="invalid-feedback">
                        {{ $errors->first("block") }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="teachers">Docenten</label>
                <select class="form-control @error('teachers') is-invalid @enderror" name="teachers[]" id="teachers" multiple>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name}}</option>
                    @endforeach
                </select>

                @error('teachers') 
                    <div class="invalid-feedback">
                        {{ $errors->first("teachers") }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>




@endsection