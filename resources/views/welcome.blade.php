@extends('layout')

@section('title', 'Assignment: Filter')
@section('content')
<!-- Page Content  -->
<div class="col-md-8">
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">All</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Agencies</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Freelancers</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane container active" id="home" style="overflow-y: scroll;"><br>

      @foreach ($users as $user)
      <div class="card">
        <div class="card-body" style="display:flex;">
          <div style="flex:1; margin-right: 10px;"><img style="width: 100%" src="{{ asset('storage/face.jpg') }}" class="rounded-circle"></div>
          <div style="flex:2"><h5><b>Name</b></h5>
          <p>Description</p></div>
        </div>
        <div class="card-footer">
          <?php $skills = explode (", ", $user->skills); ?>
          @foreach ($skills as $skill)
          <span class="badge badge-pill badge-secondary">{{ $skill }}</span>&nbsp;
          @endforeach
        </div>
      </div><br>
      @endforeach


    </div>

    <div class="tab-pane container fade" id="menu1"><br>

      @foreach ($users as $user)
      @if ($user->type=='Agency')
      <div class="card">
        <div class="card-body" style="display:flex;">
          <div style="flex:1; margin-right: 10px;"><img style="width: 100%" src="{{ asset('storage/face.jpg') }}" class="rounded-circle"></div>
          <div style="flex:2"><h5><b>Name</b></h5>
          <p>Description</p></div>
        </div>
        <div class="card-footer">
          <?php $skills = explode (", ", $user->skills); ?>
          @foreach ($skills as $skill)
          <span class="badge badge-pill badge-secondary">{{ $skill }}</span>&nbsp;
          @endforeach
        </div>
      </div><br>
      @endif
      @endforeach

    </div>

    <div class="tab-pane container fade" id="menu2"><br>

      @foreach ($users as $user)
      @if ($user->type=='Freelancer')
      <div class="card">
        <div class="card-body" style="display:flex;">
          <div style="flex:1; margin-right: 10px;"><img style="width: 100%" src="{{ asset('storage/face.jpg') }}" class="rounded-circle"></div>
          <div style="flex:2"><h5><b>Name</b></h5>
          <p>Description</p></div>
        </div>
        <div class="card-footer">
          <?php $skills = explode (", ", $user->skills); ?>
          @foreach ($skills as $skill)
          <span class="badge badge-pill badge-secondary">{{ $skill }}</span>&nbsp;
          @endforeach
        </div>
      </div><br>
      @endif
      @endforeach

  </div>

</div>
</div>
@endsection
