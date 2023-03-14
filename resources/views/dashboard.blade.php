<body>
    dashboard
    <br>
    @auth {{ Auth::user()->name }} @endauth
    <form method="post" action="{{route('logout')}}">
        @csrf
        <input type="submit" value="logout">        
    </form>
    <a href="{{route('newpost')}}">
        <input type="submit" value="new">    
    </a>
    <br>
    @inject('userClass', 'App\Models\User')
    @foreach ($posts as $post)
        <div>
            <p>Topic:  {{ $post->title }}</p>         
            <p>Author: {{ ($userClass->find($post->user_id))->name }}</p>
            <p>Date:   {{ $post->created_at }}</p>
            <form method="get" action="{{route('newanswer')}}">
                <input type="hidden" name="post_id" value="{{$post->id}}">            
                <input type="submit" value="answer">
                <br>
                <br>
            </form>
        </div>
    @endforeach

<body>
