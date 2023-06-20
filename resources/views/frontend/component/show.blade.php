@extends('layout')
@section('content')
<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"> {{ $component->name }}</h3>
      <a class="btn btn-info btn-xs" href="{{ route('temp_create', ['id' => $component->id]) }}"> <i class="fas fa-plus"></i> Template</a>
      <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Partial</a>
      <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Schema</a>
      <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Form Builder</a>
      <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Model</a>
      <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Util</a>
      <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Custom func</a>
      <a class="btn btn-info btn-xs" href="{{ route('action_edit', ['t_id' => $component->task_id, 'id' => $component->id]) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
    </div>
    <label>Path:</label> {{$component->path}}
    <br>
    <div class="card-tools">
      <div class="card-tools">
        <button type="button" class="btn btn-default btn-xs collapsed" data-toggle="collapse" data-target="#collapseTwoCode" aria-expanded="false" aria-controls="collapseTwoCode">
          Read coding
        </button>
        <a class="btn btn-info btn-xs" href="{{ route('componet_edit', ['t_id' => $component->task_id, 'id' => $component->id]) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
      </div>
    </div>
    <br>
    <div id="accordion">
      <div id="collapseTwoCode" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <label>Code:</label>
        <div class="box-body" style="background-color: black; color: white;">
          {!! $component->body !!}
        </div>
        <br>
      </div>
    </div>

    <label>Explanation:</label>
    <br>
    {!! $component->description !!}
    <br>
    @if (isset($component->template))
      @foreach ($component->template as $element)
        <div class="card-tools">
          <button type="button" class="btn btn-default btn-xs collapsed" data-toggle="collapse" data-target="#collapseTwoTemplate{{ $element->id }}" aria-expanded="false" aria-controls="collapseTwoTemplate{{ $element->id }}">
            Read coding template
          </button>
          <a class="btn btn-info btn-xs" href="{{ route('temp_edit', ['a_id' => $component->id, 'id' => $element->id]) }}"> <i class="fas fa-pencil-alt"></i> Edit</a>
          <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Partial</a>
          <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Util</a>
          <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Helper</a>
          <a class="btn btn-info btn-xs" href="#"> <i class="fas fa-plus"></i> Custom func</a>
        </div>
        <br>
        <div id="accordion{{ $element->id }}">
          <div id="collapseTwoTemplate{{ $element->id }}" class="collapse @if (isset($collapse))
           show
          @endif" aria-labelledby="headingTwo" data-parent="#accordion{{ $element->id }}">
            <label>Template:</label>{{  $element->name }}
            <br>
            <div class="box-body" style="background-color: black; color: white;">
              {!! $element->code !!}
            </div>
            <br>
          </div>
        </div>

        <label>Explanation: </label>
        <br>
        <div class="box-body" style="background-color: black; color: white;">
          {!! $element->description !!}
        </div>
      @endforeach
    @endif
  </div>
</section>
@endsection