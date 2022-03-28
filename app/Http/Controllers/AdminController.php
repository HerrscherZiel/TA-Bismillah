<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use DB;



class AdminController extends Controller
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
            $ids = Auth::guard('admin')->user()->id_admin;
            $admin = Admin::all();
            // dd($ids);
            $superadmin = Admin::where('statusUser', '=', 'SuperAdmin')
                                    ->select('statusUser', 'id_admin')
                                    ->getQuery()
                                    ->get();
                                    // dd($superadmin);


            return view('admin.admin.index')->with('admin', $admin)
                                            ->with('superadmin', $superadmin)
                                            ->with('ids', $ids);
        
        }

        else {
            return view('errors.403');
        }

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
            'namaAdmin' => 'required',
            'email' => 'required | email | unique :admin,email'
        ]);

        $admin = new Admin([
            'nip'               => $request->nip,
            'namaAdmin'         => $request->namaAdmin,
            'email'             => $request->email,
            'statusUser'        => 'Admin',
            'password'          => bcrypt("admin123"),
            'passwordBackup'    => "admin123"
        ]);
        $admin->save();

        return back()->with('success','Berhasil menambah admin');

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
            'namaAdmin' => 'required',
            'email' => ['required',
                        Rule::unique('admin', 'email')->ignore($request->id_admin, 'id_admin'),
                        ],
        ]);

        $admin = Admin::findOrFail($request->id_admin);
        $admin->update($request->all());


        return back()->with('update','Berhasil merubah admin');

    }

    public function reset(Request $request)
    {
        //
        // dd($request);

        $passwordBackup = Admin::where('id_admin', '=', $request->id_admin)
                                ->select('passwordBackup')->getQuery()->get();

        foreach($passwordBackup as $pasbc){
            $backup = $pasbc->passwordBackup;
        }

        // dd($backup);
        $admin = Admin::findOrFail($request->id_admin);
        $admin->password           = bcrypt($backup);
        $admin->save();

        return back()->with('update','Berhasil mereset password admin');
        
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
        
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
