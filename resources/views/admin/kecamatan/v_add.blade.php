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
                <form action="/kecamatan/insert" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input name="kecamatan" class="form-control" placeholder="Kecamatan">
                                <div class="text-danger">
                                    @error('kecamatan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Warna</label>
                                <div class="input-group my-colorpicker2">
                                    <input name="warna" class="form-control" placeholder="Warna">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                                    </div>
                                </div>
                                <div class="text-danger">
                                    @error('warna')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label>GEOJSON</label>
                            <textarea name="geojson" rows="7" class="form-control" placeholder="GeoJSON"></textarea>
                            <div class="text-danger">
                                @error('geojson')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class=" fa fa-save"></i> Simpan</button>
                <button type="submit" class="btn btn-warning float-right"></i> Cancel</button>
            </div>
            </form>
        </div>
        <!-- /.card-body -->
        <!-- /.card -->
    </div>
    <!-- bootstrap color picker -->
    <script src="{{ asset('AdminLte') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $('.my-colorpicker2').colorpicker();
        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });
    </script>

@endsection
