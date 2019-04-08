@include('admin.includes.header')
    <div class="table table-peminjaman">
        <h1>Peminjaman</h1>
        <table>
            <thead>
                <th>ID</th>
                <th>Nama Peminjam</th>
                <th>Buku</th>
                <th>Jumlah Buku</th>
                <th>Tanggal Peminjaman</th>
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
                    <td>{{$peminjaman->tanggal_peminjaman}}</td>
                    <td>{{$peminjaman->tanggal_pengembalian}}</td>
                    <td>
                        <a href="/admin/konfirmasi/booking/{{$peminjaman->id_peminjaman}}">Konfirmasi Pengembalian</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@include('admin.includes.footer')