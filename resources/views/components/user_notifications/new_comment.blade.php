<?php

?>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ $post->photos[0]->url }}" class="img-fluid rounded-start" alt="photo comment">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $post->user->details->display_name }} {{ __('added new comment') }}</h5>
        <p class="card-text">{{ $post->comments[0]->text }}</p>
        <p class="card-text"><small class="text-muted">{{ $date->format('H:i, d.m.Y') }}</small></p>
      </div>
    </div>
  </div>
</div>