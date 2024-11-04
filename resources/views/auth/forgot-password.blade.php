<form action="{{route("forgot-password")}}" method="post">
@csrf
    <label for="">Email</label>
    <input name="email" type="email">
    <button type="submit">submit</button>
</form>
<div>{{Session::get("message")}}</div>