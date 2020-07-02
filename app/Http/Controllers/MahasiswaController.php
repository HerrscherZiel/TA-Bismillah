<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\MahasiswaProyek;
use App\ProfilMahasiswa;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        return view('admin.mahasiswa.index');

        $mahasiswa = Mahasiswa::latest()->get();

        return view('admin.mahasiswa.index')->with('mahasiswa', $mahasiswa);



//        return view('admin.dosen.index');

    }

    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public

        // import data
        Excel::import(new MahasiswaImport,$file);

        // notifikasi dengan session
        Session::flash('sukses','Data Siswa Berhasil Diimport!');

        $file->move('import_mahasiswa',$nama_file);


        // alihkan halaman kembali
        return redirect('/mahasiswa');

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
        //
//        Mahasiswa::create($request->all());

        preg_match('~/(.*?)/SV~', $request->nim, $output);
        $a = strval($output[1]);

//        dd($a);

        $mhs = new Mahasiswa([
            'nim'   => $request->get('nim'),
            'username'          => $a,
            'namaMahasiswa'     => $request->get('namaMahasiswa'),
            'statusUser'        => $request->get('statusUser'),
            'password'          => bcrypt($a),
            'passwordBackup'    => bcrypt($a)

        ]);
        $mhs->save();

        $profMhs = new ProfilMahasiswa([
            'mahasiswa_id'   => $mhs->id_mahasiswa,
            'email'          => 'email',
            'pengalaman'     => '-'
        ]);
        $profMhs->save();

        return back();
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
        $mahasiswa = Mahasiswa::findOrFail($request->id_mahasiswa);
        $mahasiswa->update($request->all());

        return back();
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->back()->with('success', 'job has been deleted Successfully');
    }
}
