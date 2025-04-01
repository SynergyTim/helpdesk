<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\UnitModel;
use Illuminate\Http\Request;

class HelpdeskController extends Controller
{
    public function index()
    {
        return view('helpdesk.index');
    }

    public function create()
    {
        $category = CategoryModel::select(
            'categories.id',
            'categories.information'
        )
            ->get();

        $units = UnitModel::select(
            'units.id',
            'units.unit'
        )
            ->where('is_admin', 0)
            ->get();

        return view('helpdesk.create', compact('category', 'units'));
    }

    public function store(Request $request) {}

    public function edit($id) {}

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
