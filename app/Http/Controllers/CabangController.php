<?php

namespace App\Http\Controllers;

use App\Models\Datacabang;
use App\Models\DataProvinsi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class CabangController extends Controller
{
    public function index()
    {
        $dataCabangs = Datacabang::all();

        $dataProvinsi = DataProvinsi::all();
        return view('dataCabangs.index', compact('dataCabangs', 'dataProvinsi'));
    }

    public function provinsi(string $nama_provinsi)
    {
        $provinsiStrReplace = str_replace('_', ' ', $nama_provinsi);

        $dataCabangs = DB::table('data_cabangs')
            ->join('tbl_provinsi', 'data_cabangs.provinsi', '=', 'tbl_provinsi.nama_provinsi')
            ->select('data_cabangs.kode_cabang', 'data_cabangs.nama_cabang', 'tbl_provinsi.nama_provinsi')
            ->where('data_cabangs.provinsi', '=', $provinsiStrReplace)
            ->get();

        return view('dataCabangs.provinsi', compact('dataCabangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $dataProvinsi = DataProvinsi::all();
        return view('dataCabangs.create', compact('dataProvinsi'));
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

        $dataProvinsi = DataProvinsi::all();
        // 
        return view('dataCabangs.edit', compact('dataCabangs', 'dataProvinsi'));
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
    public function cetak_pdf()
    {
        $dataCabangs = DataCabang::all();

        $pdf = PDF::loadview('dataCabangs.cetak_pdf',['dataCabangs'=>$dataCabangs]);
    	return $pdf->stream(); 
    }
}
