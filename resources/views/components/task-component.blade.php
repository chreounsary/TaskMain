<div class="box-header">
  <h3 class="box-title">Task</h3>
</div>

<div class="box-body">
    <table class="table table-sm">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Name</th>
          <th>Descroption</th>
          <th>Project</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @if (count($tasks) > 0 )
            @foreach ($tasks as $key => $task)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ Str::limit($task->description, $limit = 20, $end = '...') }}</td>
                <td>{{ $task->project->name }}</td>
                <td>
                  <a href="{{ route('task_edit', ['id' => $task->id]) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="{{ route('task_destroy', ['id' => $task->id]) }}" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                  </a>
                  <a href="{{ route('task_show', ['id' => $task->id]) }}" class="btn btn-info btn-sm">
                    <i class="fas fa-eye"></i>
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