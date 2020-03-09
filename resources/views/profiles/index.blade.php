@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://instagram.fjed4-6.fna.fbcdn.net/v/t51.2885-19/s150x150/83213956_3360255157381124_5752385570823208960_n.jpg?_nc_ht=instagram.fjed4-6.fna.fbcdn.net&_nc_ohc=YTrFUZgSNJcAX-CoETL&oh=633eb9da1176b076a5b5415ec0d1aef2&oe=5E8CD1BA" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }} </h1>
                <a href="/p/create">Add New Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>23k</strong> followers</div>
                <div class="pr-5"><strong>212</strong> following</div>

            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }} </div>
            <div>{{ $user->profile->description }}.</div>
            <div><a href="#">{{ $user->profile->url ?? 'N/A' }}</a></div>
        </div>

    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
         <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
            <img src="/storage/{{ $post->image }}" class="w-100">
            </a>
        </div>
        @endforeach
       
    </div>
    
</div>
@endsection
