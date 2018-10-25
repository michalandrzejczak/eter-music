@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Moje wypożyczenia</h3>
        </div>
    </div>
@isset($instruments, $rents)
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto">
            <table class="instrument-list display table-hover table"> 
                <thead>
                    <tr>
                        <th>Instrument</th>
                        <th>Od</th>
                        <th>Do</th>
                    </tr>
                </thead>
                @foreach($rents as $rent)
                    <tr>
                        <td>
                            {{ $instruments->find($rent->instrument_id)->title}}  
                        </td>
                        <td>
                            {{$rent->start}} 
                        </td>
                        <td>
                            {{$rent->end}} 
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endisset
</div>
@endsection
