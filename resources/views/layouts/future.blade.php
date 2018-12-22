<!DOCTYPE HTML>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    	<meta name="description" content="@yield('meta_description')">
    	<meta name="keywords" content="@yield('meta_keywords')">
    	<title>Inspiring Class Room - @yield('title')</title>
		
		<link rel="stylesheet" href="{{asset('future-imperfect/assets/css/main.css')}}" />
		@yield('css')
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="{{URL('/')}}">Inspiring Class Room</a></h1>
						<nav class="links">
							<!--category-->
							<?php $category = App\Models\Category::about()->get(); ?>
							<ul>
								@foreach($category as $key=>$val)
									<li><a href="{{URL('/category/'.$val->name)}}">{{$val->name}}</a></li>
								@endforeach
								
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search">
									<a class="fa-search" href="#search">Search</a>
									<form id="search" method="get" action="#">
										<input type="text" name="query" placeholder="Search" />
									</form>
								</li>
								{{-- <li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li> --}}
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
							<section>
								<form class="search" method="get" action="#">
									<input type="text" name="query" placeholder="Search" />
								</form>
							</section>

						<!-- Links -->
							

						<!-- Actions -->

					</section>

				<!-- Main -->
					<div id="main">
						@yield('article')
						<!-- Post -->
							{{-- <article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Magna sed adipiscing (Title)</a></h2>
										<p>Lorem ipsum dolor amet nullam consequat etiam feugiat (Simple Description)</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01">1 Hours Ago</time>
										<a href="#" class="author"><span class="name">Niken Purwani</span><img src="{{asset('future-imperfect/images/avatar.jpg')}}" alt="" /></a>
									</div>
								</header>
								<a href="#" class="image featured"><img src="{{asset('future-imperfect/images/class.jpg')}}" alt="" /></a>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
								<footer>
									<ul class="actions">
										<li><a href="#" class="button big">Continue Reading</a></li>
									</ul>
									<ul class="stats">
										<li><a href="#">Category 1</a></li>
									</ul>
								</footer>
							</article>

						
							<ul class="actions pagination">
								<li><a href="" class="disabled button big previous">Previous Page</a></li>
								<li><a href="#" class="button big next">Next Page</a></li>
							</ul> --}}

					</div>

				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<article class="mini-post">
									<a href="{{URL('/')}}" class="image"><img src="{{asset('future-imperfect/images/logo.jpg')}}" alt="" /></a>
								{{-- <img src="{{asset('future-imperfect/images/logo.jpg')}}" /> --}}
										
								</article>
							</section>
						<!-- late post -->
						<!-- Mini Posts -->

							<section>
								<h3>Late Post</h3>
								<div class="mini-posts">
									
									<!-- Mini Post -->
										<?php $post = App\Models\Post::latest()->published()->take(3)->get(); ?>
										@forelse ($post as $key=>$val)
											<article class="mini-post">
												<header>
													<h3><a href='{{ url("/post/{$val->slug}") }}'>{{$val->title}}</a></h3>
													<time class="published">{{$val->created_at->diffForHumans()}}</time>
													{{-- <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a> --}}
												</header>
												<a href="#" class="image"><img src="{{asset('/storage/'.$val->image)}}" alt="" /></a>
											</article>
										@empty
											<article class="mini-post">
												<header>
													<h3><a href='{{ url("/") }}'>Article tidak ditemukan</a></h3>
													{{-- <time class="published">{{$val->created_at->diffForHumans()}}</time> --}}
													{{-- <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a> --}}
												</header>
												<a href="#" class="image"><img src="{{asset('future-imperfect/images/class.jpg')}}" alt="" /></a>
											</article>
										@endforelse
										
								</div>
							</section>
						
						<!-- list all post -->
						<!-- Posts List -->
							<section>
								<h3>List Post</h3>
								<ul class="posts">
									<?php $list_post = App\Models\Post::latest()->published()->take(10)->get(); ?>
									@forelse ($list_post as $key=>$val)
									<li>
										<article>
											<header>
												<h3><a href='{{ url("/post/{$val->slug}") }}'>{{$val->title}}</a></h3>
												<time class="published">{{$val->created_at->diffForHumans()}}</time>
											</header>
											<a href="#" class="image"><img src="{{asset('/storage/'.$val->image)}}" /></a>
										</article>
									</li>
									@empty
									<li>
										<article>
											<header>
												<h3><a href='{{ url("/") }}'>Article tidak ditemukan</h3>
												<time class="published" datetime="2015-10-20">3 hours ago</time>
											</header>
											<a href="#" class="image"><img src="{{asset('future-imperfect/images/class.jpg')}}" alt="" /></a>
										</article>
									</li>
									@endforelse
								</ul>
							</section>

						<!-- About -->
							<section class="blurb">
								<?php $post = App\Models\Post::whereHas('category', function($query){
									$query->where('name','about_me');
								})->first(); ?>
								<h2>{{$post->title}}</h2>
								<p>{!!ucwords(str_limit($post->body,50))!!}</p>
								<ul class="actions">
									<li><a href="{{URL('/aboutme')}}" class="button">Learn More</a></li>
								</ul>
							</section>

						<!-- Footer -->
							<section id="footer">
								<ul class="icons">
									{{-- <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li> --}}
									<li><a href="https://www.facebook.com/niken.purwani" class="fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="https://www.instagram.com/nikenpurwani/" class="fa-instagram"><span class="label">Instagram</span></a></li>
									{{-- <li><a href="https://www.wattpad.com/user/purwaniken" class="fa fa-watt-pad"><span class="label">Wattpad</span></a></li> --}}
									{{-- <li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li> --}}
								</ul>
								<p class="copyright">&copy; 2018 <a href ="#">nikenpurwani.com </a>. Powered By : <a href="https://sharehubid.com">SHAREHUB ID</a></p>
							</section>

					</section>

			</div>

		<!-- Scripts -->
			<script src="{{asset('future-imperfect/assets/js/jquery.min.js')}}"></script>
			<script src="{{asset('future-imperfect/assets/js/skel.min.js')}}"></script>
			<script src="{{asset('future-imperfect/assets/js/util.js')}}"></script>
			<script src="{{asset('future-imperfect/assets/js/main.js')}}"></script>

	</body>
</html>