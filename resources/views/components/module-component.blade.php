<div class="box-header">
  <h3 class="box-title">Modules</h3>
</div>

<div class="box-body">
    <table class="table table-sm">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Name</th>
          <th>Descroption</th>
          <th>Project</th>
          <th>Task</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @if (count($modules) > 0 )
            @foreach ($modules as $key => $module)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $module->name }}</td>
                <td>{{ $module->description }}</td>
                <td>{{ $module->project->name }}</td>the k
                <td>
                  <a href="{{ route('task_edit', ['id' => $module->id]) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="{{ route('module_create', ['project_id' =>  $module->project_id,'task_id' => $module->id]) }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i>
                  </a>
                  <a href="{{ route('task_destroy', ['id' => $module->id]) }}" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
            @endforeach
        @else
            <tr style="text-align: center;">
                <td colspan="5" rowspan="" headers="">There are no data!</td>
            </tr>
        @endif
      </tbody>
    </table>
</div>