<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Redirect, Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;

class AuthController extends Controller
{

  public function index()
  {
    return view('login');
  }

  public function registration()
  {
    return view('registration');
  }

  public function postLogin(Request $request)
  {
    // dd('halo');
    request()->validate([
      'nama_pengguna' => 'required',
      'password' => 'required',
    ]);

    $credentials = $request->only('nama_pengguna', 'password');
    // dd(Auth::attempt($credentials));

    if (Auth::attempt($credentials)) {
      // Auth::login($credentials);
      $data = DB::table('pengguna')
        ->where('nama_pengguna', '=', Auth()->user()->nama_pengguna)
        ->get();
      $request->session()->put('nama_pengguna', Auth()->user()->nama_pengguna);
      $request->session()->put('hak_akses', $data['0']->hak_akses);
      $request->session()->put('id_pengguna', $data['0']->id_pengguna);
      return redirect()->intended('dashboard');
    }
    return Redirect::to("login")->withSuccess('Login Gagal');
  }

  public function postRegistration(Request $request)
  {
    request()->validate([
      'nama_pengguna' => 'required',
      'password' => 'required|min:6',
    ]);

    $data = $request->all();
    // dd($data);
    $blog = DB::table('pengguna')->insert([
      'nama_pengguna' => $data['nama_pengguna'],
      'password' => Hash::make($data['password'])
    ]);

    // $check = $this->create($data);

    if ($blog) {
      $data = DB::table('pengguna')
        ->where('nama_pengguna', '=', $request->nama_pengguna)
        ->get();
      $request->session()->put('nama_pengguna', $request->nama_pengguna);
      $request->session()->put('hak_akses', $data['0']->hak_akses);
      $request->session()->put('id_pengguna', $data['0']->id_pengguna);
      return Redirect::to("login")->withSuccess('Selamat Nama anda sudah tersimpan');
    } else {
      return Redirect::to("registration")->withSuccess('Nama anda sudah ada');
    }
  }

  public function dashboard()
  {
    // dd(Auth::check());
    // if (Auth::check()) {
    return view('dashboard');
    // }
    // return Redirect::to("login")->withSuccess('Opps! You do not have access');
  }

  public function create(array $data)
  {
    return User::create([
      'nama_pengguna' => $data['nama_pengguna'],
      'password' => Hash::make($data['password'])
    ]);
  }

  public function logout()
  {
    Session::flush();
    Auth::logout();
    return Redirect('login');
  }
}
