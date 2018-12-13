<?php

namespace SGLCJUJEDU\Http\Controllers;

use Illuminate\Http\Request;
use SGLCJUJEDU\Active;
use SGLCJUJEDU\Category_Active;
use SGLCJUJEDU\Location;
use SGLCJUJEDU\HistoryActive;
use SGLCJUJEDU\Output;
use SGLCJUJEDU\Job;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
        setlocale(LC_TIME, 'Spanish_Peru');
    }

    public function actives()
    {
    	$actives       = Active::orderBy('name', 'ASC')->paginate(10);
        $categoriesAct = Category_Active::orderBy('id', 'ASC')->pluck('name', 'id');
        $locations     = Location::orderBy('description', 'ASC')->pluck('description', 'id');

    	return view('admin.reports.actives')->with([
											'title'         => 'Reporte de Activos',
											'actives'       => $actives,
											'categoriesAct' => $categoriesAct,
											'locations'     => $locations,
											'active'        => 'reports'
								    		]);
    }

    public function historyActives()
    {
        $historyActives = HistoryActive::orderBy('date', 'DESC')->paginate(5);
        $actives        = Active::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.reports.historyActives')->with([
                                            'title'          => 'Reporte de Historial de Activos',
                                            'historyActives' => $historyActives,
                                            'actives'        => $actives,
                                            'active'         => 'reports'
                                        ]);
    }

    public function outputs()
    {
        $outputs = Output::orderBy('date', 'DESC')->paginate(5);
        $jobs    = Job::orderBy('description', 'ASC')->pluck('description', 'id');

        return view('admin.reports.outputs')->with([
                                            'title'   => 'Reporte de Salidas de Herramientas y Equipos',
                                            'outputs' => $outputs,
                                            'jobs'    => $jobs,
                                            'active'  => 'reports'
                                        ]);
    }

    public function export(Request $request)
    {
        $file = '';

        if ($request->type == 'actives') {
            $file = 'REPORTE DE ACTIVOS ';
        }

        if ($request->type == 'historyActives') {
            $file = 'REPORTE DE HISTORIAL DE ACTIVOS ';
        }

        if ($request->type == 'outputs') {
            $file = 'REPORTE DE SALIDAS DE HERRAMIENTAS Y EQUIPOS ';
        }

        $pdf = \PDF::loadHTML(trans('app.header', ['title' => $file]).$request->htmlInfo.trans('app.footer'));
        $pdf->setPaper('A4', 'landscape');

        if ($request->typeExport == 'download')
        {
            return $pdf->download($file.date('d-m-Y H-i').'.pdf');
        }
        else
        {
            return $pdf->stream($file.date('d-m-Y H-i').'.pdf');
        }
    }
}