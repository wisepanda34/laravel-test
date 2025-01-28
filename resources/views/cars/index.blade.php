@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between">
  <div>
    <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Add car</a>
  </div>
  
  <div>
    <a href="{{ route('cars.deleted_cars') }}" class="btn btn-info mb-3">Show deleted cars</a>
  </div>
</div>

<table class="table">
  <thead>
    <tr class="table-success">
      <th scope="col">#</th>
      <th scope="col">Id</th>
      <th scope="col">Brand</th>
      <th scope="col">Model</th>
      <th scope="col">Color</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cars as $car)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $car->id }}</td>
        <td>{{ $car->brand }}</td>
        <td>{{ $car->model }}</td>
        <td>{{ $car->color }}</td>
        <td>{{ $car->price }}</td>
        <td>
          <a href="{{ route('cars.show', $car->id) }}" class="d-sm-inline-block ms-auto">
            <i class="bi bi-search"></i>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection

<style>
  .bi-house-fill, .bi-search {
    font-size: 1rem;
    color: #0556ab;
  }
</style>