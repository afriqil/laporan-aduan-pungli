<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ReportUser;

class Dashboard extends Component
{
    public function render()
    {
        $users = ReportUser::all();
        return view('livewire.dashboard', ['users' => $users]);
    }
}
