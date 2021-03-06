@extends('users.layouts')

@section('content')


<script>
  
  $(document).ready(function() {
      $('#library').DataTable();
    });

</script>


<!-- LIBRARY SECTION STARTS HERE -->


<section class="libraryArea">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="libraryAreaContent">
          <h1>Welcome To Online Library</h1>

          <table class="table table-striped display" id="library">
          <thead>
        <tr>
          <th scope="col">Book Title</th>
          <th scope="col">Course Code</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach($viewBooks as $viewBook)

        <tr>
          <td>{{ $viewBook->book_title }}</td>
          <td>{{ $viewBook->course_code }}</td>
          <td>
            <a href="{{ asset('/uploads/library').'/'.$viewBook->file }}">
                <button class="btn btn-primary">Download</button>
            </a>
          </td>
        </tr>


        @endforeach

        
      </tbody>
          </table>



  </div>
</section>






<!-- LIBRARY SECTION ENDS HERE -->


@endsection