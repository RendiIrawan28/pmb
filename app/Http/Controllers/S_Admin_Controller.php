<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class S_Admin_Controller extends Controller
{
    public function show()
    {
        $admins = User::where('id_role', 2)->get();
        return response()->json(['data_admin' => $admins]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user->save();

        // Mengembalikan respons sukses
        return response()->json(['message' => 'Data berhasil disimpan'], 201);
    }

    public function destroy($id)
    {
        $alumnis = User::findOrFail($id);
        $alumnis->delete();

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }

}
