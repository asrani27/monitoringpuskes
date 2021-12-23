@extends('layouts.master')

@section('content')
<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
    <span class="text-uppercase page-subtitle">Dashboard</span>
    <h3 class="page-title">Overview Monitoring</h3>
  </div>
</div>

<div class="row">
  <div class="col-lg col-md-6 col-sm-6 mb-4">
    <div class="stats-small stats-small--1 card card-small">
      <div class="card-body p-0 d-flex">
        <div class="d-flex flex-column m-auto">
          <div class="stats-small__data text-center">
            <span class="stats-small__label text-uppercase">Total Puskesmas</span>
            <h6 class="stats-small__value count my-3">6</h6>
          </div>
          <div class="stats-small__data">
            <span class="stats-small__percentage stats-small__percentage--increase"></span>
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
            <span class="stats-small__label text-uppercase">User Aktif</span>
            <h6 class="stats-small__value count my-3">6</h6>
          </div>
          <div class="stats-small__data">
            <span class="stats-small__percentage stats-small__percentage--increase"></span>
          </div>
        </div>
        <canvas height="120" class="blog-overview-stats-small-2"></canvas>
      </div>
    </div>
  </div>
  <div class="col-lg col-md-4 col-sm-12 mb-4">
    <div class="stats-small stats-small--1 card card-small">
      <div class="card-body p-0 d-flex">
        <div class="d-flex flex-column m-auto">
          <div class="stats-small__data text-center">
            <span class="stats-small__label text-uppercase">Tanggal</span>
            <h6 class="stats-small__value count my-3">{{\Carbon\Carbon::today()->format('d-m-Y')}}</h6>
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
        <h6 class="m-0">Puskesmas</h6>
      </div>
      <div class="card-body p-0 pb-3 text-center">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0">#</th>
              <th scope="col" class="border-0">Nama Puskes</th>
              <th scope="col" class="border-0">URL</th>
              <th scope="col" class="border-0">Status</th>
              <th scope="col" class="border-0"></th>
            </tr>
          </thead>
          <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($puskesmas as $item)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$item->nama}}</td>
              <td><a href="http://{{$item->url}}" target="_blank">{{$item->url}}</a></td>
              <td>
                @if($item->koneksi == 'Y')
                <span class="text-success"><i class="material-icons">check</i> </span>Online
              </td>
              @else
              <span class="text-danger"><i class="material-icons">close</i> </span>Offline</td>
              @endif
              <td>
                <div class="btn-group btn-group-sm">
                  <a href="/report/{{$item->database}}" class="btn btn-white">
                    <span class="text-primary">
                      <i class="material-icons">report</i>
                    </span> Full Report
                  </a>
                  {{-- <a href="/bug/{{$item->database}}" class="btn btn-white">
                    <span class="text-light">
                      <i class="material-icons">List Bug</i>
                    </span> List Bug
                  </a> --}}
                </div>
                {{-- <a href="#" class="mb-2 btn btn-xs btn-outline-accent"><i class="material-icons">edit</i></a>
                <button type="button" class="mb-2 btn btn-sm btn-outline-info mr-1">Info</button> --}}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection