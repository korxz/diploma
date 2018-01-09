@extends('layouts.master')

@section('content')

<div class="content">
        <div class="title m-b-md">
            Sections
        </div>
    
        <div class="list-sections">

            <table>
                    <thead>
                        <tr>
                            <th>Odsek</th>
                            <th>Kraj nesrece</th>
                            <th>Število nesreč</th>
                        </tr>
                    </thead>
            
                    <tbody>
                            @foreach ($sections as $section)
                            <tr>
                                <td><em>{{ $section->odsek }}</em></td>
                                <td>{{ $section->kraj_nesrece }}</td>
                                <td>{{ $section->counter }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
    
@endsection