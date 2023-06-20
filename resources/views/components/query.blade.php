<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Projects</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item active">Projects Tables</li>
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
            <h3 class="card-title">Projects</h3>
          </div>
          <div class="card-body p-0">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Descroption</th>
                  <th>Task</th>
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
                      @foreach($project->tasks as $task)
                        <p>{{$task->name}}</p>
                      @endforeach
                    </td>
                    <td>
                      <a href="{{ route('project_edit', ['id' => $project->id]) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="{{ route('project_create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i>
                      </a>
                      <a href="{{ route('project_destroy', ['id' => $project->id]) }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                      </a>
                      <a href="{{ route('task_create', ['project_id' => $project->id]) }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-plus"></i>
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