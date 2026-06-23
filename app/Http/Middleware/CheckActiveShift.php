<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shift;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class CheckActiveShift
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('employee')->user() ?? Auth::user();

        if (!$user) {
            return redirect('/employees/login');
        }

        if ($user->role === 'manager') {
            return $next($request);
        }

        $shiftData = Shift::where('username', $user->username)->first();

        if ($shiftData && $shiftData->start_shift == 1) {
            return $next($request);
        }

        return redirect()->route('employees.shift')->with('error', 'Akses ditolak. Anda harus absen shift terlebih dahulu!');
    }
}