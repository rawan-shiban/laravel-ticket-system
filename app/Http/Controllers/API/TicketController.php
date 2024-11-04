<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class TicketController extends Controller
{
    //
    public function index()
    {
        $tickets =Ticket::all();
        return response()->json(["msg"=>"data retrived successfully",
                                    "success"=>true,
                                    "data"=>["tickets"=>$tickets]]);      
    }
    public function show($id)
    {
        $ticket = Ticket::find($id);
        return response()->json(["msg"=>"data retrived successfully",
                                "success"=> true ,
                                "data"=>$ticket]);
    }
    public function store(Request $request){
        try{
        $data = $request ->all();
        $ticket = new Ticket();
        $ticket->title = $data ['title'];
        $ticket->desc = $data ['desc'];
        $ticket->deadline =$data ['deadline'];
        $ticket->status = $data ['status'];
        $ticket->assigned_user_id = $data ['assigned_user_id'];
        $ticket->user_id = Auth::guard('api')-> user()->id;
        $ticket->save();
        return response()->json(["msg"=>"created successfully","success"=>true,"data"=>$ticket]);
    }
    catch(Exception $e){
        return response()->json(["msg"=>$e->getMessage(),"success"=>false,"data"=>[]],500);

    }

    }
    public function update(Request $request,$id){
     try{
        $ticket = Ticket::find($id);
        $data = $request->all();
        $ticket->title = $data['title'];
        $ticket->desc = $data['desc'];
        $ticket->status=$data['status'];
        $ticket->deadline=$data['deadline'];
        $ticket->assigned_user_id = $data['assigned_user_id'];
  
        $ticket->save();
        return response()->json(["msg"=>"update successfully",
                                "success"=>true,
                                "data"=>$ticket]);
     }
     catch(Exception $e)
     {
        return response()->json([
            "msg"=>$e->getMessage(),
            "success"=>false,
            "data"=>[]
        ],500);
     }

    }
   public function destroy($id)
    {
        try{
            $ticket = Ticket::find($id);
            $ticket -> delete();
            return response()->json(["msg"=>"successfully delete",
                                    "success"=>true,
                                    "data"=>$ticket]);
        }
        catch(Exception $e){
            return response()->json(["msg"=>$e->getMessage(),
                            "success"=>false,
                            "data"=>[]],500);

        }
    }
}
