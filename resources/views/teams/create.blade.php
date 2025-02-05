@extends('layouts.main')

@section('content')

<form action="{{ route('teams.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
  </div>

  <div class="group-form mb-3">
    <label for="country" class="form-label">Country</label>
    <select class="form-select" id="country" name="country_id">
      <option value="" class="text-muted font-italic" disabled selected>Choose country</option>
      @foreach($countries as $country)
      <option value="{{ $country->id }}" 
        {{ old('country') == $country->id ? 'selected' : '' }}
      >
        {{ $country->title }}
    </option>
      @endforeach
    </select>
  </div>

  <div class="mb-5">
    <label for="achievements" class="form-label">Achievements</label>
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
                  {{ in_array($achievement->id, old('achievements', $selectedAchievements ?? [])) ? 'checked' : '' }}
                >
                <label class="form-check-label" for="achievement_{{ $achievement->id }}">
                    {{ $achievement->title }}
                </label>
            </div>
        </div>
        @endforeach
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>

@endsection