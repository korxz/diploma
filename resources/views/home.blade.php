@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-8 col-md-offset-2">
                        Latest accident:
                        <p>
                            <b>Date: </b>{{ $latest_accident->datum}}
                            <b>Time: </b>{{ $latest_accident->ura }}
                            <b>Section: </b>{{ $latest_section->odsek}}, {{ $latest_section->kraj_nesrece }}
                        </P>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
