<body>
    answer
    <br>
    @auth {{ Auth::user()->name }} @endauth
    <br>
    @inject('postClass', 'App\Models\Post')
    <template>
    {{ $user_id = Auth::user()->id }}
    {{ $post = $postClass->find($post_id) }}
    </template>
    <p>{{ $post->title }}</p>
    <p>{{ $post->text_post}}</p>

    <form method="post" action="{{route('saveanswer')}}">
        @csrf
        <input type="hidden" name="user_id" value="{{$user_id}}">
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <textarea placeholder="answer post" name="answer"></textarea>
        <br>
        <input type="submit" value="answer">
        <br>
    </form>
<body>
