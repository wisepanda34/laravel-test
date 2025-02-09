@extends('layouts.app')

@section('content')

<h3>Laptops</h3>

<table class="table table-hover">
  <thead>
    <tr class="table-success">
      <th scope="col">#</th>
      <th scope="col">Brand</th>
      <th scope="col">Model</th>
      <th scope="col">Processor</th>
    </tr>
  </thead>
  <tbody>

    @foreach($laptops as $lap)
    <tr onclick="window.location='{{ route('laptops.show', $lap->id) }}';" title="{{ $lap->brend }}">
      <th scope="row">{{ $loop->iteration }}</th> 
      <td>{{ $lap->brend }}</td>
      <td>{{ $lap->model }}</td>
      <td>{{ $lap->proccesor ? $lap->proccesor->name : 'no info'  }}</td> 
    </tr>
    @endforeach

  </tbody>
</table>

<div class="d-flex justify-content-between" >
  <a href="{{ route('laptops.create') }}" class="btn btn-primary mt-3">Add new laptop</a>
  <a href="{{ route('laptops.trashed') }}" class="btn btn-warning mt-3">Show deleted</a>
</div>

@endsection


