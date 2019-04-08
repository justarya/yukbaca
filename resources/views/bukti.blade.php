<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YukBaca</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
  </head>
  <body>
    <div class="content page-bukti">

      <div class="title">
        <h1>Yuk Baca</h1>
      </div>
      <form class="form" method="post" action="">
        <h2 class="form__title">Bukti Reservasi</h2>
        <div class="form__info">
          <table>
            <tr>
              <td><b>Nomor peminjaman Buku</b></td>
              <td><b>{{$peminjaman->id_peminjaman}}</b></td>
            </tr>
            <tr>
              <td>Buku</td>
              <td>{{$peminjaman->buku->judul_buku}}</td>
            </tr>
            <tr>
              <td>Peminjam</td>
              <td>{{$peminjaman->siswa->nis}} - {{$peminjaman->siswa->nama}}</td>
            </tr>
          </table>
          <br>
          <!-- <p class="form__infogreen">Reservasi peminjaman berhasil!</p> -->
          <p class="form__info--note">*FOTO BUKTI RESERVASI atau CATAT NOMOR PEMINJAMAN dan TUNJUKAN BUKTI KE PUSTAKAWAN</p>
        </div>
      </form>
      <div class="nav-bottom">
        <a href="/admin/" class="button">Admin Panel</a>
      </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
  </body>
</html>
