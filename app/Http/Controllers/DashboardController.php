<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportingModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    public function index()
    {

        if (Auth::user()->role == 'admin') {
            $allDataReportings = ReportingModel::select('id')
                ->get();

            $countDataReportings = count($allDataReportings);
            $reportingTable =  DB::table('reporting as r')
                ->join('categories as c', 'r.category_id', '=', 'c.id')
                ->join('units as u', 'r.unit_id', '=', 'u.id')
                ->select('c.information', 'r.*', 'u.unit')
                ->get();

            return view('dashboard.index', compact('countDataReportings', 'reportingTable'));
        } else if (Auth::user()->role == 'user') {

            $allStatusOpens = ReportingModel::select('status')
                ->where('status', 'open')
                ->get();

            $allStatusCloses = ReportingModel::select('status')
                ->where('status', 'close')
                ->get();

            $allDataReportings = ReportingModel::select('id')
                ->get();

            $reportingTable =  DB::table('reporting as r')
                ->join('categories as c', 'r.category_id', '=', 'c.id')
                ->join('units as u', 'r.unit_id', '=', 'u.id')
                ->select('c.information', 'r.*', 'u.unit')
                ->get();

            $countDataReportings = count($allDataReportings);
            $countOpen = count($allStatusOpens);
            $countClose = count($allStatusCloses);

            return view('dashboard.index', compact('countOpen', 'countClose', 'reportingTable', 'countDataReportings'));
        }
    }

    public function print_helpdesk()
    {
        $reportingTable =  DB::table('reporting as r')
            ->join('categories as c', 'r.category_id', '=', 'c.id')
            ->join('units as u', 'r.unit_id', '=', 'u.id')
            ->select('c.information', 'r.*', 'u.unit')
            ->get();

        $pdf = PDF::loadview('dashboard.print_helpdesk', ['helpdesk' => $reportingTable]);
        return $pdf->stream();
    }
}
