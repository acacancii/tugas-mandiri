<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Role;
use App\Models\Profile;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        DB::transaction(function () use ($validated) {
            $profile = Profile::create([
                'umur' => 0,
                'bio' => '-',
                'alamat' => '-',
            ]);

            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $validated['password'], // otomatis ter-hash oleh cast 'hashed'
                'role_id' => $validated['role_id'],
                'profile_id' => $profile->id,
            ]);
        });

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Aturan khusus: Admin TIDAK boleh menurunkan role-nya sendiri dari admin
        if (Auth::id() === $user->id && (int) $validated['role_id'] !== 2) {
            return back()->with('error', 'Anda tidak boleh menurunkan role akun Anda sendiri dari admin.');
        }

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role_id' => $validated['role_id'],
        ];

        // Jika password diisi, perbarui password (otomatis ter-hash oleh cast 'hashed')
        if (!empty($validated['password'])) {
            $data['password'] = $validated['password'];
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        // Aturan khusus: Admin TIDAK boleh menghapus akunnya sendiri
        if (Auth::id() === $user->id) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        DB::transaction(function () use ($user) {
            // Hapus dulu Kritik milik user tersebut
            $user->kritiks()->delete();

            $profile = $user->profile;
            $user->delete();

            if ($profile) {
                $profile->delete();
            }
        });

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus beserta profil dan kritiknya.');
    }
}
