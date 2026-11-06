<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="/produks/store" method="POST">
    <div class="form-group">
      <label for="nama_produk">Nama:</label>
      <input type="nama_produk" value="{{$detailBarang->nama_produk}}" class="form-control" id="nama_produk" placeholder="Enter nama" name="nama_produk">
      @error('nama_produk')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      
    </div>
    <div class="form-group">
      <label for="deskripsi">Deskripsi:</label>
      <input type="text" class="form-control" value="{{$detailBarang->deskripsi}}" id="deskripsi" placeholder="Enter deskripsi" name="deskripsi">
      @error('deskripsi')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="harga">Harga:</label>
      <input type="text" class="form-control" value="{{$detailBarang->harga}}" id="harga" placeholder="Enter harga" name="harga">
      @error('harga')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="stok">Stok:</label>
      <input type="text" class="form-control" value="{{$detailBarang->stok}}" id="stok" placeholder="Enter stok" name="stok">
      @error('stok')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
