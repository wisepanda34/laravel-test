@extends('layouts.main')

@section('content')

<h3 class="mb-5 mt-3 text-cyan-700">Update data of the car</h3>

<form action="{{route('cars.update', $car->id)}}" method="POST">
  @csrf
  @method('patch')

  <div class="row">
    <div class="col">
      <input type="text" class="form-control" name="brand" placeholder="Brand" value="{{$car->brand}}" aria-label="Brand">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="model" placeholder="Model" value="{{$car->model}}" aria-label="Model">
    </div>
  </div>
  <div class="row mt-3">
    <div class="col">
      <input type="text" class="form-control" name="color" placeholder="Color" value="{{$car->color}}" aria-label="Color">
    </div>
    <div class="col">
      <input type="number" class="form-control" name="price" placeholder="Price" value="{{$car->price}}" aria-label="Price">
    </div>
  </div>

  <button type="submit" class="btn btn-primary mt-3">Update</button>

</form>

@endsection

<style>
  .text-cyan-700{
    color: blue;
  }
</style>