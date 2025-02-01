@extends('layouts.main')

@section('content')

<h3>Deleted Laptops</h3>

<table class="table table-hover">
  <thead>
    <tr class="table-success">
      <th scope="col">#</th>
      <th scope="col">Brand</th>
      <th scope="col">Model</th>
      <th scope="col">Processor</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach($laptops as $lap)
    <tr  class="row-hover">
      <th scope="row">{{ $loop->iteration }}</th> 
      <td>{{ $lap->brend }}</td>
      <td>{{ $lap->model }}</td>
      <td>{{ $lap->proccesor ? $lap->proccesor->name : 'no info'  }}</td> 
      <td>
        <form action="{{ route('laptops.restore', $lap->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('PATCH')
          <button type="submit" class="btn btn-success">Restore</button>
        </form>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

<div class="d-flex justify-content-between">
  <a href="javascript:history.back()" class="btn btn-light">Back</a>
  {{-- <a href="{{ route('laptops.trashed') }}" class="btn btn-warning mt-3">Show deleted</a> --}}
</div>

@endsection

<style>
  .row-hover {
    transition: all 0.2s;
  }
  .row-hover:hover {
    /* background: #939090 !important;
    color: #0f12d1 !important; */
    cursor: pointer;
  }

</style>

