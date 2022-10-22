<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::paginate(20);
        return view('pages.admin.admin.index', compact('users'));
    }

    public function create()
    {
        return view('pages.admin.admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $validated['role'] = User::ADMIN;

        User::create($validated);

        return view('home')
            ->with([
                'message' => [
                    'type' => 'success',
                    'text' => 'تم إضافة مدير جديد بنجاج',
                ],
            ]);
    }

    public function destroy(User $user){

    }
}
