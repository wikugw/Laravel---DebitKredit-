<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saldo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>table</h1>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksis as $transaksi)
                     <tr>
                        <th scope="row">{{ $transaksi->saldo_id }}</th>
                        <td>{{ $transaksi->nominal }}</td>
                        <td>{{ $transaksi->jenis }}</td>
                        <td>{{ $transaksi->tanggal }}</td>
                        <td>
                            <a  href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus transaksi?');"
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                      </tr>
                     @empty
                        <th scope="row" colspan="3">Saldo tidak ditemukan</th>
                     @endforelse

                    </tbody>
                </table>
            </div>
            <div class="col-3">
                <h1>insert</h1>
                <form method="POST" action="{{ route('transaksi.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <select name="saldo_id" class="form-control">
                                @foreach ($saldos as $saldo)
                                    <option value="{{ $saldo->id }}">{{ $saldo->unique_id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nominal" class="col-sm-4 col-form-label">Nominal</label>
                        <div class="col-sm-8">
                            <input type="number" name="nominal" class="form-control" id="nominal" placeholder="Misal 5000000">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
                            <select name="jenis" class="form-control">
                                <option value="debet">Debet</option>
                                <option value="kredit">Kredit</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nominal" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="datetime-local" id="birthdaytime" class="form-control" name="tanggal">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('saldo.index' ) }}" class="btn  btn-info">Saldo</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
