@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        {{-- @csrf --}}

                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <input type="text" name="description" class="form-control" placeholder="Description">
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Location:</strong>
                                    <input type="text" name="location" class="form-control" placeholder="Location">
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Full time:</strong>
                                    <input type="checkbox" name="fulltime" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3 text-center">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card-body">
                    <table  class="table table-bordered">
                        <tr>
                            <td>Title</td>
                            <td>Company</td>
                            <td>Location</td>
                            {{-- <td>Description</td> --}}
                            <td>Type</td>
                        </tr>
                        @foreach ( $response as $item)
                            <tr>
                                <td>
                                    <a href="{{url()->current()}}/detail/{{$item->id}}">{{$item->title}}</a>
                                </td>
                                <td>{{$item->company}}</td>
                                <td>{{$item->location}}</td>
                                {{-- <td>{{$item->description}}</td> --}}
                                <td>{{$item->type}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                @if ( request()->get('page') != "")
                    @php
                        $page = request()->get('page') + 1
                    @endphp
                    <a class="btn btn-primary" href="{{url()->current()}}?page={{$page}}" role="button">Show more jobs</a>
                @else
                    <a class="btn btn-primary" href="{{url()->current()}}?page=2" role="button">Show more jobs</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
