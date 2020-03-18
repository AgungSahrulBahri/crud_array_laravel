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
                    <h2>Daftar Mahasiswa</h2>
                </div>
                <div class="card-body">
                    
                    @php
                        $kelas = ['6A', '6B', '6C', '6D', "SEMUA"];
                    @endphp
                    
                        <form action="{{route('data.index')}}" class="row mb-4">
                            <div class="col-md-8">
                                <select name="kelas" class="form-control">
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k == "SEMUA" ? "" : $k }}" >{{ $k }} </option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-success" value="Cari">
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('data.create') }}" class="btn btn-primary float-right">Tambah</a>
                            </div>
                        </form>

                    @if ($message = Session::get('message'))
                        <div class="alert alert-success">
                            <span>{{ $message }}</span>
                        </div>
                    @endif
                    
                    
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th width="30%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataMhs as $dmhs)
                            <tr>
                                <td>{{ $dmhs['nim'] }} </td>
                                <td>{{ $dmhs['nama'] }} </td>
                                <td>{{ $dmhs['kelas'] }} </td>
                                <td>
                                    <form action="{{ route('data.destroy',$dmhs['nim']) }}" method="POST">
                                        <a href="{{ route('data.show',$dmhs['nim']) }}" class="btn btn-secondary">Detail</a>
                                        <a href="{{ route('data.edit',$dmhs['nim']) }}" class="btn btn-warning">Edit</a>
                                        
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Serius?')">Hapus</button>
 
                                    </form>
                                </td>
                            </tr>

                            @empty
                                <td colspan="3"> Tidak ada Data</td>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
    <script>
        function action(){  
            var kelas = document.getElementById('kelas').value;
            window.location = "{{ url('data') }}/"+kelas;
        }
    </script>
</body>
</html>