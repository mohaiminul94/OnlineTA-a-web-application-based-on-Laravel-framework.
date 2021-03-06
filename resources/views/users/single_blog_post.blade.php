@extends('users.layouts')

@section('content')


  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-12">

        <!-- Title -->
        <div class="post-Title">
          <!-- <h1 class="mt-4">Post Title</h1>   -->
        </div>
        
        
        <!-- Author -->
        <p class="lead" style="margin-top:15px;">
          Posted by
          <a href="#">{{ $singleBlog->full_name }}</a>
        </p>
        

        <!-- Date/Time -->
        <p>{{ date('d/m/Y', strtotime($singleBlog->created_at)) }}</p>

        <hr>

        <!-- Preview Image -->
        <!-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt=""> -->

        <hr>

        <!-- Post Content -->
        <p>
          {{ $singleBlog->post }}
        </p>

        <hr>


        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">

            <form action="{{ route('post-comment') }}" method="post">
            @csrf
              <div class="form-group">
                <textarea name="comment" class="form-control" rows="3"></textarea>
              </div>
              <input type="hidden" name="user_id" value="{{ Sentinel::getUser()->id }}">
              <input type="hidden" name="full_name" value="{{ Sentinel::getUser()->full_name }}">
              <input type="hidden" name="post_id" value="{{ $singleBlog->id }}">
              <button type="submit" class="btn btn-primary">Comment Now</button>
            </form>

          </div>
        </div>

@if($comments->count() == 0)

    <p>No comments to show</p>
@else

        @foreach($comments as $comment)
            <!-- Single Comment -->
            <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="{{ asset('/uploads/images').'/'.$comment->photo }}">
            <div class="media-body">
              <h5 class="mt-0">{{ $comment->full_name }}</h5>
              {{ $comment->comment }}
              <hr>
              <p style="font-size:12px; margin:0; padding:0;">
              {{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
              </p>
            </div>
          </div>
    @endforeach  
@endif

        

        

      </div>

      <!-- Sidebar Widgets Column -->



      <!-- Sidebar Widgets Column -->
      

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


@endsection