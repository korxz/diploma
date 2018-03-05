@extends('layouts.master')

@section('content')

<div class="content">
        <div class="title m-b-md">
            Sections
        </div>
        <div class="row">
            <div class="container">
                @foreach ($sections as $item)
                    <div class="col-md-2">
                        <p>{{ $item->odsek }}</p>
                        <p>{{ $item->kraj_nesrece }}</p>
                        <p><b>{{ $item->counter }}</b></p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection