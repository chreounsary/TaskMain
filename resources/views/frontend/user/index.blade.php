@extends('layout')
  
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body pb-0">
        <div class="row">
            @foreach($data as $index => $item)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        {{$item->role}}
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                        <div class="col-7">
                            <h2 class="lead"><b>{{$item->username}}</b></h2>
                            <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$item->phone}}</li>
                            </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                        <a href="{{ route('member_search_show', $item->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-user"></i> View
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-users"></i> 19
                        </a>
                        <a href="{{ route('friend_requestCreate', $item->id)}}" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i> Add
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-share"></i> Share
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
          <ul class="pagination justify-content-center m-0">
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item"><a class="page-link" href="#">6</a></li>
            <li class="page-item"><a class="page-link" href="#">7</a></li>
            <li class="page-item"><a class="page-link" href="#">8</a></li>
          </ul>
        </nav>
      </div>
      <!-- /.card-footer -->
    </div>
</section>
@endsection