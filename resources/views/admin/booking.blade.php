@include('admin.includes.header')
    <div class="table table-booking">
        <h1>Booking</h1>
        <table>
            <thead>
                <th>ID</th>
                <th>Nama Peminjam</th>
                <th>Buku</th>
                <th>Jumlah Buku</th>
                <th>Tanggal Booking</th>
                <th>Tanggal Pengembalian</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($peminjamans as $peminjaman)
                    <tr>
                        <td>{{$peminjaman->id_peminjaman}}</td>
                        <td>{{$peminjaman->siswa->nama}}</td>
                        <td>{{$peminjaman->buku->judul_buku}}</td>
                        <td>{{$peminjaman->jumlah_buku}}</td>
                        <td>{{$peminjaman->tanggal_booking}}</td>
                        <td>{{$peminjaman->tanggal_pengembalian}}</td>
                        <td>
                            <a href="/admin/konfirmasi/booking/{{$peminjaman->id_peminjaman}}">Konfirmasi Peminjaman</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@include('admin.includes.footer')
