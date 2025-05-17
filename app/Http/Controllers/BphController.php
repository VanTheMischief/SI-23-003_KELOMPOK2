<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Ukm;
use App\Models\Event;

class BphController extends Controller
{
    public function tambahEvent(){
        $ukm = Ukm::where('id_ketua', Auth::id())->first();

        return view('bph.tambahEventBph', ['ukm' => $ukm]);
    }

    public function storeEvent(Request $request){
        $request = validate([
            'nama_event' => 'required',
            'ketuplak' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required|date',
            'jmlh_max' => 'required|integer',
            'dana_butuh' => 'required',
            'dana_terpakai' => 'required'
        ]);

        $exists = Event::where('lokasi', $request->lokasi)->where('tanggal', $request->tanggal)->exists();

        if($exists){
            return back()->withErrors(['lokasi' => 'Lokasi sudah terpakai di tanggal tersebut']);
        }

        Event::create([
            'nama_event' => $request->nama_event,
            'penyelenggara' => Ukm::where('id_ketua', Auth::id()->first()->nama_ukm ?? 'Unknown'),
            'ketuplak' => $request->ketuplak,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'jmlh_max' => $request->jmlh_max,
            'jmlh_saat_ini' => 0,
            'dana_dibutuhkan' => $request->dana_butuh,
            'dana_terpakai' => $request->dana_terpakai,
        ]);

        return redirect()->route('lihatEvent')->with('Success', 'Event berhasil ditambahkan');
    }

    public function lihatEvent(){
        return view('bph.lihatEvent');
    }
}
