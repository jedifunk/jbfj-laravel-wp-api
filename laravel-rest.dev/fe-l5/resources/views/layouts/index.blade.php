@extends('layouts.default')
	
@section('content')
	
	<div class="flex-container">
		
		@foreach($posts as $post)
		
		<div class="flex-item">

			<div class="flex-panel">
				
				<h3><a href="#">{{ $post->title->rendered }}</a></h3>
				
				<div class="panel-meta">
				
					<?php 
						
						// TODO: Clean up and move out of layout
						$date = strtotime($post->date);
						$new_date = date('F j, Y, g:i a', $date);
					?>
					{!! $new_date !!}
					
				</div>
				
				<div class="panel-content">
					
					{!! $post->content->rendered !!}
					
				</div>
				<a href="#" class="btn flex-btn">Read More</a>
			</div>
			
		</div>
			
		@endforeach
		
	</div>
	
@stop