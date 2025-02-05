@extends('layouts.main')

@section('content')

<h3>Teams</h3>

<table class="table table-hover">
  <thead>
    <tr class="table-success">
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Country</th>
    </tr>
  </thead>
  <tbody>

    @foreach($teams as $team)
    <tr onclick="window.location='{{ route('teams.show', $team->id) }}';" title="{{ $team->title }}">
      <th scope="row">{{ $loop->iteration }}</th> 
      <td>{{ $team->title }}</td>
      <td>{{ $team->country->title }}</td>
    </tr>
    @endforeach

  </tbody>
</table>

<div class="d-flex justify-content-between" >
  <a href="{{ route('teams.create') }}" class="btn btn-primary mt-3">Add new team</a>
</div>

@endsection


