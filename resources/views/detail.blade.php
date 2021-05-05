@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$response->type}}/  {{$response->location}}</div>

                <div class="card-body">
                    <h2>{{$response->title}}</h2>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!!$response->description!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
