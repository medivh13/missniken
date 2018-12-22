@extends('layouts.future')
@section('title')
{{'Stories'}}
@endsection
@section('meta_description')
{{'Tutorial Laravel dan Android Studio'}}
@endsection
@section('meta_keywords')
{{'Inspiring Class Room, Inspiring Stories, Class Room, Teacher'}}
@endsection
@section('article')
	@forelse ($post as $key=>$val)
	<article class="post">
		<header>
			<div class="title">
				<h2><a href='{{ url("/post/{$val->slug}") }}'>{{$val->title}}</a></h2>
				<p>{{$val->excerpt}}</p>
			</div>
			<div class="meta">
				<time class="published">{{$val->created_at->diffForHumans()}}</time>
				{{-- <a href="#" class="author"><span class="name">Niken Purwani</span><img src="{{asset('future-imperfect/images/avatar.jpg')}}" alt="" /></a> --}}
			</div>
		</header>
		<a href="#" class="image featured"><img src="{{asset('/storage/'.$val->image)}}" alt="" /></a>
		<p>{!!str_limit($val->body,500)!!}</p> 
		<footer>
			<ul class="actions">
				<li><a href='{{ url("/post/{$val->slug}") }}' class="button big">Continue Reading</a></li>
			</ul>
			<ul class="stats">
				<li><a href="#">{{$val->category->name}}</a></li>
			</ul>
		</footer>
	</article>
	@empty
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
	@endforelse
	@if($post)
		<ul class="actions pagination">
			{{$post->appends(['search' => request()->get('search')])->links()}}
		</ul>
	@endif
@endsection 
