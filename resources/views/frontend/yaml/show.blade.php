@extends('layout')
@section('content')
<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"> {{ $yaml->name }}</h3>
      {{-- <a class="btn btn-info btn-xs" href="{{ route('action_edit', ['t_id' => $yaml->task_id, 'id' => $yaml->id]) }}"> <i class="fas fa-pencil-alt"></i> Edit</a> --}}
    </div>
    <label>Path:</label> {{$yaml->path}}
    <br>
    <label>Code:</label>
    {!! $yaml->code !!}
    <label>Explanation:</label>
    <br>
    {!! $yaml->description !!}
    <br>
  </div>
</section>
@endsection