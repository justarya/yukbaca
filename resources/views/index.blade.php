@include('includes.header')
<form class="form" method="post" action="/booking">
  {{-- <input type="text"> --}}
  {{ csrf_field() }}
  @if(\Session::has('alert'))
  <div class="alert alert-danger">
      <div>{{Session::get('alert')}}</div>
  </div>
  @endif
  <h2 class="form__title">Pinjam buku</h2>
  <div class="form__nis">
    <input id="selected-nis" list="nis-siswa" name="nis" placeholder="NIS" autocomplete="off">
    <datalist id="nis-siswa">
      @foreach($siswas as $siswa)
      <option value="{{$siswa->nis}}">{{$siswa->nama}}</option>
      @endforeach
    </datalist>
  </div>
  <div class="form__buku">
    <select class="" name="buku">
      <option value="">Pilih Buku</option>
      @foreach($bukus as $buku)
      <option value="{{$buku->id_buku}}">{{$buku->judul_buku}}</option>
      @endforeach
    </select>
  </div>
  <div class="form__info">
    <!-- MSG -->
    <p>*Pengembalian buku maksimal 1 Minggu</p>
  </div>
  <input id="submit" type="submit" name="submit" value="Pinjam Buku" class="button">
</form>
@include('includes.footer')
