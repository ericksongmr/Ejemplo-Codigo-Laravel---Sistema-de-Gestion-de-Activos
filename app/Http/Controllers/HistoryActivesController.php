<?php

namespace SGLCJUJEDU\Http\Controllers;

use Illuminate\Http\Request;
use SGLCJUJEDU\Http\Requests\HistoryActivesRequest;
use SGLCJUJEDU\HistoryActive;
use SGLCJUJEDU\Active;
use Carbon\Carbon;

class HistoryActivesController extends Controller
{

    public function __construct()
    {
        Carbon::setLocale('es');
        setlocale(LC_TIME, 'Spanish_Peru');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->getHistoryActives($request);
        }

        $historyActives = HistoryActive::orderBy('date', 'DESC')->paginate(5);
        $actives        = Active::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.history_actives.index')->with([
                                            'title'          => 'Historial de Activos',
                                            'historyActives' => $historyActives,
                                            'actives'        => $actives,
                                            'active'         => 'actives'
                                        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HistoryActivesRequest $request)
    {
        $active = Active::find($request->active_id);

        if ($request->type == 'Salida' && $request->amount > $active->stock){

            return 'error';

        }else
        {
            $historyActive = new HistoryActive($request->all());
            $historyActive->save();

            if ($request->type == 'Entrada') {

                $active->stock = ($active->stock + $request->amount);

            }else
            {
                $active->stock = ($active->stock - $request->amount);
            }

            $active->save();

            return $this->getHistoryActives($request);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryActive $historyActive)
    {
        $active = Active::find($historyActive->active_id);

        if ($request->type == 'Salida' && $request->amount > $active->stock){

            return 'error';

        }else
        {
            $historyActive->fill($request->all());
            $historyActive->save();

            if ($request->type == 'Entrada') {

                $active->stock = ($active->stock + $request->amount);
                
            }else
            {
                $active->stock = ($active->stock - $request->amount);
            }

            $active->save();

            return $this->getHistoryActives($request);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HistoryActive $historyActive)
    {
        $historyActive->delete();
        return $this->getHistoryActives($request);
    }

    public function getHistoryActives(Request $request)
    {
        $historyActives = HistoryActive::searchType($request->typeFilter)
                                ->searchDate($request->dateFilter)
                                ->orderBy('date', 'DESC')
                                ->paginate($request->nroPages);

        if ($request->report && $request->report == 'true'){
            return response()->json(
                view('admin.history_actives._report')->with(['historyActives' => $historyActives])->render()
            );
        }
        else{
            return response()->json(
                view('admin.history_actives._ajax')->with(['historyActives' => $historyActives])->render()
            );
        }
        
    }
}
