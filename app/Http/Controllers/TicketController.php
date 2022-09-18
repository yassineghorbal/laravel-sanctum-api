<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    //add a new ticket
    public function addTicket(Request $request)
    {
        $request->validate([
            'show_id' => 'required',
            'user_id' => 'required',
        ]);
        return Ticket::create($request->all());
    }

    //cancel a ticket
    public function destroy($id)
    {
        return Ticket::destroy($id);
    }
}
