@extends('layouts.main')

@section('content')
<h3>Delails</h3>

<table class="table table-bordered border-grey">
  <thead>
    <tr class="table-success">
      <th scope="row" class="text-center">Parameter</th>
      <th scope="row" class="text-center">Value</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th class="ps-md-4">Title</th> 
      <td class="ps-md-4">{{ $team->title }}</td>
    </tr>
    <tr>
      <th class="ps-md-4">Country</th> 
      <td class="ps-md-4">{{ $team->country ? $team->country->title : 'no info' }}</td>
    </tr>
    <tr>
      <th class="ps-md-4">Assignment</th> 
      <td class="ps-md-4">
        @if($team->achievements->isEmpty())
          No specialties
        @else
          @foreach($team->achievements as $achievement)
            <p>{{ $achievement->title }}</p>
          @endforeach
        @endif
      </td>
    </tr>
  </tbody>
</table>

<div class="d-flex justify-content-between">
  <a href="{{route('teams.index')}}" class="btn btn-light">Back</a>
  <div class="d-flex gap-3">
    <a href="{{route('teams.edit', $team->id)}}" class="btn btn-primary">Edit</a>
    <form action="{{route('teams.delete', $team->id)}}" method="POST">
      @csrf
      @method('delete')
      <input type="submit" class="btn btn-danger" value="Delete"/>
    </form>
  </div>
</div>


@endsection

