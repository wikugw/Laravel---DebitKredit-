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
                <h1>table Saldo</h1>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Saldo</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     @forelse ($saldos as $saldo)
                     <tr>
                        <th scope="row">{{ $saldo->unique_id }}</th>
                        <td>{{ $saldo->nama }}</td>
                        <td>{{ $saldo->saldo }}</td>
                        <td>
                            <a  href="{{ route('saldo.edit', $saldo->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('saldo.destroy', $saldo->id) }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus saldo?');"
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
                <form method="POST" action="{{ route('saldo.store') }}">
                    @csrf
                    <div class="form-group row">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="nama">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="saldo" class="col-sm-2 col-form-label">Saldo</label>
                        <div class="col-sm-10">
                          <input type="number" name="saldo" class="form-control" id="saldo" placeholder="saldo" value="0">
                        </div>
                      </div>
                    <button type="submit"  class="btn btn-primary">Submit</button>
                    <a  href="{{ route('transaksi.index' ) }}" class="btn  btn-info">Transaksi</a>
                  </form>
            </div>
        </div>
    </div>

</body>
</html>
