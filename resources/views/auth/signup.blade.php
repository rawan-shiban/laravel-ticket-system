<h1>signup</h1>
<div>
        <form action="{{route('auth.signup')}}" method="post">
            @csrf
            <label for="name">name</label>
            <input name="name">
            <label for="email">email</label>
            <input name="email">
            
            <label for="password">password</label>
            <input name="password">
            <button type="submit">singup</button>
        </form>
</div>
<div>{{Session::get("message")}}</div>
</div>