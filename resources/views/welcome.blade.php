@extends('site')

@section('content')
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/home-bg.jpg'); height: 500px">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			</div>
		</div>
	</div>
</header>
<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			@foreach($articles as $article)
				<div class="post-preview">
					<a href="{{strtolower(urlencode($article->section->name))}}/{{$article->metadata->uri}}">
						<h2 class="post-title">
							{{$article->title}}
						</h2>
						<h3 class="post-subtitle">
							{{$article->paragraphs->get(0)->content}}
						</h3>
					</a>
					<p class="post-meta">Posted by <a href="#">{{$article->createdBy->name}}</a> on {{$article->published_at->format('F jS, Y')}}</p>
				</div>
				<hr>
			@endforeach
			<!-- Pager -->
			<ul class="pager">
				<li class="next">
					<a href="#">Más Reflexiones &rarr;</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<hr>
@endsection
