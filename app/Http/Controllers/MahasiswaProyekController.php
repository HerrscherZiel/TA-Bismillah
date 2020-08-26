<?php

namespace App\Http\Controllers;

use App\KelasProyek;
use App\Mahasiswa;
use App\MahasiswaProyek;
use App\Periode;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Imports\MahasiswaProyekImport;
use Illuminate\Support\Facades\Auth;



class MahasiswaProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::guard('admin')->check()) {

        $mhsProyek = MahasiswaProyek::join('mahasiswa', 'mahasiswa_id', '=', 'id_mahasiswa')
            ->join('kelasproyek', 'kelasProyek_id', '=', 'id_kelasProyek')
            ->join('periode', 'periode_id', '=', 'id_periode')
            ->select('mahasiswa.*', 'kelasProyek.*', 'periode.*', 'mahasiswaproyek.*')
            ->orderBy('namaKelasProyek')
            ->getQuery()
            ->get();


        $mahasiswa = Mahasiswa::all();
        $kelasproyek = KelasProyek::all();
        $periode = Periode::all();

        return view('admin.mahasiswaproyek.index')->with('mhsProyek', $mhsProyek)
                                                        ->with('mahasiswa', $mahasiswa)
                                                        ->with('kelasProyek', $kelasproyek)
                                                        ->with('periode', $periode);

        }

        else {
            return view('errors.403');
        }

    }

    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand().$file->getClientOriginalName();

        Excel::import(new MahasiswaProyekImport,$file);

        $file->move('import_mahasiswaProyek',$nama_file);

        return back()->with('success','Berhasil mengimpor data');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $rules = [
            'mahasiswa_id' => 'required',
            'kelasProyek_id' => 'required',
            'periode_id' => 'required | unique_with:mahasiswaproyek,mahasiswa_id,kelasProyek_id',
        ];

        $customMessages = [
            'unique_with' => 'Data yang ditambahkan sudah memiliki data yang sama'
        ];

        $this->validate($request,$rules, $customMessages);


        MahasiswaProyek::create($request->all());

        return back()->with('success','Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $rules = [
            'mahasiswa_id' => 'required',
            'kelasProyek_id' => 'required',
            'periode_id' => 'required | unique_with:mahasiswaproyek,mahasiswa_id,kelasProyek_id',
        ];

        $customMessages = [
            'unique_with' => 'Data yang diubah sudah memiliki data yang sama'
        ];

        $this->validate($request,$rules, $customMessages);

        $mhsPro = MahasiswaProyek::findOrFail($request->id_mahasiswaProyek);
        $mhsPro->update($request->all());

        return back()->with('success','Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mhsPro = MahasiswaProyek::findOrFail($id);
        $mhsPro->delete();

        return back()->with('success','Berhasil menghapus data');
    }
}
