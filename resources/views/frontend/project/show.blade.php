@extends('layout')
@section('content')
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"> @if (isset($project->name))
        {{ $project->name }}
        <a href="{{ route('task_create', ['project_id' => $project->id]) }}" class="btn btn-success btn-sm">
          <i class="fas fa-plus box-title"> Task</i>
        </a>
      @endif
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
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
              Task
            </th style="width: 70%" class="text-center">
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($project->tasks as $key => $task)
            <tr>
              <td>{{ $key +1 }}</td>
              <td>{{ $task->name }}</td>
              <td class="project-actions">
              <a class="btn btn-primary btn-xs" href="{{ route('task_show', ['id' => $task->id]) }}"><i class="fas fa-eye"></i>View</a>
              {{--   <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Template</a>
                <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Partial</a>
                <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Form Builder</a>
                <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Model</a>
                <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Util</a>
                <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Custom func</a> --}}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection

@section('script')
  <script type="text/javascript">
    $('#code, #description').summernote();
  </script>
@endsection