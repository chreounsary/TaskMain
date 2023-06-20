@extends('layout') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item active">Task</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Task</h3>
            </div>
            <form method="POST" action="{{ route('task_update', ['id' => $task->id]) }}">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="inputName">Project</label>
                  <select class="form-control select2 select2-hidden-accessible" name="project" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option selected="selected" data-select2-id="3">--Select--</option>
                    @foreach ($task->projects as $key => $project)
                      <option data-select2-id="39" value="{{$project->id}}" @if($task->project_id == $project->id) selected @endif>{{$project->name}}</option>
                    @endforeach
                  </select>
                  <label for="inputName">Name</label>
                  <input type="text" class="form-control" name="name" value="{{ $task->name }}" id="inputName" placeholder="Enter name">
                  @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                <label>Description</label>
                <textarea class="form-control" rows="3" placeholder="Enter ..."  name="description">{{ $task->description }}</textarea>
                  @if ($errors->has('description'))
                    <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section> @endsection