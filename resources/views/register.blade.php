<body>
    register
    <br>
    <form method="post" action="{{route('saveregister')}}">
        @csrf
        <input type="text" placeholder="name" name="name">
        <br>
        <input type="email" placeholder="email" name="email">
        <br>
        <input type="password" placeholder="password" name="password">
        <br>
        <input type="submit" value="register">
        <a href="{{route('home')}}">login</a>
    </form>
</body>
