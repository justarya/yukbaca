@include('admin.includes.header')
    <div class="table table-denda">
        <h1>Denda</h1>
        <table>
            <thead>
                <th>ID Peminjaman</th>
                <th>Nama Peminjaman</th>
                <th>Buku</th>
                <th>Jumlah Buku</th>
                <th>Tanggal Pengembalian Terakhir</th>
                <th>Denda</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($peminjamans as $peminjaman)
                <tr>
                    <td>{{$peminjaman->id_peminjaman}}</td>
                    <td>{{$peminjaman->siswa->nama}}</td>
                    <td>{{$peminjaman->buku->judul_buku}}</td>
                    <td>{{$peminjaman->jumlah_buku}}</td>
                    <td>{{$peminjaman->tanggal_pengembalian}}</td>
                    <td>{{$peminjaman->denda}}</td>
                    <td>
                        <a href="/admin/konfirmasi/denda/{{$peminjaman->id_peminjaman}}">Konfirmasi Pengembalian</a>
                    </td>
                </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@include('admin.includes.footer')