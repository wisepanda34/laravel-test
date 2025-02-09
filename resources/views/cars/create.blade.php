@extends('layouts.app')

@section('content')

<h3 class="mb-5 mt-3 text-cyan-700">Create new car</h3>

<form action="{{route('cars.store')}}" method="POST">
  @csrf

  <div class="row">
    <div class="col">
      <input type="text" class="form-control" name="brand" placeholder="Brand" aria-label="Brand">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="model" placeholder="Model" aria-label="Model">
    </div>
  </div>
  <div class="row mt-3">
    <div class="col">
      <input type="text" class="form-control" name="color" placeholder="Color" aria-label="Color">
    </div>
    <div class="col">
      <input type="number" class="form-control" name="price" placeholder="Price" aria-label="Price">
    </div>
  </div>

  <button type="submit" class="btn btn-primary mt-3">Create car</button>

</form>

<style>
  .text-cyan-700{
    color: blue;
  }
</style>
@endsection
