@extends('layout')
@section('content')
<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"> {{ $mail->name }}</h3>
    </div>
    <br>
    <label>Code:</label>
    {!! $mail->code !!}
    <label>Explanation:</label>
    <br>
    {!! $mail->description !!}
    <br>
  </div>
</section>
@endsection