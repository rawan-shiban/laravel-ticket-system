 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
</head>
<body>
       @if (Session::get('message'))
        <div style="background:rgb(1, 134, 14);width:100%;height:3rem;">
            <div style="color: antiquewhite; font-size:20px;">{{Session::get("message")}}</div>
    
            </div>    
        @endif

<div class="main">  
    
    <h1 class="title">Tickets</h1>  
    <div class="content">
         
    <form method="post" action="{{route("auth.logout")}}">
        @csrf<button type="submit">Logout</button>
     </form>
        <div class="create">
            <a class="a a_c" href="{{route('tickets.create')}}">Ticket create</a>
        </div>  
        <div class="status"> 
        <h2>Pending</h2>  
        @foreach($tickets->where("status","pending") as $ticket)  
        <div class="card_ticket"> 
                
                <div>  
                    <h3>{{$ticket->title}}</h3>  
                    <p>{{$ticket->desc}}</p> 
                    <div class="Deadline">
                        <h4>Deadline:  </h4>  
                        <p>{{$ticket->deadline}}</p>  </div> 
                   
                    <div class="button">  
                        <a class="a view" href="{{route('ticktes.show',$ticket->id)}}">View</a>
                   
                            <a class="a edit" href="{{route('tickets.edit',$ticket->id)}}">Edit</a>
                        
                    
                    <form    action="{{route('tickets.destroy',$ticket->id)}}" method="post">
                        @csrf
                            @method('DELETE')

                       <button class="delete" type="submit">Delete</button>
                    </form> 
                </div>  
            </div>  
            </div>  
        @endforeach 
    </div> 
    <div class="status">  
        <h2>ongoing</h2>  
        @foreach($tickets->where("status","ongoing") as $ticket)  
        <div class="card_ticket"> 
                <div>  
                    <h3>{{$ticket->title}}</h3>  
                    <p>{{$ticket->desc}}</p> 
                    <div class="Deadline">
                        <h4>Deadline:  </h4>  
                        <p>{{$ticket->deadline}}</p>  </div> 
                   
                    <div class="button">  
                        <a class="a view" href="{{route('ticktes.show',$ticket->id)}}">View</a>
                   
                            <a class="a edit" href="{{route('tickets.edit',$ticket->id)}}">Edit</a>
                        
                    
                    <form    action="{{route('tickets.destroy',$ticket->id)}}" method="post">
                        @csrf
                            @method('DELETE')

                       <button class="delete" type="submit">Delete</button>
                    </form> 
                </div>  
            </div>  
            </div>  
        @endforeach 
    </div>
    <div class="status">  
        <h2>Finished</h2>  
        @foreach($tickets->where("status","finished") as $ticket)  
           
        <div class="card_ticket"> 
                <div>  
                    <h3>{{$ticket->title}}</h3>  
                    <p>{{$ticket->desc}}</p> 
                    <div class="Deadline">
                        <h4>Deadline:  </h4>  
                        <p>{{$ticket->deadline}}</p>  </div> 
                   
                    <div class="button">  
                        <a class="a view" href="{{route('ticktes.show',$ticket->id)}}">View</a>
                   
                            <a class="a edit" href="{{route('tickets.edit',$ticket->id)}}">Edit</a>
                        
                    
                    <form    action="{{route('tickets.destroy',$ticket->id)}}" method="post">
                        @csrf
                            @method('DELETE')

                       <button class="delete" type="submit">Delete</button>
                    </form> 
                </div>  
            </div> 
            </div>  
        @endforeach  
    </div> 
    </div>  
    </div>  
</body>
</html>

