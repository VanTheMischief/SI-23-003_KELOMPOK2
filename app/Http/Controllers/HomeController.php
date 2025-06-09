<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Event;
use App\Models\Ukm;


class HomeController extends Controller
{
	public function index(){
		date_default_timezone_set('Asia/Jakarta');
		
		$name = Auth::user()->nama;
		$foto = Auth::user()->pasfoto;
		$time = date('H:i:s');	
		$hour = date('H');

		$greet = match(true){
			$hour >= 2 && $hour < 12 => 'Good Morning',
			$hour >= 12 && $hour < 15 => 'Good Afternoon',
			$hour >= 15 && $hour < 18 => 'Good Evening',
			default => 'Good Night',
		};

		$total_event = Event::count();
		$total_ukm = Ukm::count();

		return view('userNormal.home', compact('name', 'foto', 'greet', 'total_event', 'total_ukm'));
	}

	public function showEvent(){
		$events = Event::all();
		$foto = Auth::user()->pasfoto;

		return view('userNormal.daftarevent', compact('events', 'foto'));
	}

	// public function daftarEvent($id){
	// 	$events = Event::findOrFail($id);

	// 	if($events->jmlh_saat_ini >= $events->jmlh_max){
	// 		return redirect()->route('daftarevent')->with('error', 'Kuota penuh');
	// 	}

	// 	$events->increment('jmlh_saat_ini');
	// 	return redirect()->route('daftarevent')->with('success', 'Berhasil mendaftar event');
	// }

	public function showDaftar($id){
		$event = Event::findOrFail($id);
		return view('userNormal.detailevent', compact('event'));
	}

	   public function storeDaftar(Request $request, $id){
       $event = Event::findOrFail($id);

       if ($event->users()->where('user_id', auth()->id())->exists()) {
           return back()->with('error', 'Anda telah terdaftar di event ini');
       }

       $event->users()->attach(auth()->id());
       $event->increment('jmlh_saat_ini');

       return redirect()->route('riwayatevent')->with('success', 'Berhasil mendaftar event');
   }
   

	public function historyDaftar()
	{
	    $events = auth()->user()->events;
	    return view('userNormal.riwayatevent', compact('events'));
	}


	public function cancelDaftar($id)
	{
	    $event = Event::findOrFail($id);

	    $event->users()->detach(auth()->id());

	    $event->decrement('jmlh_saat_ini');

	    return back()->with('success', 'Berhasil membatalkan pendaftaran');
	}


	public function akun(){
		$user = Auth::user();
		return view('userNormal.akun', compact('user'));
	}

	public function updateAkun(Request $request){
	    $request->validate([
	        'password' => 'nullable|string|min:6',
	        'pasfoto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
	    ]);

	    $user = Auth::user();

	    if ($request->hasFile('pasfoto')) {
	        $file = $request->file('pasfoto');
	        $filename = time() . '_' . $file->getClientOriginalName();
	        $path = $file->storeAs('uploadPictures', $filename, 'public');
	        $user->pasfoto = $filename;
	    }

	    if ($request->filled('password')) {
	        $user->password = Hash::make($request->password);
	    }

	    $user->save();

	    return redirect()->route('akun')->with('success', 'Akun berhasil diperbarui');
	}


	private function getDate(){
		return date('d-m-Y');
	}

	public function login(){
		return view('login');
	}

	public function loginSys(Request $request){
		$request->validate([
			'email'=>'required',
			'password'=>'required',
			'select_user'=>'required|in:mhs,bph,adm',
		],[
			'email.required' => 'Email Wajib Diisi',
			'password.required' => 'Password Wajib Diisi',
			'select_user.required'=>'Pilih jenis user',
			'select_user.in'=>'Role tidak valid',
		]);

		$infoLog = $request->only('email', 'password');

		if(Auth::attempt($infoLog)){

			$user = Auth::user();

			switch ($request->select_user){
				case 'adm':
					if($user->is_admin) return redirect('adminhome');
					break;
				case 'bph':
					if($user->is_bph) return redirect('homebph');
					break;
				case 'mhs':
					return redirect('home');
					break;
			}

			Auth::logout();
			return redirect('/')->withErrors('Role tidak sesuai dengan akun anda');
		}else{
			return redirect('/')->withErrors('Username / Password salah')->withInput();
		}
	}

	public function homeBph()
	{
	    $user = Auth::user();
	    $ukm = Ukm::where('id_ketua', $user->id)->first();

	    $events = [];

	    if ($ukm) {
	        $events =Event::where('penyelenggara', $ukm->nama_ukm)->get();
	    }

	    return view('bph.homebph', [
	        'name' => $user->nama,
	        'events' => $events ?? []  // <= pastikan $events selalu array
	    ]);
	}

	// public function riwayatEvent(){
	// 	return view('userNormal.riwayatEvent');
	// }
}	