@extends('layouts.website')
@section('content')
    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Lavozim</span>
            <h3>{{ $position->name }}</h3>
            @if($position->description)
              <p>{{ $position->description }}</p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-white">
      <div class="container">
        <div class="row">
            @foreach($users as $post)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <div class="excerpt">
                        <span class="post-category text-white bg-secondary mb-3">{{ $post->position->name }}</span>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left"><img
                                    src="@if($post->image) {{ $post->image }} @else {{ asset('website/images/user.png') }} @endif"
                                    alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1"><a href="#">{{ $post->name }}</a></span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d, Y') }} </span>
                            <br>
                            <span class="d-inline-block mt-1"><a href="#">{{ $post->email }}</a></span>
                        </div>
                        <p> {{ Str::limit($post->description, 150) }} </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>        
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
             {{ $users->links() }}
          </div>
      </div>
    </div>
    </div>
@endsection
    
