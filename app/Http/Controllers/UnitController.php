<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UnitModel::where('is_admin', 0)->get();

        return view('unit.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'unit' => 'required|unique:units|max:50'
        ], [
            'unit.required' => 'Unit tidak boleh kosong.',
            'unit.unique' => 'Unit sudah ada.',
            'unit.max' => 'Batas karakter tidak boleh lebih dari 50 karakter.'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            UnitModel::create([
                'unit' => trim($request->input('unit')),
                'is_admin' => 0
            ]);

            Session::flash('success', 'Berhasil menambahkan data unit.');
            return redirect('/unit');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = UnitModel::find($id);

        return view('unit.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'unit' => 'required|unique:units|max:50'
        ], [
            'unit.required' => 'Unit tidak boleh kosong.',
            'unit.unique' => 'Unit sudah ada.',
            'unit.max' => 'Batas karakter tidak boleh lebih dari 50 karakter.'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $unit = trim($request->input('unit'));
            UnitModel::where('id', $id)->update(['unit' => $unit]);
            Session::flash('success', 'Berhasil mengupdate unit.');
            return redirect('/unit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = UnitModel::find($id);
        $unit->delete();

        Session::flash('success', 'Berhasil menghapus unit.');
        return redirect('/unit');
    }
}
