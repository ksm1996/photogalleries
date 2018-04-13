@extends('layouts.main')

@section('content')
	<div class="callout primary">
    <article class="grid-container">
      <div class="row column">
        <h1>Upload Photo</h1>
        <p class="lead">Upload a photo to the gallery.</p>
      </div>
    </article>
  </div>
  <div class="grid-x grid-margin-x small-up-2 medium-up-3 large-up-4">

    <div class="main">
    <div class="row small-up-to-2 medium-up-to-3 large-up-to-4">
    <div class="main">

    <form action="{{ route('photo.store')}}" enctype="multipart/form-data" method="POST">
      {{csrf_field()}}
      
      <div class="form-group">
      <label type="title">Title</label>
      <input type="text" name="title" class="form-control" placeholder="Title">
      </div>
      <div class="form-group">
      <label type="description">Description</label>
      <input type="text" name="description" class="form-control" placeholder="Description">
      </div>
      <div class="form-group">
      <label type="location">Location</label>
      <input type="text" name="location" class="form-control" placeholder="location">
      </div>
      <div class="form-group">
      <label type="image">Photo</label>
      <input type="file" name="image" class="form-control" placeholder="Photo">
      </div>
      <input type="hidden"  name="gallery_id" value="{{$gallery_id}}">

      <input type="submit" name="submit" class="button button-submit">
    </form>
    </div>    
    </div>
    </div>
    

@stop