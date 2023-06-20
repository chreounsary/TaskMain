<ul class="nav nav-treeview">
    @foreach ($projects as $key => $project)
      <li class="nav-item">
        <a href="{{ route('project_show', ['id' => $project->id]) }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>{{ $project->name }}</p>
        </a>
      </li>
    @endforeach
</ul>