@extends('layouts.website')
@section('content')

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2>Sudyalar</h2>
            </div>
        </div>
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
            {{ $users->links() }}
            {{-- <div class="col-md-12">
          <div class="custom-pagination">
            <span>1</span>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <span>...</span>
            <a href="#">15</a>
          </div>
        </div>
      </div> --}}
        </div>
    </div>
</div>
@endsection
