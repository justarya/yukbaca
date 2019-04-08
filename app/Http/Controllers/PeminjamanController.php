<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Siswa;
use App\Models\Buku;

use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function loadIndex(){
        $data['siswas'] = Siswa::all();
        $data['bukus'] = Buku::all();

        return view('index', $data);
    }

    public function booking(Request $request){

        $this->validate($request, [
            'nis' => 'required',
            'buku' => 'required',
        ]);

        $id = time();
        $booking = new Peminjaman;
        $booking->id_peminjaman = $id;
        $booking->nis = $request->nis;
        $booking->id_buku = $request->buku;
        $booking->jumlah_buku = 1;
        $booking->status = 0;
        $booking->tanggal_booking = Carbon::now()->format('Y-m-d');
        $booking->denda = 0;
        $booking->save();

        $peminjaman = Peminjaman::where('id_peminjaman',$id)->first();

        $data['peminjaman'] = $peminjaman;

        return View('bukti',$data);
    }


    public function loadAdminBooking(){
        if(Session::get('login') == false){
            return redirect('/login')->with('alert','Login terlebih dahulu ');
        }
        $peminjaman = Peminjaman::where('status','0')->get();
        $data['peminjamans'] = $peminjaman;

        return view('admin.booking',$data);
    }
    public function loadAdminPeminjaman(){
        if(Session::get('login') == false){
            return redirect('/login')->with('alert','Login terlebih dahulu ');
        }
        $nowdate = Carbon::now();
        
        $peminjaman = Peminjaman::whereDate('tanggal_pengembalian','>=',$nowdate)->where('status',1)->get();
        $data['peminjamans'] = $peminjaman;
        
        return view('admin.peminjaman',$data);
    }
    public function loadAdminDenda(){
        if(Session::get('login') == false){
            return redirect('/login')->with('alert','Login terlebih dahulu ');
        }
        $nowdate = Carbon::now();

        $peminjaman = Peminjaman::whereDate('tanggal_pengembalian','<',$nowdate)->where('status',1)->get();
        
        foreach($peminjaman as $pinjam){
            $tanggalpengembalian = Carbon::parse($pinjam->tanggal_pengembalian);
            $tendayslater = $tanggalpengembalian->addDays(10);
            $peminjamanIndividual = Peminjaman::where('id_peminjaman',$pinjam->id_peminjaman)->first();
            if($nowdate->greaterThan($tanggalpengembalian->addDays(10))){
                $peminjamanIndividual->denda = 50000;
            }else{
                $peminjamanIndividual->denda = 10000;
            }
            $peminjamanIndividual->save();
        }
        
        $peminjaman = Peminjaman::whereDate('tanggal_pengembalian','<',$nowdate)->where('status',1)->get();
        $data['peminjamans'] = $peminjaman;
        // dd($peminjaman);

        return view('admin.denda',$data);
    }

    public function konfirmasiBooking($id){
        if(Session::get('login') == false){
            return redirect('/login')->with('alert','Login terlebih dahulu ');
        }
        $tanggal_penerimaan = Carbon::now();;
        $tanggal_penerimaan = $tanggal_penerimaan->format('Y-m-d');
        $tanggal_pengembalian = Carbon::now();;
        $tanggal_pengembalian = $tanggal_pengembalian->addDays('7');
        $tanggal_pengembalian = $tanggal_pengembalian->format('Y-m-d');
        
        $peminjaman = Peminjaman::where('id_peminjaman',$id)->first();
        $peminjaman->status = 1;
        $peminjaman->tanggal_penerimaan = $tanggal_penerimaan;
        $peminjaman->tanggal_pengembalian = $tanggal_pengembalian;
        $peminjaman->save();

        return redirect('/admin/booking');
    }
    
    public function konfirmasiPengembalian($id){
        if(Session::get('login') == false){
            return redirect('/login')->with('alert','Login terlebih dahulu ');
        }
        $peminjaman = Peminjaman::where('id_peminjaman',$id)->first();
        $peminjaman->status = 2;
        $peminjaman->save();

        return redirect('/admin/peminjaman');
    }

    public function konfirmasiDenda($id){
        if(Session::get('login') == false){
            return redirect('/login')->with('alert','Login terlebih dahulu ');
        }
        $peminjaman = Peminjaman::where('id_peminjaman',$id)->first();
        $peminjaman->status = 2;
        $peminjaman->denda = 0;
        $peminjaman->save();

        return redirect('/admin/peminjaman');
    }
}
