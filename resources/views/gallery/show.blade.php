@extends('layouts.main')

@section('content')
	<div class="callout primary">
    <article class="grid-container">
      <div class="">
        <a href="/">Back To Galleries</a>
        <h1>{{ $gallery->name }}</h1>
        <p class="lead">{{ $gallery->description }}</p>
        <?php if(Auth::check()) :?>
        <a class="button button-upload" href="/photo/create/{{$gallery->id}}">Upload Photo</a>
        <?php endif; ?>
      </div>
    </article>
  </div>
  <div class="row small-up-2 medium-up-3 large-up-4">
    <?php foreach ($photos as $photo) : ?>
      <div class="column">
        <a href="/photo/details/{{$photo->id}}"> 
          <img class="thumbnail" src="/images/{{$photo->image}}">      
        </a>
        <h5>{{$photo->title}}</h5>
        <p>{{$photo->description}}</p> 
        <p>Location: {{$photo->location}}</p>  
      </div>
    
  <?php endforeach; ?>
    
  </div>

@stop
