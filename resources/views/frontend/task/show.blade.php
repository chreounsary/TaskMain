@extends('layout')
@section('content')
<section class="content">
  <div class="card">
    <div class="card-header">
      <a href="{{ route('project_show', ['id' => $task->project_id]) }}" title="">
      <button type="button" class="btn btn-default btn-sm collapsed">{{ $task->project->name }}</button>  <i class="fa fa-fw fa-angle-double-right"></i>
      </a>
      <button type="button" class="btn btn-default btn-sm collapsed">{{ $task->name }}</button> <i class="fa fa-fw fa-angle-double-right"></i>
      <button type="button" class="btn btn-default btn-sm collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Action
      </button>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    
    <div id="accordion">
      <div class="card">
        <div id="collapseTwo" class="collapse @if (isset($action)) show @else '' @endif" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            <form method="POST" action="@if (isset($action)) {{ route('action_update', ['id' => $action->id]) }} @else {{ route('action_store') }} @endif" enctype="multipart/form-data">
              @csrf
              @if (isset($action))  @method('PUT') @endif

              <div class="card-body">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="inputName">Name</label>
                  <input type="text" class="form-control" name="name" value="@if (isset($action)){{$action->name}}@endif" id="inputName" placeholder="Enter name">
                  <input type="hidden" name="task_id" value="@if (isset($action)) {{$action->task_id}} @else {{$task->id}} @endif">
                  @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
                <label for="inputName">Path</label>
                <input type="text" class="form-control" name="path" value="@if (isset($action)) {{ $action->path }} @endif" id="inputName" placeholder="File path">

                <div class="form-group">
                <label>Requirement</label>
                <textarea id="requirement" class="form-control summernote" rows="3" placeholder="Enter ..."  name="requirement">@if (isset($action)){{$action->requirement}}@endif</textarea>
                  @if ($errors->has('requirement'))
                    <span class="help-block">
                      <strong>{{ $errors->first('requirement') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                <label>Code</label>
                <textarea id="code" class="form-control summernote" rows="3" placeholder="Enter ..."  name="code">@if (isset($action)){{$action->body}}@endif</textarea>
                  @if ($errors->has('code'))
                    <span class="help-block">
                      <strong>{{ $errors->first('code') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                  <label>Explanation</label>
                  <textarea id="description" class="form-control summernote" rows="3" placeholder="Enter ..."  name="description">@if (isset($action)){{$action->description}}@endif</textarea>
                    @if ($errors->has('description'))
                      <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                @if (isset($action))
                <a href="{{ route('task_show', ['id' => $action->task_id]) }}" class="btn btn-default">Cancel</a>
                @endif
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
        <thead>
          <tr>
            <th style="width: 1%">
              #
            </th>
            <th style="width: 20%">
              Name
            </th>
           
            <th style="width: 70%" class="text-center">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($task->action as $key => $action)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $action->name }}</td>
              <td class="project-actions text-right">
                <a class="btn btn-primary btn-xs" href="{{ route('action_show', ['id' => $action->id]) }}"><i class="fas fa-eye"></i>View</a>
                <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Template</a>
                <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Partial</a>
                <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Schema</a>
                <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Form Builder</a>
                <a class="btn btn-info btn-xs" href="#"> <i c3lass="fas fa-plus"></i> Model</a>
                <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Util</a>
                <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Custom func</a>
                <a class="btn btn-info btn-xs" href="{{ route('action_edit', ['t_id' => $action->task_id, 'id' => $action->id]) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
                <a class="btn btn-danger btn-xs" href="#"><i class="fas fa-trash"></i>Delete</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-default btn-sm collapsed" data-toggle="collapse" data-target="#collapseComponent" aria-expanded="false" aria-controls="collapseComponent">
        Component
      </button>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    
    <div id="accordionComponent">
      <div class="card">
        <div id="collapseComponent" class="collapse @if (isset($component)) show @else  '' @endif" aria-labelledby="headingTwo" data-parent="#accordionComponent">
          <div class="card-body">
            <form method="POST" action="@if (isset($component)) {{ route('componet_update', ['id' => $component->id]) }} @else {{ route('componet_store') }} @endif" enctype="multipart/form-data">
              @csrf
              @if (isset($component)) @method('PUT') @endif

              <div class="card-body">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="inputName">Name</label>
                  <input type="text" class="form-control" name="name" value="@if (isset($component)){{$component->name}}@endif" id="inputName" placeholder="Enter name">
                  <input type="hidden" name="task_id" value="@if (isset($component)) {{$component->task_id}} @else {{$task->id}} @endif">

                  @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
                <label for="inputName">Path</label>
                <input type="text" class="form-control" name="path" value="@if (isset($component)) {{ $component->path }} @endif" id="inputName" placeholder="File path">
                <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                <label>Code</label>
                <textarea class="form-control summernote" rows="3" placeholder="Enter ..."  name="code">@if (isset($component)){{$component->body}}@endif</textarea>
                  @if ($errors->has('code'))
                    <span class="help-block">
                      <strong>{{ $errors->first('code') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                  <label>Explanation</label>
                  <textarea class="form-control summernote" rows="3" placeholder="Enter ..."  name="description">@if (isset($component)){{$component->description}}@endif</textarea>
                    @if ($errors->has('description'))
                      <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                @if (isset($component))
                <a href="{{ route('task_show', ['id' => $component->task_id]) }}" class="btn btn-default">Cancel</a>
                @endif
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
        <thead>
          <tr>
            <th style="width: 1%">
              #
            </th>
            <th style="width: 20%">
               Name
            </th>
            <th style="width: 70%" class="text-center">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @if (isset($task->components))
            @foreach ($task->components as $key => $component)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $component->name }}</td>
                <td class="project-actions text-right">
                  <a class="btn btn-primary btn-xs" href="{{ route('componet_show', ['id' => $component->id]) }}"><i class="fas fa-eye"></i>View</a>
                  <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Template</a>
                  <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Partial</a>
                  <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Schema</a>
                  <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Form Builder</a>
                  <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Model</a>
                  <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Util</a>
                  <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Custom func</a>
                  <a class="btn btn-info btn-xs" href="{{ route('componet_edit', ['t_id' => $component->task_id, 'id' => $component->id]) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
                  <a class="btn btn-danger btn-xs" href="#"><i class="fas fa-trash"></i>Delete</a>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection