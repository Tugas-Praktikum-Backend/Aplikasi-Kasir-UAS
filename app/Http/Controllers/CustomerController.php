<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers.index');
    }

    public function create()
    {
        return view('auth.customerregister');
    }

    public function login()
    {
        return view('auth.customerlogin');
    }

    public function changeusername()
    {
        return view('customers.changeusername');
    }

    public function updateusername(Request $request)
    {
        $customer = Auth::user();

        if ($request->old_username !== $customer->username) {
            return back()->withErrors(['old_username' => 'Username lama tidak sesuai.']);
        }

        $request->validate([
            'new_username' => 'required|string|min:3|unique:customers,username,' . $customer->id,
        ]);

        $customer->update([
            'username' => $request->new_username
        ]);

        return redirect()->route('customers.index')->with('success', 'Username berhasil diganti!');
    }

    public function changepassword()
    {
        return view('customers.changepassword');
    }

    public function updatepassword(Request $request)
    {
        $customer = Auth::user();

        if (!Hash::check($request->old_password, $customer->password)) {
            return back()->withErrors(['old_password' => 'Password lama salah.']);
        }

        $request->validate([
            'new_password' => 'required|string|min:6',
        ]);

        $customer->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('customers.index')->with('success', 'Password berhasil diganti!');
    }

    public function destroy()
    {
        $customer = Auth::user();

        Auth::logout();

        $customer->delete();

        return redirect('/')->with('success', 'Akun Anda telah berhasil dihapus.');
    }
}
