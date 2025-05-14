<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Event;


class HomeController extends Controller
{
	public function index(){
		date_default_timezone_set('Asia/Jakarta');

		// $name = "John";
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

		return view('userNormal.home', compact('name', 'foto', 'greet'));
	}

	public function fotoDaftarEvent(){
		$foto = Auth::user()->pasfoto;

		return view('userNormal.daftarevent', compact('foto'));
	}

	public function showEvent(){
		$events = Event::all();
		return view('userNormal.daftarevent', compact('events'));
	}

	public function daftarEvent($id){
		$events = Event::findOrFail($id);

		if($events->jmlh_saat_ini >= $events->jmlh_max){
			return redirect()->route('daftarevent')->with('error', 'Kuota penuh');
		}

		$events->increment('jmlh_saat_ini');
		return redirect()->route('daftarevent')->with('success', 'Berhasil mendaftar event');
	}

	public function showUkm(){
		$ukms = Ukm::all();
		return view('userNormal.daftarukm', compact('ukms'));
	}

	public function daftarUkm($id){
		$ukms = Ukm::findOrFail($id);

	}

	public function akun(){
		$user = Auth::user();
		return view('userNormal.akun', compact('user'));
	}

	public function updatePassword(Request $request){
		$request->validate([
			'password'=>'required',
		]);

		$user = Auth::user();
		$user->password = Hash::make($request->password);
		$user->save();

		return redirect()->route('akun')->with('success', 'Password berhasil dirubah');
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
			'password'=>'required'
		],[
			'email.required' => 'Email Wajib Diisi',
			'password.required' => 'Password Wajib Diisi',
		]);

		$infoLog = $request->only('email', 'password');

		if(Auth::attempt($infoLog)){

			$user = Auth::user();

			if($user->is_admin){
				return redirect('adminhome');
			} elseif ($user->is_bph) {
				return redirect('homebph');
			} else {
				return redirect('home');
			}
		}else{
			return redirect('')->withErrors('Username / password salah')->withInput();
		}
	}

	public function homeBph(){
		$name = Auth::user()->nama;
		return view('bph.homebph', compact('name'));
	}

	public function riwayatEvent(){
		return view('userNormal.riwayatEvent');
	}
}	