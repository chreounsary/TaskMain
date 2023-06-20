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
          <li class="breadcrumb-item active">Form Builder</li>
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
              <h3 class="card-title">Form Builder</h3>
            </div>
            <form method="POST" action="{{ route('form_store') }}">
              @csrf
              <input type="hidden" name="task_id" value="{{ $task_id }}">
              <input type="hidden" name="action_id" value="{{ $action_id }}">
              <div class="card-body">

                <div class="form-group">
                  <label for="inputName">Name</label>
                  <input type="text" class="form-control" name="name" value="" id="inputName" placeholder="Enter name">
                  @if ($errors->has('path'))
                    <span class="help-block">
                      <strong>{{ $errors->first('path') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="inputPath">Path</label>
                  <input type="text" class="form-control" name="path" value="{{ old('path') }}" id="inputPath" placeholder="Enter path">
                  @if ($errors->has('path'))
                    <span class="help-block">
                      <strong>{{ $errors->first('path') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                <label>Code</label>
                <textarea class="form-control" id="code" rows="3" placeholder="Enter ..."  name="code">{{ old('code') }}</textarea>
                  @if ($errors->has('code'))
                    <span class="help-block">
                      <strong>{{ $errors->first('code') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                <label>Description</label>
                <textarea class="form-control" id="description" rows="3" placeholder="Enter ..."  name="description">{{ old('description') }}</textarea>
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

  @section('script')
  <script type="text/javascript">
    $('#code, #description').summernote();
  </script>
@endsection