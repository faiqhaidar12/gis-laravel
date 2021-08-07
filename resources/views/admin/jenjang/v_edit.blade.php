@extends('layouts.backend')

@section('content')

    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Data</h3>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="/jenjang/update/{{ $jenjang->id_jenjang }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Jenjang</label>
                                <input name="jenjang" value="{{ $jenjang->jenjang }}" class="form-control"
                                    placeholder="jenjang">
                                <div class="text-danger">
                                    @error('jenjang')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ganti Icon</label>
                                <input type="file" name="icon" class="form-control" placeholder="icon" accept="image/png">
                                <div class="text-danger">
                                    @error('icon')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Icon</label>
                                <img src="{{ asset('icon') }}/{{ $jenjang->icon }}" width="100px">
                            </div>
                        </div>
                    </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class=" fa fa-save"></i> Simpan</button>
                <a href="/jenjang" class="btn btn-warning float-right"></i> Cancel</a>
            </div>
            </form>
        </div>
        <!-- /.card-body -->
        <!-- /.card -->
    </div>

@endsection
