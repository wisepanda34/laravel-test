@extends('layouts.app')

@section('content')

<h3 class="m-3 ">Information about car</h3>

<table class="mb-5">
  <tr>
      <th>Field</th>
      <th>Value</th>
  </tr>
  <tr>
      <td>ID</td>
      <td>{{$car->id}}</td>
  </tr>
  <tr>
      <td>Brand</td>
      <td>{{$car->brand}}</td>
  </tr>
  <tr>
      <td>Model</td>
      <td>{{$car->model}}</td>
  </tr>
  <tr>
      <td>Color</td>
      <td>{{$car->color}}</td>
  </tr>
  <tr>
      <td>Price</td>
      <td>{{$car->price}}</td>
  </tr>
</table>

<div class="d-flex justify-content-start gap-5 mb-5">
  <a href="{{route('cars.edit', $car->id)}}"><input type="button" class="btn btn-warning text-white" value="Edit car"></a>
  <form action="{{route('cars.delete', $car->id)}}" method="POST">
    @csrf
    @method('delete')
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
</div>

<div><a href="{{route('cars.index')}}"><strong>Back to all cars</strong></a></div>

@endsection

<style>
  table {
      border-collapse: collapse;
      width: 100%;
  }

  th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
  }

  th {
      background-color: #f2f2f2;
  }
</style>