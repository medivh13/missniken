@extends('layouts.future')
@section('title')
{{$post->title}}
@endsection
@section('meta_description')
{{$post->meta_description}}
@endsection
@section('meta_keywords')
{{$post->meta_keywords}}
@endsection
@section('article')
@if($post->title)
	<article class="post">
		<header>
			<div class="title">
				<h2>>{{$post->title}}</h2>
				<p>{{$post->excerpt}}</p>
			</div>
			<div class="meta">
				<time class="published">{{$post->updated_at->diffForHumans()}}</time>
				{{-- <a href="#" class="author"><span class="name">Niken Purwani</span><img src="{{asset('future-imperfect/images/avatar.jpg')}}" alt="" /></a> --}}
			</div>
		</header>
		<a href="#" class="image featured"><img src="{{asset('/storage/'.$post->image)}}" alt="" /></a>
		<p>{!!$post->body!!}</p>
		<footer>
			{{-- <ul class="actions">
				<li><a href='{{ url("/post/{$post->slug}") }}' class="button big">Continue Reading</a></li>
			</ul> --}}
			{{-- <ul class="stats">
				<li><a href="#">{{$post->category->name}}</a></li>
			</ul> --}}
		</footer>
	</article>
@else
	<article class="post">
		<header>
			<div class="title">
				<h2>Article Tidak Ditemukan</h2>
				{{-- <p>{{$val->excerpt}}</p> --}}
			</div>
			<div class="meta">
				{{-- <time class="published">{{$val->created_at->diffForHumans()}}</time> --}}
				{{-- <a href="#" class="author"><span class="name">Niken Purwani</span><img src="{{asset('future-imperfect/images/avatar.jpg')}}" alt="" /></a> --}}
			</div>
		</header>
		<a href="{{URL('/')}}" class="image featured"><img src="{{asset('future-imperfect/images/class.jpg')}}" alt="" /></a>
		<p>Dengan segala keterbatasan waktu yang ada, saya tetap berusaha untuk sesering mungkin melakukan update. Anda juga dapat melakukan request article melalui kontak  email saya. Terimakasih</p>
		<footer>
			{{-- <ul class="actions">
				<li><a href='{{ url("/post/{$val->slug}") }}' class="button big">Continue Reading</a></li>
			</ul>
			<ul class="stats">
				<li><a href="#">{{$val->category->name}}</a></li>
			</ul> --}}
		</footer>
	</article>
@endif
@endsection