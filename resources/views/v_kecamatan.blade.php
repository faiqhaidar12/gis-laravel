@extends('layouts.frontend')
@section('content')

    <div id="map" style="width: 100%; height: 500px;"></div>

    <div class="col-sm-12">
        <br>
        <br>
        <div class="text-center">
            <h2><b>Data Sekolah {{ $title }}</b></h2>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="50px" class="text-center">No</th>
                    <th class="text-center">Nama Sekolah</th>
                    <th class="text-center" width="50px">Jenjang</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Koordinat</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($sekolah as $data)
                    <tr>
                        <td class="text-center"> {{ $no++ }}</td>
                        <td>{{ $data->nama_sekolah }}</td>
                        <td class="text-center">{{ $data->jenjang }}</td>
                        <td class="text-center">{{ $data->status }}</td>
                        <td class="text-center">{{ $data->posisi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        var peta1 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
            });

        var peta2 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/satellite-v9'
            });


        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var peta4 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/dark-v10'
            });


        var data{{ $kec->id_kecamatan }} = L.layerGroup();

        var map = L.map('map', {
            center: [-7.8042526272894435, 110.36456246089777],
            zoom: 12,
            layers: [peta2, data{{ $kec->id_kecamatan }}, ]
        });

        var baseMaps = {
            "Grayscale": peta1,
            "Satellite": peta2,
            "Streets": peta3,
            "Dark": peta4,
        };

        var overlayer = {
            "{{ $kec->kecamatan }}": data{{ $kec->id_kecamatan }},
        };

        L.control.layers(baseMaps, overlayer).addTo(map);

        var kec = L.geoJSON(<?= $kec->geojson ?>, {
            style: {
                color: 'white',
                fillColor: '{{ $kec->warna }}',
                fillOpacity: 1.0,
            },
        }).addTo(data{{ $kec->id_kecamatan }});

        map.fitBounds(kec.getBounds());
    </script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
