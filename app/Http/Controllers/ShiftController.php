<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Utils\RoleUtils;
use Couchbase\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function array_merge;
use function auth;
use function back;
use function compact;
use function json_decode;
use function json_encode;
use function redirect;
use function time;
use function view;

class ShiftController extends Controller
{

    public function index(Request $request) {
        $user = auth('employee')->user();
        if(!RoleUtils::isPermitted($user->role, RoleUtils::PERM_SHIFT))return back();

        $shiftData = Shift::query()
            ->where('username', $user->username)
            ->where('role', $user->role)
            ->first();
        if(!$shiftData){
            Shift::query()->insert([
                'username' => $user->username,
                'role' => $user->role,
                'start_shift' => false,
                'logs' => '[]'
            ]);
            $shiftData = Shift::query()->where('username', $user->username)->first();
        }

        return view('employees.shifts', compact('shiftData'));
    }

    public function startShift() {
        $user = auth('employee')->user();
        if(!RoleUtils::isPermitted($user->role, RoleUtils::PERM_SHIFT))return back();

        $shiftData = Shift::query()->where('username', $user->username)->first();
        if($shiftData->start_shift)return back();

        $logs = json_decode($shiftData->logs, true);
        $logs = array_merge([['Absen Masuk', time()]], $logs);
        Shift::query()
            ->where('username', $user->username)
            ->update(['start_shift' => true, 'logs' => json_encode($logs)]);

        return redirect()->route('employees.shift');
    }

    public function endShift() {
        $user = auth('employee')->user();
        if(!RoleUtils::isPermitted($user->role, RoleUtils::PERM_SHIFT))return back();

        $shiftData = Shift::query()->where('username', $user->username)->first();
        if(!$shiftData->start_shift)return back();

        $logs = json_decode($shiftData->logs, true);
        $logs = array_merge([['Absen Pulang', time()]], $logs);
        Shift::query()
            ->where('username', $user->username)
            ->update(['start_shift' => false, 'logs' => json_encode($logs)]);

        return redirect()->route('employees.shift');
    }

}
