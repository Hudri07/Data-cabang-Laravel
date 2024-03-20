<?php

namespace App\Http\Controllers;

use App\Models\Datacabang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CabangController extends Controller
{
    public function index()
    {
        $dataCabangs = Datacabang::all();
        return view('dataCabangs.index', compact('dataCabangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dataCabangs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_cabang' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'nomer_telepon' => 'required|numeric|min:12',
            'email' => 'required',
            'deskripsi' => 'required|min:5'
        ]);
        DataCabang::create($request->all());

        return redirect()->route('dataCabangs.index')->with('success', 'Data Cabang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $dataCabang): View
    {
        //Get Data Cabang By Id
        $dataCabangs = DataCabang::findorfail($dataCabang);

        // 
        return view('dataCabangs.show', compact('dataCabangs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($dataCabang): View
    {
        $dataCabangs = DataCabang::findorfail($dataCabang);
        // 
        return view('dataCabangs.edit', compact('dataCabangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $dataCabang): RedirectResponse
    {
        $this->validate($request, [
            'nama_cabang' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'nomer_telepon' => 'required|numeric|min:12',
            'email' => 'required',
            'deskripsi' => 'required|min:5'
        ]);

        $dataCabangs = DataCabang::findorfail($dataCabang);
        $dataCabangs->update($request->all());
        return redirect()->route('dataCabangs.index')->with('success', 'Data Cabang Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($dataCabang): RedirectResponse
    {
        // Get data cabang By Id
        $dataCabangs = DataCabang::findOrfail($dataCabang);

        // Delete data cabang
        $dataCabangs->delete();

        return redirect()->route('dataCabangs.index')->with(['success' => 'Data berhasil Dihapus']);
    }
}
