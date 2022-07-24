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
    // dd($request->name);
    request()->validate([
      'name' => 'required',
      'password' => 'required',
    ]);
    $credentials = $request->only('name', 'password');
    // dd(Auth::attempt($credentials));
    
    if (Auth::attempt($credentials)) {
      // dd('haloo'); 
      // Auth::login($credentials);
      $data = DB::table('user')
        ->where('name', '=', Auth()->user()->name)
        ->get();
      $request->session()->put('name', Auth()->user()->name);
      $request->session()->put('hak_akses', $data['0']->hak_akses);
      $request->session()->put('id_user', $data['0']->id_user);
      $ses_user = Session::get('name');
      return redirect()->intended('dashboard')->with('success','Selamat Datang User '.$ses_user);
    }
    return Redirect::to("login")->with('error','Login Gagal');
  }

  public function postRegistration(Request $request)
  {
    request()->validate([
      'name' => 'required',
      'password' => 'required|min:6',
    ]);

    $data = $request->all();
    // dd($data);
    $blog = DB::table('user')->insert([
      'name' => $data['name'],
      'password' => Hash::make($data['password'])
    ]);

    // $check = $this->create($data);

    if ($blog) {
      $data = DB::table('user')
        ->where('name', '=', $request->name)
        ->get();
      $request->session()->put('name', $request->name);
      $request->session()->put('hak_akses', $data['0']->hak_akses);
      $request->session()->put('id_user', $data['0']->id_user);
      return Redirect::to("login")->withSuccess('Selamat Nama anda sudah tersimpan');
    } else {
      return Redirect::to("registration")->with('error','Nama anda sudah ada');
    }
  }

  public function dashboard()
  {
    return view('dashboard');
  }
  
  public function transaksi()
  {
    return view('transaksi');
  }

  public function laporan()
  {
    return view('laporan');
  }
  
  public function pengaturan()
  {
    return view('pengaturan');
  }
  
  public function about()
  {
    return view('about');
  }

  public function create(array $data)
  {
    return User::create([
      'name' => $data['name'],
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
