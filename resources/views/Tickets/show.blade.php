@extends('App.layout')
@section('title','View all tickets')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto mt-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left">{{$ticket->title}}</h5>
                    <div class="clearfix"></div>
                </div>


                <div class="card-body">
                    <p><strong>Status</strong>: {{$ticket->status ? 'Pending': 'Answered'}}</p>

                    <p>{{$ticket->content}}</p>
                    <a href="{{route('ticket.edit',$ticket->slug)}}" class="btn btn-sm btn-info">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection
