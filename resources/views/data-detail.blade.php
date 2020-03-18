<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="col-lg-10 mx-auto">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h2>Mahasiswa</h2>
                </div>
                <div class="card-body">
                    
                    <table class="table">
                        @forelse ($dataMhs as $d)
                          <tr>
                            <th style="border:0">Nama</th>
                            <td style="border:0">:</td>
                            <td style="border:0">{{ $d['nama'] }}</td>
                          </tr>
                          <tr>
                            <th style="border:0">Nim</th>
                            <td style="border:0">:</td>
                            <td style="border:0">{{ $d['nim'] }}</td>
                          </tr>
                          <tr>
                            <th style="border:0">Kelas</th>
                            <td style="border:0">:</td>
                            <td style="border:0">{{ $d['kelas'] }}</td>
                          </tr>
                        @empty
                            <td colspan="3">Tidak dapat menampilkan data</td>
                        @endforelse
                      </table>

                </div>
            </div>
        </div>
    </div>
</body>
</html>