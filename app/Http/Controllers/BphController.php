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
        $exists = Event::whereRaw('LOWER(TRIM(lokasi)) = ?', [$normalized])
                        ->where('tanggal', $validated['tanggal'])
                        ->exists();

        if ($exists) {
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
            'foto_hasil' => null 
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

    public function detailEvent($id){
        $event = Event::findOrFail($id);
        return view('bph.detailEvent', ['event' => $event]);
    }

    public function editEvent($id){
        $event = Event::findOrFail($id);
        return view('bph.editEvent', ['event' => $event]);
    }

    public function updateEvent(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_event' => 'required',
            'ketuplak' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required|date',
            'jmlh_max' => 'required|integer|min:1',
            'jmlh_saat_ini' => 'required|integer|min:0',
            'dana_dibutuhkan' => 'required|min:0',
            'dana_terpakai' => 'required|min:0',
            'foto_hasil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $normalizedLokasi = trim(strtolower($validated['lokasi']));
        $exists = Event::whereRaw('LOWER(TRIM(lokasi)) = ?', [$normalizedLokasi])
                        ->where('tanggal', $validated['tanggal'])
                        ->where('id', '!=', $id)
                        ->exists();

        if ($exists) {
            return back()->withErrors(['lokasi' => 'Lokasi sudah terpakai di tanggal tersebut'])->withInput();
        }

        $event = Event::findOrFail($id);
        $event->nama_event = $validated['nama_event'];
        $event->ketuplak = $validated['ketuplak'];
        $event->lokasi = ucwords($normalizedLokasi);
        $event->tanggal = $validated['tanggal'];
        $event->jmlh_max = $validated['jmlh_max'];
        $event->jmlh_saat_ini = $validated['jmlh_saat_ini'];
        $event->dana_dibutuhkan = $validated['dana_dibutuhkan'];
        $event->dana_terpakai = $validated['dana_terpakai'];

        if ($request->hasFile('foto_hasil')) {
            $fotoPath = $request->file('foto_hasil')->store('fotoHasil', 'public');
            $event->foto_hasil = $fotoPath;
        }

        $event->save();

        return redirect()->route('lihatEvent')->with('Success', 'Event berhasil diperbarui');
    }

    
    public function destroyEvent($id){
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('lihatEvent')->with('Success', 'Event berhasil dihapus');
    }


}
