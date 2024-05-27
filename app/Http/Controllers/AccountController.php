<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function change_name(Request $request)
    {

        try {

            $user = User::where("nrp", $request->nrp)->first(); // ambil data user

            if ($user) {

                $user->update(["nama" => $request->nama]); // update nama user

                return response()->json([
                    "status"  => "success",
                    "message" => "Berhasil ubah nama.",
                ]);
            } else {
                return response()->json([
                    "status"  => "error",
                    "message" => "NRP tidak ditemukan!",
                ]);
            }
        } catch (Exception $e) {
            // Error
            return response()->json([
                "status"  => "error",
                "message" => "Error pada sistem!",
            ]);
        }
    }

    public function change_password(Request $request)
    {

        try {

            $user = User::where("nrp", $request->nrp)->first(); // ambil data user

            // Jika nrp ada
            if ($user) {

                if (Auth::attempt(['nrp' => $request->nrp, 'password' => $request->password_lama])) {

                    // Jika password lama benar
                    $user->update(["password" => Hash::make($request->password_baru)]); // update password user
                    return response()->json([
                        "status"  => "success",
                        "message" => "Berhasil ubah password.",
                    ]);
                } else {
                    // Jika password lama salah
                    return response()->json([
                        "status"  => "error",
                        "message" => "Password lama salah.",
                    ]);
                }
            } else {
                // Jika nrp tidak ada
                return response()->json([
                    "status"  => "error",
                    "message" => "NRP tidak ditemukan!",
                ]);
            }
        } catch (Exception $e) {
            // Error
            return response()->json([
                "status"  => "error",
                "message" => "Error pada sistem!",
            ]);
        }
    }

    public function change_ttd(Request $request)
    {

        try {

            $user = User::where("nrp", $request->nrp)->first(); // ambil data user

            if ($user) {

                $user->update(["ttd" => $request->ttd]); // update ttd user

                return response()->json([
                    "status"  => "success",
                    "message" => "Berhasil ubah tanda tangan.",
                ]);
            } else {
                return response()->json([
                    "status"  => "error",
                    "message" => "NRP tidak ditemukan!",
                ]);
            }
        } catch (Exception $e) {
            // Error
            return response()->json([
                "status"  => "error",
                "message" => "Error pada sistem!",
            ]);
        }
    }
}
