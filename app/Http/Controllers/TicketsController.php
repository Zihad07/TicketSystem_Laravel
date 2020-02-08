<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketFormRequest;
use Illuminate\Http\Request;
use App\Ticket;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = auth()->user()->tickets()->orderBy('created_at','desc')->get();
        return  view('tickets.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketFormRequest $request)
    {
//        dd($request->all());


        $slug = uniqid();
        $data = [
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => $slug,
            'user_id'=>auth()->user()->id
        ];
        $ticket = new Ticket($data);
        $ticket->save();

        return redirect(route('ticket.all'))->with('status','Your ticket has been created! Its unique id is: '.$slug);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $comments = $ticket->comments()->get();
        return view('tickets.show',compact('ticket','comments'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();

        return view('tickets.edit',compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketFormRequest $request, $slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();

        $ticket->title = $request->get('title');
        $ticket->content = $request->get('content');

        if($request->get('status') != null){
            $ticket->status = 0;
        }else{
            $ticket->status = 1;
        }

        $ticket->save();

        return redirect(route('ticket.edit',$ticket->slug))->with('status','The ticket '.$slug.' has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->comments()->delete();
        $ticket->delete();

        return redirect(route('ticket.all'))->with('status', 'The ticket '. $slug.' has been deleted');
    }
}
