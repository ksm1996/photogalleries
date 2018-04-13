@extends('layouts.main')

@section('content')
	<div class="callout primary">
    <article class="grid-container">
      <div class="row column">
        <h1>Create Gallery</h1>
        <p class="lead">Create a gallery and start uploading.</p>
      </div>
    </article>
  </div>
  <div class="grid-x grid-margin-x small-up-2 medium-up-3 large-up-4">

    <div class="main">
    <div class="row small-up-to-2 medium-up-to-3 large-up-to-4">
    <div class="main">

    <form action="{{ route('gallery.store')}}" enctype="multipart/form-data" method="POST">
      {{csrf_field()}}
      
      <div class="form-group">
      <label type="name">Name</label>
      <input type="text" name="name" class="form-control" placeholder="Name">
      </div>
      <div class="form-group">
      <label type="description">Description</label>
      <input type="text" name="description" class="form-control" placeholder="Description">
      </div>
      <div class="form-group">
      <label type="cover_image">Cover Image</label>
      <input type="file" name="cover_image" class="form-control" placeholder="Cover Image">
      </div>
      

      <input type="submit" name="submit" class="button button-submit">
    </form>
    </div>    
    </div>
    </div>
    

@stop