@extends('layouts.backend')

@section('content')
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $kecamatan }}</h3>

                <p>Kecamatan</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-cloud"></i>
            </div>
            <a href="/kecamatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $jenjang }}</sup></h3>

                <p>Jenjang</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-graduation-cap"></i>
            </div>
            <a href="/jenjang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $sekolah }}</h3>

                <p>Sekolah</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-school"></i>
            </div>
            <a href="/sekolah" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $user }}</h3>

                <p>User</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-users"></i>
            </div>
            <a href="/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
@endsection
