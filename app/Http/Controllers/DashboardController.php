<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class DashboardController extends Controller
{

    public function index (){

        $data['title'] = 'Data Mahasiswa';

        $mahasiswa = new Mahasiswa();
        $data['mahasiswa'] = $mahasiswa->get_all_mahasiswa();

        return view('dashboard', $data);
    }

    public function create()
    {
        return view('add-data');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nrp' => 'required|String|max:10|unique:mahasiswa,nrp',
            'nama' => 'required|String|max:50',
            'email' => 'required|email|max:255|unique:mahasiswa,email'
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->insert_into_mahasiswa($request->nrp, $request->nama, $request->email);

        return redirect('dashboard')->with('status', 'Data Berhasil Dibuat');
    }
    public function edit(String $nrp)
    {
        $mahasiswa = new Mahasiswa();
        $datamahasiswa = $mahasiswa->get_mahasiswa($nrp);

        if (empty($datamahasiswa) || !isset($datamahasiswa[0])) {
            alert(404, 'Data Mahasiswa Tidak Ditemukan');
        }
        $data['mahasiswa'] = $datamahasiswa[0];

        return view('edit-data', $data);
    }
    public function update(Request $request, String $nrp)
    {
        $request->validate([
            'nama' => 'required|String|max:50',
            'email' => 'required|email|max:255|unique:mahasiswa,email,' . $nrp . ',nrp'
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->update_mahasiswa($request->nama, $request->email, $nrp);

        return redirect('dashboard')->with('status', 'Data Berhasil Diupdate');
    }
    public function destroy(String $nrp)
    {
        $mahasiswa = new Mahasiswa();
        $mahasiswa->delete_mahasiswa($nrp);

        return redirect('dashboard')->with('status', 'Data Berhasil Dihapus');
    }
}
