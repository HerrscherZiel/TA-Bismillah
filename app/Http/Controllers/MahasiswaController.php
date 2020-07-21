<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\MahasiswaProyek;
use App\ProfilMahasiswa;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


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
        if(Auth::guard('admin')->check()) {

            $mahasiswa = Mahasiswa::latest()->get();

            return view('admin.mahasiswa.index')->with('mahasiswa', $mahasiswa);

        }

        else {
            return view('errors.403');
        }



//        return view('admin.dosen.index');

    }

    public function import(Request $request)
    {
        // validasi
        // dd($files);
        // dd($request->file->getMimeType());
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
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
        return redirect('/mahasiswa')->with('success','Berhasil mengimpor data mahasiswa');

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
        $this->validate($request, [
            'nim' => 'required  | unique:mahasiswa,nim',
            'namaMahasiswa' => 'required',
            'statusUser' => 'required'
        ]);

        preg_match('~/(.*?)/SV~', $request->nim, $output);
        $uname = strval($output[1]);

        $mhs = new Mahasiswa([
            'nim'   => $request->get('nim'),
            'username'          => $uname,
            'namaMahasiswa'     => $request->get('namaMahasiswa'),
            'statusUser'        => $request->get('statusUser'),
            'password'          => bcrypt($uname),
            'passwordBackup'    => $uname

        ]);
        $mhs->save();

        $profMhs = new ProfilMahasiswa([
            'mahasiswa_id'   => $mhs->id_mahasiswa,
            'email'          => strtok($request->namaMahasiswa, " ") . '@email' ,
            'pengalaman'     => '-'
        ]);
        $profMhs->save();

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
        $this->validate($request, [
            'nim' => ['required',
                        Rule::unique('mahasiswa', 'nim')->ignore($request->id_mahasiswa, 'id_mahasiswa'),
                        ],
            'namaMahasiswa' => 'required',
            'username' => 'required'
        ]);
        $mahasiswa = Mahasiswa::findOrFail($request->id_mahasiswa);
        $mahasiswa->update($request->all());

        return back()->with('success','Berhasil mengubah data');;
    }

    public function reset(Request $request)
    {
        //
        // dd($request);

        $passwordBackup = Mahasiswa::where('id_mahasiswa', '=', $request->id_mahasiswa)->select('passwordBackup')->getQuery()->get();

        foreach($passwordBackup as $pasbc){
            $backup = $pasbc->passwordBackup;
        }

        $mahasiswa = Mahasiswa::findOrFail($request->id_mahasiswa);
        $mahasiswa->password           = bcrypt($backup);
        $mahasiswa->save();

        return back()->with('update','Berhasil mereset password mahasiswa');
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

        return back()->with('success', 'Berhasil menghapus data');
    }
}
