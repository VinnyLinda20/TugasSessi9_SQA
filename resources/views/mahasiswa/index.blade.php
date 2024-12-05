<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>
        <div class="row">
            <div class="col-12" style="text-align: end">
                <a href="{{ url('/tambah-data') }}" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
        @if (Session::get('success'))
            <div class="row col-4">
                <div class="alert alert-success my-3">
                    <b>{{ Session::get('success') }}</b>
                </div>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $item)
                        <tr style="vertical-align: middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->tempat_lahir }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->alamat_tinggal }}</td>
                            <td>
                                <img src="{{ asset('storage/foto/' . $item->foto) }}" alt="Foto" width="50px"
                                    height="50px" class="rounded">
                            </td>
                            <td>
                                <a href="/edit/{{ $item->id }}"
                                    class="badge text-bg-warning rounded-pill text-decoration-none">Edit</a>
                                <form action="/delete/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="badge text-bg-danger rounded-pill"
                                        style="border: none"
                                        onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
