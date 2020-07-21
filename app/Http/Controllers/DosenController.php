<?php

namespace App\Http\Controllers;

use App\Dosen;
use Illuminate\Http\Request;
use App\Imports\DosenImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DosenController extends Controller
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

            $dosen = Dosen::all();

            return view('admin.dosen.index')->with('dosen', $dosen);
        
        }

        else {
            return view('errors.403');
        }



//        return view('admin.dosen.index');

    }

    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public

        // import data
        Excel::import(new DosenImport,$file);

        // notifikasi dengan session
        Session::flash('sukses','Data Siswa Berhasil Diimport!');

        $file->move('import_dosen',$nama_file);


        // alihkan halaman kembali
        return redirect('/dosen')->with('success','Berhasil mengimpor data dosen');

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
            'nip' => 'required',
            'namaDosen' => 'required',
            'email' => 'required | email | unique :dosen,email'
        ]);

        $dosen = new Dosen([
            'nip'               => $request->nip,
            'namaDosen'         => $request->namaDosen,
            'email'             => $request->email,
            'statusUser'        => 'Dosen',
            'password'          => bcrypt("12345678"),
            'passwordBackup'    => "12345678"
        ]);
        $dosen->save();

        return back()->with('success','Berhasil menambah dosen');
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
            'nip' => 'required',
            'namaDosen' => 'required',
            'email' => ['required',
                        Rule::unique('dosen', 'email')->ignore($request->id_dosen, 'id_dosen'),
                        ],
        ]);

        $dosen = Dosen::findOrFail($request->id_dosen);
        $dosen->update($request->all());

        return back()->with('success', 'Data Berhasil Diubah');;
    }

    public function reset(Request $request)
    {
        //
        // dd($request);

        $passwordBackup = Dosen::where('id_dosen', '=', $request->id_dosen)->select('passwordBackup')->getQuery()->get();

        foreach($passwordBackup as $pasbc){
            $backup = $pasbc->passwordBackup;
        }

        $dosen = Dosen::findOrFail($request->id_dosen);
        $dosen->password           = bcrypt($backup);
        $dosen->save();

        return back()->with('update','Berhasil mereset password dosen');
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
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
