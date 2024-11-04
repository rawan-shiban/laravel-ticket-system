<!DOCTYPE html>  
<html lang="ar">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Ticket Details</title> 
    <link rel="stylesheet" href="{{asset('/css/details.css')}}"> 
</head>  
<body>      
    <div class="main">
          @if (Session::get('message'))
        <div style="background:rgb(1, 134, 14);width:100%;height:3rem;">
            <div style="color: antiquewhite; font-size:20px;">{{Session::get("message")}}</div>
    
            </div>    
        @endif
        <div class="content"> 
            <h1 class="title">Ticket ditels</h1>
      
            <table >
                <tr >
                    <td class="head">ID</td>
                    <td>{{ $ticket->id }}</td>
                   
                </tr>
                <tr>
                    <td class="head">title</td>
                    <td>{{ $ticket->title }}</td>
                    
                </tr>
                <tr>
                    <td class="head">description</td>
                    <td>{{ $ticket->desc }}</td>
                    
                </tr>
                <tr>
                    <td class="head">status</td>
                    <td>{{$ticket->status }}</td>
                   
                </tr>
                <tr>
                    <td class="head">Assigend User</td>
                    <td>{{ $ticket->assigned_user->name }}</td>
                    
                </tr>
                <tr>
                    <td class="head">Owner User</td>
                    <td>{{ $ticket->owner->email }}</td>
                    
                </tr>
                <tr>
                    <div class="Deadline">
                        <td class="head">deadline</td>
                        <td>{{ $ticket->deadline }}</td>
                    </div>
                   
                   
                </tr>
            
            </table>
            
            <div class="button">
                <a class="a back" href="{{route('tickets.index')}}">back to tickets</a>
                <a class="a edit" href="{{route('tickets.update',$ticket->id)}}">Edit</a>
            <form class="delete"  action="{{route('tickets.destroy',$ticket->id)}} "method="post">
                @csrf
                    @method('DELETE')

               <button class="delete" type="submit">Delete</button>
            </form> 
        </div>
    </div>

</body>  
</html>