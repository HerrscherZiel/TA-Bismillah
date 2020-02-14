<?php

namespace App\Http\Controllers;

use App\Dosen;
use Illuminate\Http\Request;
use App\Imports\DosenImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;




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
        $dosen = Dosen::latest()->paginate(5);;

        return view('admin.dosen.index')->with('dosen', $dosen);



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
        Excel::import(new DosenImport,$file);

        // notifikasi dengan session
        Session::flash('sukses','Data Siswa Berhasil Diimport!');

        $file->move('import_dosen',$nama_file);


        // alihkan halaman kembali
        return redirect('/dosen');

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
//        dd($request->all());

        $dosen = Dosen::findOrFail($request->id_dosen);
        $dosen->update($request->all());

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
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        return redirect()->back()->with('success', 'job has been deleted Successfully');
    }
}
