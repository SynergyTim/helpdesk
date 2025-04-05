<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\UnitModel;
use App\Models\ReportingModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HelpdeskController extends Controller
{
    public function index()
    {
        $reporting = DB::table('reporting as r')
            ->join('categories as c', 'r.category_id', '=', 'c.id')
            ->join('units as u', 'r.unit_id', '=', 'u.id')
            ->select('c.information', 'r.*', 'u.unit')
            ->get();

        return view('helpdesk.index', compact('reporting'));
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

    public function store(Request $request)
    {
        $request->validate([
            'reporter' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'category_id' => 'required|numeric',
            'unit_id' => 'required|numeric',
            'complaint' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/uploads'), $filename);
        }

        $ticket = ReportingModel::create([
            'reporter' => trim($request->input('reporter')),
            'division' => trim($request->input('division')),
            'phone_number' => trim($request->input('phone_number')),
            'category_id' => trim($request->input('category_id')),
            'unit_id' => trim($request->input('unit_id')),
            'complaint' => trim($request->input('complaint')),
            'photo' => ($request->hasFile('photo') ? $filename : null),
            'status' => 'open'
        ]);

        return redirect()->route('helpdesk.show', $ticket->id)->with('success', 'Data berhasil ditambahkan');
    }


    public function edit($id)
    {
        $ticket = ReportingModel::findOrFail($id);

        $category = CategoryModel::select('id', 'information')->get();
        $units = UnitModel::select('id', 'unit')->where('is_admin', 0)->get();

        return view('helpdesk.edit', compact('ticket', 'category', 'units'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'status' => 'required|string|max:5',
            'officer' => 'required|string|max:35',
            'handling' => 'required|string',
            'updated_at' => 'required|date_format:Y-m-d\TH:i'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $status = (trim(strtolower(($request->input('status')))) == 'open' ? 'open' : 'close');
            $officer = trim($request->input('officer'));
            $handling = trim($request->input('handling'));
            $updated_at = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('updated_at'))->format('Y-m-d H:i:s');

            ReportingModel::where('id', $id)->update([
                'status' => $status,
                'officer' => $officer,
                'handling' => $handling,
                'updated_at' => $updated_at
            ]);

            Session::flash('success', 'Data helpdesk berhasil diupdated!');
            return redirect('/helpdesk');
        }
    }

    public function show($id)
    {
        $reporting = ReportingModel::with(['category', 'unit'])->findOrFail($id);
        return view('helpdesk.show', compact('reporting'));
    }

    public function destroy($id) {}
}
