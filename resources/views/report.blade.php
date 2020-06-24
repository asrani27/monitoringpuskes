@extends('layouts.master')

@section('content')
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Dashboard</span>
      <h3 class="page-title">Overview {{strtoupper($param)}}</h3>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg col-md-6 col-sm-6 mb-4">
      <div class="stats-small stats-small--1 card card-small">
        <div class="card-body p-0 d-flex">
          <div class="d-flex flex-column m-auto">
            <div class="stats-small__data text-center">
              <span class="stats-small__label text-uppercase">Pasien Hari Ini</span>
              <h6 class="stats-small__value count my-3">{{$pasien}}</h6>
            </div>
            <div class="stats-small__data">
              <a href=""><span class="stats-small__percentage stats-small__percentage--increase"></span></a>
            </div>
          </div>
          <canvas height="120" class="blog-overview-stats-small-1"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg col-md-6 col-sm-6 mb-4">
      <div class="stats-small stats-small--1 card card-small">
        <div class="card-body p-0 d-flex">
          <div class="d-flex flex-column m-auto">
            <div class="stats-small__data text-center">
              <span class="stats-small__label text-uppercase">Pasien 7 hari Terakhir</span>
              <h6 class="stats-small__value count my-3">{{$sevenDay}}</h6>
            </div>
            <div class="stats-small__data">
              <span class="stats-small__percentage stats-small__percentage--increase"></span>
            </div>
          </div>
          <canvas height="120" class="blog-overview-stats-small-2"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg col-md-4 col-sm-6 mb-4">
      <div class="stats-small stats-small--1 card card-small">
        <div class="card-body p-0 d-flex">
          <div class="d-flex flex-column m-auto">
            <div class="stats-small__data text-center">
              <span class="stats-small__label text-uppercase">Pasien Bulan Ini</span>
              <h6 class="stats-small__value count my-3">{{$pasienMonth}}</h6>
            </div>
            <div class="stats-small__data">
              <span class="stats-small__percentage stats-small__percentage--increase"></span>
            </div>
          </div>
          <canvas height="120" class="blog-overview-stats-small-3"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg col-md-4 col-sm-6 mb-4">
      <div class="stats-small stats-small--1 card card-small">
        <div class="card-body p-0 d-flex">
          <div class="d-flex flex-column m-auto">
            <div class="stats-small__data text-center">
              <span class="stats-small__label text-uppercase">Jumlah Poli</span>
              <h6 class="stats-small__value count my-3">{{$poli}}</h6>
            </div>
            <div class="stats-small__data">
              <span class="stats-small__percentage stats-small__percentage--increase"></span>
            </div>
          </div>
          <canvas height="120" class="blog-overview-stats-small-4"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg col-md-4 col-sm-12 mb-4">
      <div class="stats-small stats-small--1 card card-small">
        <div class="card-body p-0 d-flex">
          <div class="d-flex flex-column m-auto">
            <div class="stats-small__data text-center">
              <span class="stats-small__label text-uppercase">Jumlah Dokter</span>
              <h6 class="stats-small__value count my-3">{{$jumlahDokter}}</h6>
            </div>
            <div class="stats-small__data">
              <span class="stats-small__percentage stats-small__percentage--increase"></span>
            </div>
          </div>
          <canvas height="120" class="blog-overview-stats-small-5"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">Data Pengguna Aplikasi</h6>
        </div>
        <div class="card-body p-0 pb-3 text-center">
          <table class="table mb-0">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0">#</th>
                <th scope="col" class="border-0">Nama User</th>
                <th scope="col" class="border-0">Aktif</th>
                <th scope="col" class="border-0"></th>
              </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($datauser as $item)      
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->name}}</td>
                    <td>6 Jam Yang Lalu</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
