@extends('layouts.main')

@section('content')
	<div class="callout primary">
    <article class="grid-container">
      <div class="row column">
      	<a href="/gallery/show/{{$photo->gallery_id}}">Back To Gallery</a>
        <h1>{{$photo->title}}</h1>
        <p class="lead">{{$photo->description}}</p>
        <p>Location: {{$photo->location}}</p>
      </div>
    </article>
  </div>
  <div class="row small-up-2 medium-up-3 large-up-4">
  	<div class="main">
  		<img class="main-img" src="/images/$photo->image">
  		
  	</div>
  	
  </div>
@stop