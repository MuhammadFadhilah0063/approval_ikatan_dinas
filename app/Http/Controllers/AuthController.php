<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view("login.index");
    }

    public function login(Request $request)
    {
        try {
            $nrp = $request->nrp;
            $password = $request->password;

            if (Auth::attempt(['nrp' => $nrp, 'password' => $password])) {
                // Berhasil
                return response()->json([
                    "status"  => "success",
                    "message" => "Berhasil login."
                ]);
            } else {
                // Gagal
                return response()->json([
                    "status"  => "failed",
                    "message" => "NRP atau Password anda salah!"
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                "status"  => "error",
                "message" => "Error pada sistem!",
                "error"   => $e->getMessage()
            ]);
        }
    }

    public function changePassword(Request $request)
    {
        try {

            $user = User::findOrFail($request->id);

            if (Hash::check($request->password_lama, $user->password)) {
                $user->update([
                    'password' => Hash::make(trim($request->password_baru)),
                ]);
            } else {
                return response()->json([
                    "status"  => "failed",
                    "message" => "Gagal ubah password"
                ]);
            }

            return response()->json([
                "status"  => "success",
                "message" => "Berhasil ubah password"
            ]);
        } catch (QueryException $e) {
            return response()->json([
                "status"  => "failed",
                "message" => $e->getMessage()
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            "status"  => "success",
            "message" => "Berhasil logout."
        ]);
    }
}
