@extends('layout')
@section('content')
<section class="content">
  <div class="box">
    <br>
    <div class="box-header with-border">
      <a href="{{ route('project_show', ['id' => $actions->id]) }}" title="">
      <button type="button" class="btn btn-default btn-sm collapsed">{{ $actions->name }}</button>  <i class="fa fa-fw fa-angle-double-right"></i>
      </a>
      <button type="button" class="btn btn-default btn-sm collapsed">{{ $actions->name }}</button> <i class="fa fa-fw fa-angle-double-right"></i>
      <button type="button" class="btn btn-default btn-sm collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Action
      </button>
    </div>
    <br>
      @if (isset($actions->requirement)) 
       <label>Requirement:</label>
       <br>
       {!! $actions->requirement !!}
       <br>
      @endif
      <h3 class="box-title"> {{ $actions->name }}</h3>
      <a class="btn btn-info btn-xs" href="{{ route('temp_create', ['id' => $actions->id]) }}"> <i class="fas fa-plus"></i> Template</a>
      @if (isset($actions->schema) == '')
        <a class="btn btn-info btn-xs" href="{{ route('schema_create', ['task_id' => $actions->task_id, 'action_id' => $actions->id]) }}"> <i class="fas fa-plus"></i> Schema</a>
      @endif
      <a class="btn btn-info btn-xs" href="{{ route('form_create', ['task_id' => $actions->task_id, 'action_id' => $actions->id]) }}"> <i class="fas fa-plus"></i> Form Builder</a>
      <a class="btn btn-info btn-xs" href="{{ route('model_create', ['project_id' => $actions->getProject($actions->task_id), 'task_id' => $actions->task_id, 'action_id' => $actions->id]) }}"> <i class="fas fa-plus"></i> Model</a>
      <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Util</a>
      <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Custom func</a>
      <a class="btn btn-info btn-xs" href="{{ route('action_edit', ['t_id' => $actions->task_id, 'id' => $actions->id]) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
    </div>
    
    @if (isset($actions->formBuilder))
      <label>Name:</label> {{$actions->formBuilder->name}}
      <br>
      <label>Path:</label> {{$actions->formBuilder->path}}
      <br>
      <div class="card-tools">
        <div class="card-tools">
          <button type="button" class="btn btn-default btn-xs collapsed" data-toggle="collapse" data-target="#collapseSchema" aria-expanded="false" aria-controls="collapseSchema">
            Read Form Builder
          </button>
          <a class="btn btn-info btn-xs" href="{{ route('form_edit', ['id' => $actions->formBuilder]) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
          {{-- <a class="btn btn-danger btn-xs" href="{{ route('schema_destroy', ['id' => $actions->schema->id, 'action_id' => $actions->id]) }}"> <i class="fas fa-trash"></i> Delete</a> --}}
        </div>
      </div>
      <br>
      <div id="accordionSchema">
        <div id="collapseSchema" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSchema">
          <div class="box-body" style="background-color: black; color: white;">
            {!! $actions->formBuilder->code !!}
          </div>
          <br>
        </div>
      </div>

      @if ($actions->formBuilder->description != '')
        <label>Explanation:</label>
        <div class="box-body" style="background-color: black; color: white;">
          {!! $actions->formBuilder->description !!}
        </div>
        <br>
      @endif
    @endif

    @if (isset($actions->schema->path))
      <label>Schema:</label> {{$actions->schema->path}}
      <br>
      <div class="card-tools">
        <div class="card-tools">
          <button type="button" class="btn btn-default btn-xs collapsed" data-toggle="collapse" data-target="#collapseSchema" aria-expanded="false" aria-controls="collapseSchema">
            Read Schema
          </button>
          <a class="btn btn-info btn-xs" href="{{ route('schema_edit', ['id' => $actions->schema->id]) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
          <a class="btn btn-danger btn-xs" href="{{ route('schema_destroy', ['id' => $actions->schema->id, 'action_id' => $actions->id]) }}"> <i class="fas fa-trash"></i> Delete</a>
        </div>
      </div>
      <br>
      <div id="accordionSchema">
        <div id="collapseSchema" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSchema">
          <div class="box-body" style="background-color: black; color: white;">
            {!! $actions->schema->code !!}
          </div>
          <br>
        </div>
      </div>
    @endif

    <label>Path:</label> {{$actions->path}}
    <br>
    <div class="card-tools">
      <div class="card-tools">
        <button type="button" class="btn btn-default btn-xs collapsed" data-toggle="collapse" data-target="#collapseTwoCode" aria-expanded="false" aria-controls="collapseTwoCode">
          Read Action
        </button>
        <a class="btn btn-info btn-xs" href="{{ route('action_edit', ['t_id' => $actions->task_id, 'id' => $actions->id]) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
      </div>
    </div>
    <br>
    <div id="accordion">
      <div id="collapseTwoCode" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="box-body" style="background-color: black; color: white;">
          {!! $actions->body !!}
        </div>
        <br>
      </div>
    </div>
    @if ($actions->description)
    <label>Explanation:</label>
    <br>
    {!! $actions->description !!}
    <br>
    @endif

    @if (isset($actions->models))
      <label>Model:</label> {{ $actions->models->name }}
      <br>
     {!! $actions->models->code !!}
     <br>
    @endif

    @if (isset($actions->template))
      @foreach ($actions->template as $template)
        <div class="card-tools">
          <button type="button" class="btn btn-default btn-xs collapsed" data-toggle="collapse" data-target="#collapseTwoTemplate{{ $template->id }}" aria-expanded="false" aria-controls="collapseTwoTemplate{{ $template->id }}">
            Read Template
          </button>
          <a class="btn btn-info btn-xs" href="{{ route('temp_edit', ['a_id' => $actions->id, 'id' => $template->id]) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
          <a class="btn btn-info btn-xs" href="{{ route('partial_create', ['temp_id' => $template->id, 'a_id' => $actions->id]) }}"> <i class="fas fa-plus"></i> Partial</a>
          <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Util</a>
          <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Helper</a>
          <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Custom func</a>
        </div>
        <br>
        <div id="accordion{{ $template->id }}">
          <div id="collapseTwoTemplate{{ $template->id }}" class="collapse @if (isset($collapse))
           show
          @endif" aria-labelledby="headingTwo" data-parent="#accordion{{ $template->id }}">
            <label>Template:</label>{{  $template->name }}
            <br>
            <div class="box-body" style="background-color: black; color: white;">
              {!! $template->code !!}
            </div>
            <br>
          </div>
        </div>

        <label>Explanation: </label>
        <br>
        <div class="box-body">
          {!! $template->description !!}
        </div>
        @foreach ($template->getPartials($template->id) as $partial)
          <br>
          <div class="card-tools">
            <div class="card-tools">
              <button type="button" class="btn btn-default btn-xs collapsed" data-toggle="collapse" data-target="#collapseTwoCode{{ $partial->id }}" aria-expanded="false" aria-controls="collapseTwoCode{{ $partial->id }}">
                Read Partial
              </button>
              <a class="btn btn-info btn-xs" href="{{ route('partial_edit', ['t_id' => $actions->task_id, 'id' => $actions->id]) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
            </div>
          </div>
          <br>
          <div id="accordion{{ $partial->id }}">
            <div id="collapseTwoCode{{ $partial->id }}" class="collapse @if (isset($collapse))
             show
            @endif" aria-labelledby="headingTwo" data-parent="#accordion{{ $partial->id }}">
              <label>Partial: </label> {{ $partial->path }}
              <br>
              <div class="box-body">
                {!! $partial->code !!}
              </div>
              @if ($partial->description)
                <label>Explanation: </label>
                <br>
                <div class="box-body">
                  {!! $partial->description !!}
                </div>
               @endif
            </div>
          </div>
        @endforeach
      @endforeach
    @endif
  </div>
</section>
@endsection