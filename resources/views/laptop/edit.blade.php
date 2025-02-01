@extends('layouts.main')

@section('content')

<form action="{{ route('laptops.update', $laptop->id) }}" method="POST">
  @csrf
  @method('patch')
  <div class="mb-3">
    <label for="brend" class="form-label">Brand</label>
    <input type="text" class="form-control" id="brend" name="brend" value="{{$laptop->brend}}">
  </div>
  <div class="mb-3">
    <label for="model" class="form-label">Model</label>
    <input type="text" class="form-control" id="model" name="model" value="{{$laptop->model}}">
  </div>

  <div class="group-form mb-3">
    <label for="proccesor" class="form-label">Processor</label>
    <select class="form-select" id="proccesor" name="proccesor_id">
      @foreach($proccesors as $proccesor)
      <option 
        value="{{ $proccesor->id }}" 
        {{ $laptop->proccesor_id == $proccesor->id ? 'selected' : '' }}
      >
        {{ $proccesor->name }}
    </option>
      @endforeach
    </select>
  </div>

  <div class="mb-5">
    <label for="specialty" class="form-label">Specialties</label>
    <div class="row row-cols-1 row-cols-sm-2 g-2">
        @foreach($specialties as $specialty)
        <div class="col">
            <div class="form-check">
                <input 
                  class="form-check-input" 
                  type="checkbox" 
                  id="specialty_{{ $specialty->id }}" 
                  value="{{ $specialty->id }}" 
                  name="specialties[]" 
                  {{ $laptop->specialties->contains($specialty->id) ? 'checked' : '' }}
                >
                <label class="form-check-label" for="specialty_{{ $specialty->id }}">
                    {{ $specialty->title }}
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