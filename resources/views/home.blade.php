@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Auth::user()->name }} - witaj w eter-music, internetowej wypożyczalni instrumentów jazzowych.
                </div>
            </div>
        </div>
    </div>
    @isset($instruments)
    <div class="row">
        <div class="instruments-thumbs">
            @foreach ($instruments as $instrument)
            <div class="col-12 col-md-8 col-lg-6 mx-auto">
                <div class="instrument-thumb">
                    <img src="img/instruments/{{$instrument->image}}" alt="instrument-photo" class="img-responsive" width="150">
                    <div class="caption">
                        <h4>{{$instrument->title}}</h4>
                        <p>{{$instrument->description}}</p>
                        <div class="btn-toolbar text-center">
                            <a href="/rents/{{$instrument->id}}" role="button" class="btn btn-secondary mx-auto">Wypożycz</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div> 
    </div>
    @endisset
</div>
@endsection
