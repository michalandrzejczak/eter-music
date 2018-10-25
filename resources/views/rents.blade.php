@extends('layouts.app')

@section('content')

@isset($dates)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="instruments-thumbs text-center">
                <h4>{{$instrument->title}}</h4>
                <img src="../img/instruments/{{$instrument->image}}" alt="instrument-photo" class="img-responsive" width="70">
                <p>{{$instrument->description}}</p>
            </div>
            <div class="rentInstruction-container">Okres wypożyczenia musi być jednym ciągiem dni.</div>
            <table class="instrument-list display table-hover table"> 
             <thead>
              <tr>
               <th></th>
               <th></th>
               <th></th>
              </tr>
             </thead>
            @foreach ($dates as $dateKey => $dateValue)
            <tr>
                @if (is_array($dateValue))
                <td>               
                    {{$dateValue[0]}} 
                </td>
                <td>               
                    
                </td>
                <td> 
                    Wypożyczony. 
                </td>
                @else
                 <td>               
                     {{$dateValue}} 
                </td>
                <td>               
                    <input type="checkbox" name="dates[]" class="rent-dates" value="{{$dateValue}} "/>
                </td>
                <td> 
                   Wypożycz!
                </td>
                @endif

            </tr>
 
            @endforeach
            </table>
        </div>
    </div>
</div>
@endisset

@endsection


<button class="rent-button btn btn-primary btn-lg" style="display:none" data-toggle="modal" data-target="#myModal"></button>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form method="POST" action="{{ route('rents.create') }}">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Wypożyczenie instrumentu</h4>
          </div>

          <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="instrument_id" value="{{ $instrument_id }}">
                <input type="hidden" name="dates_input" class="dates_input">
                <input type="hidden" name="user" value="{{ Auth::user()->name }}">
                Wybrane dni:
                <div class="rent-list"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
            <button type="submit"  class="btn btn-primary">Wypożycz</button>
          </div>
        </form>
    </div>
  </div>
</div>

