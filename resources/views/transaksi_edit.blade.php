<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saldo Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1>Edit Transaksi {{ $transaksi->saldo_id }}</h1>
                <form method="POST" action="{{ route('transaksi.update', $transaksi->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label for="nominal" class="col-sm-4 col-form-label">Nominal</label>
                        <div class="col-sm-8">
                            <input type="number" name="nominal" class="form-control" id="nominal" value="{{ $transaksi->nominal }}" placeholder="Misal 5000000">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
                            <select name="jenis" class="form-control">
                                <option value="{{ $transaksi->jenis }}">{{ $transaksi->jenis }}</option>
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
