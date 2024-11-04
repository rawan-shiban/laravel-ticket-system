<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller       
{
   public function index()
   {
      $tickets = Ticket::all();

      
     return view ("tickets.index",["tickets"=>$tickets]);
   }

  public function create()
   {
      $users = User::all();
      return view('tickets.create' , ['users'=>$users]);
   }


   public function show(string $id)
   {
    $ticket = Ticket::where('id',$id)->with("owner","assigned_user")->first();

    return view("tickets.details",["ticket"=>$ticket]);
   }
   public function store(Request $request)
   {
       $data = $request->all();
       $ticket = new Ticket();

      $ticket->title = $data['title'];
      $ticket->desc = $data['desc'];
      $ticket->deadline=$data ['deadline'];
      //$ticket->assigned_user_id=$data ['assigned_user_id'];
      $ticket->status =$data['status'];
      //$ticket->user_id=Auth::user()->id;
      $ticket->user_id = $request -> user("web")->id;
      $ticket->save();
  
       return redirect("/tickets")->with("message","create successfully");

   }



   public function edit(string $id)
   {
      $ticket =Ticket::find($id);
      $users = User::all();

      return view ("tickets.edit",['ticket'=>$ticket , 'users'=>$users]);


   }

   public function update(Request $request,string $id )
   {
      $data = $request-> all();
      $ticket  = Ticket::find($id);
      $ticket->title = $data['title'];
      $ticket->desc = $data['desc'];
      $ticket->deadline=$data ['deadline'];
      //$ticket->assigned_user_id = $data ['assigned_user_id'];
      $ticket->status =$data['status'];
      $ticket ->save();
      return redirect("/tickets/".$id)->with("message",'updated successfully');


   }

   public function destroy(string $id )
   {
      $ticket = Ticket::find($id);
      $ticket->delete();

      return redirect("/tickets");
   }
}
