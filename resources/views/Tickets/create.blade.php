
@extends('App.layout')
@section('title','Create a ticket')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mt-5">
                <div class="card-header">
                    <h5 class="float-left">Create a ticket</h5>
                    <div class="clear-fix"></div>
                </div>

                <div class="card-body">
                    <form action="{{route('ticket.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-lg-2 control-label">Title: </label>
                            <div class="col-lg-10">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="title" class="col-lg-2 control-label">Content: </label>
                            <div class="col-lg-10">
                                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                                <span class="small lead">Feel free to ask any question</span>
                                <br>
                                @error('content')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-lg-10">
                                <button class="btn btn-danger btn-sm">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
