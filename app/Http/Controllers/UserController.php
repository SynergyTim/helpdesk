<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UnitModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = User::where('users.role', 'user')
            ->where('units.is_admin', 0)
            ->join('units', 'users.unit_id', '=', 'units.id')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'units.unit'
            )
            ->get();

        return view('users.index', compact('data'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'unit_id' => 'required|numeric',
            'role' => 'required'
        ], [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.max' => 'Nama tidak boleh lebih dari 50 karakter.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah ada.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password_confirmation.required' => 'Konfirmasi password tidak boleh kosong.',
            'unit_id.required' => 'Unit harus tidak boleh kosong.',
            'unit_id.numeric' => 'Unit tidak valid.',
            'role.required' => 'Level harus dipilih.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => trim($request->input('name')),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'unit_id' => trim($request->input('unit_id')),
            'role' => trim($request->input('role'))
        ]);

        Session::flash('success', 'User berhasil ditambahkan.');
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $data = User::where('users.id', $id)
            ->join('units', 'users.unit_id', '=', 'units.id')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.role',
                'units.unit'
            )
            ->first();

        return view('users.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed',
            'password_confirmation' => 'nullable',
            'unit_id' => 'required|numeric',
            'role' => 'required'
        ];

        $checkUserDatabase = User::select(
            'id',
            'email'
        )
            ->where('email', trim($request->input('email')))
            ->first();

        $currentUser = Auth::user()->id;

        // Cel jika ada email yang sama dari user lain
        if ($checkUserDatabase && trim($request->input('email')) == $checkUserDatabase->email && $currentUser != $checkUserDatabase->id) {
            $rules['email'] = 'required|email|unique:users';
        } else {
            $rules['email'] = 'required|email';
        }

        $validator = Validator::make($request->all(), $rules, [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.max' => 'Nama tidak boleh lebih dari 50 karakter.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah ada.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'unit_id.required' => 'Unit tidak boleh kosong.',
            'unit_id.numeric' => 'Unit tidak valid',
            'role.required' => 'Level harus dipilih.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);

        $user->name = trim($request->input('name'));
        $user->email = $request->input('email');
        $user->unit_id = trim($request->input('unit_id'));
        $user->role = trim($request->input('role'));

        // Jika password diisi, maka update password
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        Session::flash('success', 'User berhasil diperbarui.');
        return redirect()->route('users.index');
    }


    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        Session::flash('success', 'User berhasil dihapus.');
        return redirect()->route('users.index');
    }
}
