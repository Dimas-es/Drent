<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Tambahkan validasi
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'driver_license_number' => 'nullable|string|max:50|unique:users', // Tambahkan validasi unique
            'license_expiry_date' => 'required|date',
            'ktp_photo' => 'nullable|string',
            'license_photo' => 'nullable|string',
            'verification_status' => 'required|boolean',
            'password' => 'required|string|min:8', // Tambahkan validasi password
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Hash password sebelum menyimpan user baru
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        return new UserResource($user);
    }
}
