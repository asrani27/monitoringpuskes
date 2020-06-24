@extends('layouts.master')

@section('content')
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Dashboard</span>
      <h3 class="page-title">Profile</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-4">
      <div class="card card-small mb-4 pt-3">
        <div class="card-header border-bottom text-center">
          <div class="mb-3 mx-auto">
            <img class="rounded-circle" src="/admin/images/avatars/0.jpg" alt="User Avatar" width="110"> </div>
          <h4 class="mb-0">{{$data->name}}</h4>
          <span class="text-muted d-block mb-2">Dinas Kesehatan</span>
          <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2">
            <i class="material-icons mr-1">image</i>Upload Gambar</button>
        </div>
        
      </div>
    </div>
    <div class="col-lg-8">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">Detail Akun</h6>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">
            <div class="row">
              <div class="col">
                <form>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="feFirstName">Nama</label>
                      <input type="text" class="form-control" id="feFirstName"  name="nama" value="{{$data->name}}"> </div>
                    <div class="form-group col-md-6">
                      <label for="feLastName">Email</label>
                      <input type="email" class="form-control" id="feLastName"  name="email" value="{{$data->email}}"> </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="feEmailAddress">Username</label>
                      <input type="text" class="form-control" id="feEmailAddress" name="username" value="{{$data->username}}"> </div>
                    <div class="form-group col-md-6">
                      <label for="fePassword">Password</label>
                      <input type="password" class="form-control" name="password" id="fePassword"> </div>
                  </div>
                  <small>Note : * Kosongkan password jika tidak ingin di ganti </small><br>
                  <button type="submit" class="btn btn-accent">Update Akun</button>
                </form>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
@endsection

