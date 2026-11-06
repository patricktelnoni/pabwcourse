<!DOCTYPE html>
<html lang="en">
<head>
  <title>Daftar Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Daftar Post</h2>

  @foreach ($hasil as $judul => $item)
    <h3>{{ $judul }}</h3>

    <div class="alert alert-info">
      <strong>Jumlah query:</strong> {{ $item['jumlahQuery'] }}
    </div>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Judul</th>
          <th>Jumlah Komentar</th>
          <th>Komentar</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($item['posts'] as $post)
          <tr>
            <td>{{ $post['id'] }}</td>
            <td>{{ $post['title'] }}</td>
            <td>{{ $post['jumlah_komentar'] }}</td>
            <td>
              <ul>
                @foreach ($post['komentar'] as $komentar)
                  <li>{{ $komentar }}</li>
                @endforeach
              </ul>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center">Belum ada post.</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <h4>Daftar Query</h4>
    <ol>
      @foreach ($item['daftarQuery'] as $query)
        <li><code>{{ $query }}</code></li>
      @endforeach
    </ol>

    <hr>
  @endforeach
</div>

</body>
</html>
