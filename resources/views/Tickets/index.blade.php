@extends('App.layout')
@section('title','View all tickets')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto mt-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left">Tickets</h5>
                    <div class="clearfix"></div>
                </div>


                <div class="card-body">
                    @include('Message.success')
                @if($tickets->isEmpty())
                    <p>There is no ticket</p>
                @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }} </td>
                                    <td>
                                        <a href="{{route('ticket.show',$ticket->slug)}}">
                                            {{ $ticket->title }}
                                        </a>
                                    </td>
                                    <td>{{ $ticket->status ? 'Pending' : 'Answered' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                @endif
            </div>
            </div>
        </div>
    </div>
@endsection
