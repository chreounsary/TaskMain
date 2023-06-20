@extends('layout') 
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Yaml 

             <a href="{{ route('yamls.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus">New</i>
              </a></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item active">Yaml Tables</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Yaml</h3>
          </div>
          <div class="card-body p-0">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 @foreach ($yamls as $key => $yaml)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $yaml->name }}</td>
                    <td>
                      <a href="{{ route('yamls.edit', ['yaml' => $yaml->id]) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="{{ route('task_destroy', ['id' => $yaml->id]) }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                      </a>
                      <a href="{{ route('yamls.show', ['yaml' => $yaml->id]) }}" class="btn btn-success btn-sm">
                        <i class="fas fa-eye"></i>
                      </a>
                    </td>
                  </tr>
                 @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection