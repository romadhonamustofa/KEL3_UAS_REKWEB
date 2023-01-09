<?php 

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;


use App\Models\MahasiswaBaru;

class ControllerMahasiswaBaru extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();
        $mahasiswabaru = MahasiswaBaru::create($data);

        return response()->json($mahasiswabaru);
    }

    public function index()
    {
        $mahasiswabaru = MahasiswaBaru::all();
        return response()->json($mahasiswabaru);
    }

    public function detail($id)
    {
        $mahasiswabaru = MahasiswaBaru::find($id);
        return response()->json($mahasiswabaru);
    }

    public function update(Request $request, $id)
    {
        $mahasiswabaru = MahasiswaBaru::whereId($id)->update([
            'nama' => $request->input('nama'),
            'asal_sekolah' => $request->input('asal_sekolah'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
        ]);

        if($mahasiswabaru){
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Diupdate',
                'data' => $mahasiswabaru
            ],201);
        } else{
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Diupdate',
            ],400);
        }
    }

    public function delete($id)
    {
        $mahasiswabaru = MahasiswaBaru::whereId($id)->first();
        $mahasiswabaru->delete();

        if($mahasiswabaru)
        {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil dihapus'
            ],200);
        }
    }
}