<?php

namespace App\Http\Livewire\LaravelExamples;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserManagement extends Component
{
    public function render()
    {
        $users = User::where('role', 'Admin')->get();
        return view('livewire.laravel-examples.user-management', ['users' => $users]);

    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make('password')
        ]);

        session()->flash('success', 'Data saved successfully! Your password is "password"');
        return back();
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);

        if ($user) {
            $updated = $user->update([
                'name' => $request->full_name,
                'email' => $request->email,
                'role' => 'Admin',
            ]);

            if ($updated) {
                session()->flash('success', 'Data saved successfully!');
                return redirect()->route('user-management');
            } else {
                session()->flash('error', 'Failed to update data!');
                return back();
            }
        } else {
            session()->flash('error', 'User not found!');
            return back();
        }
    }



}
