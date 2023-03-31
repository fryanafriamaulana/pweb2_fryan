<?php

namespace App\Http\Controllers;

use App\Models\bayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = bayar::where('nama', 'like', "%$katakunci%")
                ->orWhere('jurusan', 'like', "%$katakunci%")
                ->orWhere('telp', 'like', "%$katakunci%")
                ->orWhere('tagihan', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = bayar::orderBy('nama', 'desc')->paginate($jumlahbaris);
        }
        return view('ukt.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ukt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('jurusan', $request->jurusan);
        Session::flash('telp', $request->telp);
        Session::flash('tagihan', $request->tagihan);

        $request->validate([
            'nama' => 'required:bayar,nama',
            'jurusan' => 'required',
            'telp' => 'required',
            'tagihan' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
            'telp.required' => 'Telp wajib diisi',
            'tagihan.required' => 'Tagihan wajib diisi',
        ]);
        $data = [
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'telp' => $request->telp,
            'tagihan' => $request->tagihan,
        ];
        bayar::create($data);
        return redirect()->to('bayar')->with('success', 'Berhasil menambahkan data');
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
        $data = bayar::where('nama', $id)->first();
        return view('ukt.edit')->with('data', $data);
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
        $request->validate([

            'jurusan' => 'required',
            'telp' => 'required',
            'tagihan' => 'required',
        ], [

            'jurusan.required' => 'Jurusan wajib diisi',
            'telp.required' => 'Telp wajib diisi',
            'tagihan.required' => 'Tagihan wajib diisi',
        ]);
        $data = [
            
            'jurusan' => $request->jurusan,
            'telp' => $request->telp,
            'tagihan' => $request->tagihan,
        ];
        bayar::where('nama', $id)->update($data);
        return redirect()->to('bayar')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        bayar::where('nama', $id)->delete();
        return redirect()->to('bayar')->with('success', 'Berhasil melakukan delete data');
    }
}
