<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CategoryModel::select(
            'categories.id',
            'categories.information',
            'units.unit'
        )
            ->join('units', 'categories.unit_id', '=', 'units.id')
            ->get();

        return view('category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'information' => 'required|max:80',
            'unit_id' => 'required|numeric'
        ], [
            'information.required' => 'Kategori Laporan tidak boleh kosong.',
            'information.max' => 'Batas karakter tidak boleh lebih dari 80 karakter.',
            'unit_id.required' => 'Unit penanggung jawab tidak boleh kosong.',
            'unit_id.numeric' => 'Unit penanggung jawab tidak valid.'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            CategoryModel::create([
                'information' => trim($request->input('information')),
                'unit_id' => trim($request->input('unit_id'))
            ]);

            Session::flash('success', 'Berhasil menambahkan kategori laporan.');
            return redirect('/category');
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
        $data = CategoryModel::find($id);

        return view('category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'information' => 'required|max:80',
            'unit_id' => 'required|numeric'
        ], [
            'information.required' => 'Kategori Laporan tidak boleh kosong.',
            'information.max' => 'Batas karakter tidak boleh lebih dari 80 karakter.',
            'unit_id.required' => 'Unit penanggung jawab tidak boleh kosong.',
            'unit_id.numeric' => 'Unit penanggung jawab tidak valid.'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $category = CategoryModel::find($id);
            $category->information = trim($request->input('information'));
            $category->unit_id = trim($request->input('unit_id'));
            $category->save();

            Session::flash('success', 'Berhasil mengupdate kategori laporan.');
            return redirect('/category');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = CategoryModel::find($id);
        $category->delete();

        Session::flash('success', 'Berhasil menghapus kategori laporan.');
        return redirect('/category');
    }
}
