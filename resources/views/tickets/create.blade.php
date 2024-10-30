
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/css/create.css')}}">
</head>
<body>
    <div class="main">
        <div class="content">
          
            <h1>Ticket create </h1> 
       
            <form action="{{route('tickets.store')}}" method="post">
                @csrf
                <div>
                    <label for="title">Title</label>
                    <input name="title" id="title" type="text" required>
                </div>
                <div>
                    <label for="desc">Description</label>
                    <input name="desc" id="desc" type="text" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="assigned_user_id">Assigend User</label>
                    <select name="assigned_user_id" id="assigned_user_id">
                        @foreach ($users as $user)
                        <option value="$user->id"> {{$user->name}}</option>
                        @endforeach
                    </div>
                <div>
                    <label for="deadline">Deadline</label>
                    <input type="date" name="deadline" id="deadline">
                </div>
                <div>
                    <label for="status">status</label>
                    <select name="status" id="status">
                        <option value="pending">pending</option>
                        <option value="ongoing">ongoing</option>
                        <option value="finished">finished</option>
                    </select>
                    <button type="submit" class="submit">Create Ticket</button>
                </div>
    
    
            </form>
        </div>
    </div>  
</body>


</html>