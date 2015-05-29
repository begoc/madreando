@extends('site')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<div class="post-heading">
				<h1>{{$article->title}}</h1>
			</div>
		</div>
	</div>
</div>
<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			@foreach($article->paragraphs as $paragraph)
				@if($paragraph->headline)
				<h2 class="section-heading">{!! $paragraph->headline !!}</h2>
				@endif
				<p>{!! $paragraph->content !!}</p>
			@endforeach
			<!-- Pager -->
		</div>
	</div>
</div>

<hr>
@endsection
