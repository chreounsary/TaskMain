<div class="box-header">
  <h3 class="box-title">
    <a href="{{ route('project_create') }}" class="btn btn-success btn-sm">
      <i class="fas fa-plus box-title"> Project</i>
    </a>
  </h3>
</div>

<div class="box-body">
    <table class="table table-sm">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Name</th>
          <th>Descroption</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($projects as $key => $project)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->description }}</td>
            <td>
              <a href="{{ route('project_edit', ['id' => $project->id]) }}" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i>
              </a>
              <a href="{{ route('project_destroy', ['id' => $project->id]) }}" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>
              </a>
              <a href="{{ route('task_create', ['project_id' => $project->id]) }}" class="btn btn-danger btn-sm">
                <i class="fas fa-plus"></i>
              </a>
              <a href="{{ route('project_show', ['id' => $project->id]) }}" class="btn btn-info btn-sm">
                <i class="fas fa-eye"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>