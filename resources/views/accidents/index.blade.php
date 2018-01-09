@extends('layouts.master')

@section('content')

<div class="content">
    <div class="title m-b-md">
        Accidents
    </div>

    <div>
        <h3>
            Borders by X: {{ $coordinate_borders['min_X'] . " : " . $coordinate_borders['max_X'] }}
        </h3>

        <h3>
            Borders by Y: {{  $coordinate_borders['min_Y'] . " : " . $coordinate_borders['max_Y'] }}
        </h3>
    </div>

</div>
    
@endsection