@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Пример Bootstrap</h1>
    <button class="btn btn-primary">Кнопка</button>
</div>

{{-- <div class="container">
    <h1 class="bg-gradient-custom text-shadow my-class">Home page</h1>
    <div class="container mt-5">
    <h1 class="text-center">Пример Bootstrap</h1>
    <button class="btn btn-primary">Кнопка</button>
</div> --}}

    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
