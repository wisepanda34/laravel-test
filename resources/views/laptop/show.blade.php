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
      <th class="ps-md-4">Brand</th> 
      <td class="ps-md-4">{{ $laptop->brend }}</td>
    </tr>
    <tr>
      <th class="ps-md-4">Model</th> 
      <td class="ps-md-4">{{ $laptop->model }}</td>
    </tr>
    <tr>
      <th class="ps-md-4">Processor</th> 
      <td class="ps-md-4">{{ $laptop->proccesor ? $laptop->proccesor->name : 'no info' }}</td>
    </tr>
    <tr>
      <th class="ps-md-4">Description</th> 
      <td class="ps-md-4">{{ $laptop->proccesor ? $laptop->proccesor->description : 'no info' }}</td>
    </tr>
    <tr>
      <th class="ps-md-4">Assignment</th> 
      <td class="ps-md-4">
        @if($laptop->specialties->isEmpty())
          No specialties
        @else
          @foreach($laptop->specialties as $specialty)
            <p>{{ $specialty->title }}</p>
          @endforeach
        @endif
      </td>
    </tr>
  </tbody>
</table>

<div class="d-flex justify-content-between">
  <a href="{{route('laptops.index')}}" class="btn btn-light">Back</a>
  <div class="d-flex gap-3">
    <a href="{{route('laptops.edit', $laptop->id)}}" class="btn btn-primary">Edit</a>
    <form action="{{route('laptops.delete', $laptop->id)}}" method="POST">
      @csrf
      @method('delete')
      <input type="submit" class="btn btn-danger" value="Delete"/>
    </form>
  </div>
</div>


@endsection

