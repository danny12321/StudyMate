@extends('layouts.deadline')

@section('content')
    <div class="container">
        <h1>Deadline instellen {{ $course->name}}</h1>
        
        <form method="POST" action="{{ route('deadline_course_update', ['course' => $course->id]) }}">
            @csrf
            @method("PUT")

            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input value="{{str_replace(" ","T",$course->deadline)}}" class="form-control @error('deadline') is-invalid @enderror" type="datetime-local" name="deadline" id="deadline">

                @error('deadline') 
                    <div class="invalid-feedback">
                        {{ $errors->first("deadline") }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Opslaan</button>

        </form>
    </div>
@endsection