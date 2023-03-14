<body>
    login
    <br>
    <form method="post" action="{{route('login')}}">
        @csrf
        <input type="email" placeholder="email" name="email">
        <br>
        <input type="password" placeholder="password" name="password">
        <br>
        <input type="submit" value="login">
        <a href="{{route('newregister')}}">register</a>
    </form>
</body>
