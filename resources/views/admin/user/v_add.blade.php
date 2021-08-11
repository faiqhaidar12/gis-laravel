@extends('layouts.backend')

@section('content')

    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Data</h3>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="/user/insert" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>User</label>
                                <input name="name" class="form-control" value="{{ old('name') }}" placeholder="nama user">
                                <div class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control" value="{{ old('email') }}"
                                    placeholder="email user">
                                <div class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" class="form-control" value="{{ old('password') }}"
                                    placeholder="pasword user">
                                <div class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control" placeholder="foto"
                                    accept="image/png,image/jpg,image/jpeg">
                                <div class="text-danger">
                                    @error('foto')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class=" fa fa-save"></i> Simpan</button>
                <a href="/user" type="submit" class="btn btn-warning float-right"></i> Cancel</a>
            </div>
            </form>
        </div>
        <!-- /.card-body -->
        <!-- /.card -->
    </div>

@endsection
