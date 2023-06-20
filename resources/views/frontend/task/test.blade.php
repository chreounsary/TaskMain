@extends('layout') 
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tasks</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item active">Tasks Tables</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tasks</h3>
          </div>
          <div class="card-body p-0">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Project</th>
                  <th>Name</th>
                  <th>Descroption</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 @foreach ($tasks as $key => $task)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $task->project->name }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                      <a href="{{ route('task_edit', ['id' => $task->id]) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="{{ route('task_destroy', ['id' => $task->id]) }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                      </a>
                      <a href="{{ route('task_destroy', ['id' => $task->id]) }}" class="btn btn-success btn-sm">
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
