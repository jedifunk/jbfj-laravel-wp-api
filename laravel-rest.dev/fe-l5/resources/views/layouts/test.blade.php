@extends('layouts.default')
	
@section('content')
	
	<div class="l-row">
		<h1>Laravel WP-API Playground Testing Ground</h1>
	</div>
	
	<div class="l-row">
		
		@foreach($posts as $post)
			
			<section class="panel">
				<a href="#">
					<h3>{{ $post->title->rendered }}</h3>
					<img src="" />
				</a>
				@if( $post->format == 'audio' || $post->format == 'video' )
				
					<div class="panel-content has-embed">
					
				@else
				
					<div class="panel-content">
				
				@endif
					{!! $post->content->rendered !!}
					<a href="#" class="btn">Read More</a>
				</div>
			</section>
			
		@endforeach
		
	</div>
	
@stop