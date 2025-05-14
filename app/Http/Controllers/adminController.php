<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Ukm;
use App\Models\Event;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.adminhome');
    }

    // KELOLA USER SECTION

    public function addUser(){
        return view('admin.adduser');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'fakultas' => 'nullable|string|max:255',
        'jurusan' => 'nullable|string|max:255',
        'role' => 'required|in:normal,bph,admin',
    ]);

    // Tentukan status berdasarkan role
    $status = $request->role;
    $is_bph = $request->role === 'bph' ? 1 : 0;
    $is_admin = $request->role === 'admin' ? 1 : 0;

    User::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'status' => $status,
        'fakultas' => $request->fakultas,
        'jurusan' => $request->jurusan,
        'pasfoto' => 'default.jpg', // Atur default jika belum upload foto
        'is_bph' => $is_bph,
        'is_admin' => $is_admin,
    ]);

    return redirect()->route('kelolauser')->with('success', 'User berhasil ditambahkan.');
}


    public function kelolaUser(Request $request)
    {
        // $users = Auth::user();
        $users = User::with('ukm')->get();

        return view('admin.kelolauser', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edituser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'fakultas' => 'nullable|string',
            'jurusan' => 'nullable|string'
        ]);

        $user = User::findOrFail($id);
        $user -> update([
            'nama' => $request->nama,
            'email' => $request->email,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->route('kelolauser')->with('Success', 'Data user berhasil diperbaharui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('kelolauser')->with('Success', 'Data berhasil dihapus');
    }

    // UKM SECTIONS

    public function addUkm()
    {
        return view('admin.addukm');
    }

    public function storeUkm(Request $request){
        $request->validate([
            'nama_ukm' => 'required|string|max:255',
            'nama_ketua' => 'required|string|max:255',
            'jmlh_anggota' => 'required|integer',
        ]);

        $ketua = User::where('nama', $request->nama_ketua)->first();

        if(!$ketua){
            return redirect()->back()->with('error', 'Ketua dengan nama tersebut tidak ditemukan');
        }

        Ukm::create([
            'nama_ukm' => $request->nama_ukm,
            'nama_ketua' => $request->nama_ketua,
            'jmlh_anggota' => $request->jmlh_anggota,
            'id_ketua' => $ketua->id
        ]);

        return redirect()->route('dataukm')->with('success', 'UKM berhasil ditambahkan');
    }

    public function showUKM()
    {
        $ukms = Ukm::all();

        return view('admin.dataukm', compact('ukms'));
    }

    public function editUkm($id)
    {
        $ukm = Ukm::findOrFail($id);
        return view('admin.editukm', compact('ukm'));
    }

    public function updateUkm(Request $request, $id)
    {
        $request->validate([
            'nama_ukm' => 'required|string|max:255',
            'nama_ketua' => 'required|string|max:255',
            'jmlh_anggota' => 'required|integer',
        ]);

        $ukm = Ukm::findOrFail($id);

        $ketua = User::where('nama', $request->nama_ketua)->first();

        if(!$ketua){
            return redirect()->back()->with('error', 'ketua dengan nama tersebut tidak ditemukan');
        }

        $ukm -> update([
            'nama_ukm' => $request->nama_ukm,
            'nama_ketua' => $request->nama_ketua,
            'jmlh_anggota' => $request->jmlh_anggota,
            'id_ketua' => $ketua->id
        ]);

        return redirect()->route('dataukm')->with('Success', 'Data UKM berhasil diperbaharui');
    }

       public function destroyUkm($id)
    {
        $ukm = Ukm::findOrFail($id);
        $ukm->delete();

        return redirect()->route('dataukm')->with('Success', 'Data UKM berhasil dihapus');
    }

    // EVENT HANDLER SECTION

    public function addEvent(){
        return view('admin.addevent');
    }

    public function storeEvent(Request $request){
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'ketuplak' => 'required|string|max:225',
            'tanggal' => 'required|date',
            'jmlh_max' => 'required|integer',
        ]);

        Event::create([
            'nama_event' => $request->nama_event,
            'penyelenggara' => $request->penyelenggara,
            'ketuplak' => $request->ketuplak,
            'tanggal' => $request->tanggal,
            'jmlh_max' => $request->jmlh_max,
            'jmlh_saat_ini' => 0
        ]);

        return redirect()->route('dataevent')->with('success', 'Event berhasil ditambahkan');
    }

    public function showEvent(){
        $events = Event::all();

        return view('admin.dataevent', compact('events'));
    }

    public function editEvent($id){
        $events = Event::findOrFail($id);
        return view('admin.editevent', compact('events'));
    }

    public function updateEvent(Request $request, $id){
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'ketuplak' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jmlh_max' => 'required|integer',
            'jmlh_saat_ini' => 'required|integer',
        ]);

        $events = Event::findOrFail($id);

        $events -> update([
            'nama_event' => $request->nama_event,
            'penyelenggara' => $request->penyelenggara,
            'ketuplak' => $request->ketuplak,
            'tanggal' => $request->tanggal,
            'jmlh_max' => $request->jmlh_max,
            'jmlh_saat_ini' => $request->jmlh_saat_ini
        ]);

        return redirect()->route('dataevent')->with('Success', 'Data event berhasil diperbaharui');
    }

    public function destroyEvent($id){
        $events = Event::findOrFail($id);
        $events->delete();

        return redirect()->route('dataevent')->with('Success', 'Data event berhasil dihapus');
    }
}
