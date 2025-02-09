@extends('layouts.app')

@section('content')

<form action="{{ route('teams.update', $team->id) }}" method="POST">
  @csrf
  @method('patch')
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{$team->title}}">
  </div>
  <div class="group-form mb-3">
    <label for="country" class="form-label">Country</label>
    <select class="form-select" id="country" name="country_id">
      @foreach($countries as $country)
      <option 
        value="{{ $country->id }}" 
        {{ $team->country_id == $country->id ? 'selected' : '' }}
      >
        {{ $country->title }}
    </option>
      @endforeach
    </select>
  </div>

  <div class="mb-5">
    <label for="achievement" class="form-label">Achievement</label>
    <div class="row row-cols-1 row-cols-sm-2 g-2">
        @foreach($achievements as $achievement)
        <div class="col">
            <div class="form-check">
                <input 
                  class="form-check-input" 
                  type="checkbox" 
                  id="achievement_{{ $achievement->id }}" 
                  value="{{ $achievement->id }}" 
                  name="achievements[]" 
                  {{ $team->achievements->contains($achievement->id) ? 'checked' : '' }}
                >
                <label class="form-check-label" for="achievement_{{ $achievement->id }}">
                    {{ $achievement->title }}
                </label>
            </div>
        </div>
        @endforeach
    </div>
</div>
  
  <div class="d-flex justify-content-between">
    <a href="javascript:history.back()" class="btn btn-light">Back</a>
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>

@endsection