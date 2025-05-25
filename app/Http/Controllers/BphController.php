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
        $validated = $request->validate([
            'nama_event' => 'required',
            'ketuplak' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required|date',
            'jmlh_max' => 'required|integer',
            'dana_butuh' => 'required',
            'dana_terpakai' => 'required'
        ]);

        $normalized = trim(strtolower($validated['lokasi']));



        $exists = Event::whereRaw('LOWER(TRIM(lokasi)) = ? ', [$normalized])
                        ->where('tanggal', $validated['tanggal'])
                        ->exists();

        if($exists){
            return back()->withErrors(['lokasi' => 'Lokasi sudah terpakai di tanggal tersebut']);
        }

        $ukm = Ukm::where('id_ketua', Auth::id())->first();
        $nama_ukm = $ukm ? $ukm->nama_ukm : 'Unknown';

        $finalLok = ucwords($normalized);

        Event::create([
            'nama_event' => $validated['nama_event'],
            'penyelenggara' => $nama_ukm,
            'ketuplak' => $validated['ketuplak'],
            'lokasi' => $finalLok,
            'tanggal' => $validated['tanggal'],
            'jmlh_max' => $validated['jmlh_max'],
            'jmlh_saat_ini' => 0,
            'dana_dibutuhkan' => $validated['dana_butuh'],
            'dana_terpakai' => $validated['dana_terpakai'],
        ]);

        return redirect()->route('lihatEvent')->with('Success', 'Event berhasil ditambahkan');
    }

    public function lihatEvent(){
        $ukm = Ukm::where('id_ketua', Auth::id())->first();

        $events = [];
        if ($ukm){
            $events = Event::where('penyelenggara', $ukm->nama_ukm)->get();
        }

        return view('bph.lihatEvent', ['events' => $events]);
    }
}
