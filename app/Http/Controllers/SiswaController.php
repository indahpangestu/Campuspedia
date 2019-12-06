<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::paginate(5);
        return view('v1.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v1.create');
    }


    public function find(Request $request)
    {
        $find = $request->keyword;
        $siswas = Siswa::where('nama', 'like', "%".$find."%")->paginate(5);
        return view('v1.index', compact('siswas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa = $this->validate(request(), [
            'nama' => 'required',
            'nohp' => 'required',
            'email' => 'required'
            ]);
            Siswa::create($siswa);
            return redirect('v1')->with('success', 'Siswa has been added');;  
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        $siswa = Siswa::find($id);
        return view('v1.show', compact('siswa','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('v1.edit',compact('siswa','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $this->validate(request(), [
        'nama' => 'required',
        'nohp' => 'required',
        'email' => 'required',
        ]);
        $siswa->nama = $request->get('nama');
        $siswa->nohp = $request->get('nohp');
        $siswa->email = $request->get('email');
        $siswa->save();
        return redirect('v1')->with('success','Data siswa has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('v1')->with('success','Data siswa has been deleted');
    }
}
