<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\ReportUser;

class Report extends Component
{
    public function render()
    {
        return view('livewire.report');
    }

    public function store(Request $request)
    {
        $uploadedFile = $request->file('upload');
        $uploadPath = 'public/img';
        $uploadedFileName = $uploadedFile->getClientOriginalName();

        ReportUser::create([
            'name' => $request->name_pelapor,
            'nik' => $request->nik,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'gender' => $request->gender,
            'name_terlapor' => $request->name_terlapor,
            'waktu' => $request->waktu,
            'alamat_pelapor' => $request->alamat_pelapor,
            'ktp_terlapor' => $request->ktp_pelapor,
            'kronologi' => $request->kronologi,
            'upload' => $uploadedFileName,
        ]);

        $uploadedFile->storeAs($uploadPath, $uploadedFileName);

        session()->flash('success', 'Data telah berhasil disimpan.');

        return redirect()->back();
    }


}
