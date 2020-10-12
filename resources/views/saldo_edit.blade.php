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
                <h1>Edit Saldo {{ $saldo->nama }}</h1>
                <form method="POST" action="{{ route('saldo.update', $saldo->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $saldo->nama }}" placeholder="nama">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="saldo" class="col-sm-2 col-form-label">Saldo</label>
                        <div class="col-sm-10">
                          <input type="number" name="saldo" class="form-control" id="saldo" placeholder="saldo" value="{{ $saldo->saldo }}">
                        </div>
                      </div>
                    <button type="submit"  class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>

</body>
</html>
