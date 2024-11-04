{{Session::get('message')}}
<h1>Login</h1>
<form action="{{route('auth.login_submit')}}" method="POST">
    @csrf
    <label for="email">email</label>
    <input name="email">
    <label for="password">password</label>
    <input name="password">
    <button type="submit">submit</button>
    <a href="{{route('forgot-password-view')}}">
        Forgot password?
    </a>
</form>