@extends('layout') 
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Mail
          <a href="{{ route('mail_create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus">New</i>
          </a>
        </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item active">Mail Tables</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Mail</h3>
          </div>
          <div class="card-body p-0">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Descroption</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 @foreach ($mails as $key => $mail)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $mail->name }}</td>
                    <td>{{ $mail->description }}</td>
                     <td>
                      <a href="{{ route('mail_edit', ['id' => $mail->id]) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="{{ route('mail_destroy', ['id' => $mail->id]) }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                      </a>
                      <a href="{{ route('mail_show', ['id' => $mail->id]) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
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
@endsection