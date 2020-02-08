@extends('layouts.app')
@section('title','View a ticket')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto mt-5">
            <div class="card my-2 p-2">
                <div class="card-header">
                    <h5 class="float-left">{{$ticket->title}}</h5>
                    <div class="clearfix"></div>
                </div>


                <div class="card-body">
                    <p><strong>Status</strong>: {{$ticket->status ? 'Pending': 'Answered'}}</p>

                    <p>{{$ticket->content}}</p>
                    <a href="{{route('ticket.edit',$ticket->slug)}}" class="btn btn-sm btn-info float-left mr-2">Edit</a>
{{--                    <a href="{{route('ticket.delete',$ticket->slug)}}" class="btn btn-sm btn-danger">Delete</a>--}}

                    <form action="{{route('ticket.delete',$ticket->slug)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" id="delete">Delete</button>
                    </form>

                    <div class="clear-fix"></div>
                </div>
            </div>

{{--            comment show   --}}

                <h4>All Comments</h4>


            @forelse($comments as $comment)
                <div class="card card-body mt-2">
                    {{$comment->content}}
                </div>
            @empty
                    <div class="card card-body mt-2 lead small">
                        Not Comment yet.....
                    </div>
            @endforelse
{{--            comment post form--}}
            <div class="card mt-3 p-2">
                <form action="{{route('ticket.newcomment')}}" method="post">
                    @csrf
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger">{{$error}}</p>
                    @endforeach

                    @include('Message.success')

                    <input type="hidden" name="t_id" value="{{$ticket->id}}">

                    <fieldset>
                        <legend class="ml-3">Reply</legend>

                        <div class="form-group">
                            <div class="col-lg-12">
                                <textarea name="content" id="content"  rows="3" class="form-control" placeholder="Comment..."></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10">
                                <button type="reset" class="btn btn-primary btn-sm">Cancel</button>
                                <button type="submit" class="btn btn-success btn-sm">Post</button>
                            </div>
                        </div>
                    </fieldset>

                </form>
            </div>
        </div>
    </div>
@endsection

