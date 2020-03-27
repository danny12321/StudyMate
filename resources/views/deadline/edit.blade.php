@extends('layouts.deadline')

@section('content')
    <div class="container">
        <h1>Deadline instellen {{ $course->name}}</h1>
        
        <form method="POST" action="{{ route('deadline_course_update', ['course' => $course->id]) }}" enctype="multipart/form-data">
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

            <div class="form-group">
                <label for="deadline">Grade</label>
                <input value="{{$course->grade}}" class="form-control @error('grade') is-invalid @enderror" type="number" min="0" name="grade" id="grade">

                @error('grade') 
                    <div class="invalid-feedback">
                        {{ $errors->first("grade") }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tags">Tags</label>
                <select class="form-control @error('tags') is-invalid @enderror" name="tags[]" id="tags" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" @if($course->tags->contains($tag->id)) selected='selected' @endif>{{ $tag->tag}}</option>
                    @endforeach
                </select>

                @error('tags') 
                    <div class="invalid-feedback">
                        {{ $errors->first("tags") }}
                    </div>
                @enderror
            </div>

            @if ($course->assessment->type === "Assessment")
            <div class="form-group">
                <label for="attachment">Bijlage</label>
                <input class="form-control @error('attachment') is-invalid @enderror" accept=".zip" type="file" name="attachment" id="attachment">

                @error('attachment') 
                    <div class="invalid-feedback">
                        {{ $errors->first("attachment") }}
                    </div>
                @enderror
            </div>
            @endif

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
@endsection