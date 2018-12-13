<?php

namespace SGLCJUJEDU\Http\Controllers;

use Illuminate\Http\Request;
use SGLCJUJEDU\Http\Requests\ActivesRequest;
use SGLCJUJEDU\Active;
use SGLCJUJEDU\Category_Active;
use SGLCJUJEDU\Location;
use SGLCJUJEDU\Item;
use Illuminate\Support\Facades\Storage;

class ActivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->getActives($request);
        }

        $actives       = Active::orderBy('name', 'ASC')->paginate(10);
        $categoriesAct = Category_Active::orderBy('id', 'ASC')->pluck('name', 'id');
        $items         = Item::orderBy('description', 'ASC')->pluck('description', 'id');
        $locations     = Location::orderBy('description', 'ASC')->pluck('description', 'id');

        return view('admin.actives.index')->with([
                                            'title'         => 'Gestión de Activos',
                                            'actives'       => $actives,
                                            'categoriesAct' => $categoriesAct,
                                            'items'         => $items,
                                            'locations'     => $locations,
                                            'active'        => 'actives'
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
    public function store(ActivesRequest $request)
    {
        $active = new Active($request->all());
        $active->save();
        return $this->getActives($request);
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
    public function update(Request $request, Active $active)
    {
        if (!empty($request->photo) && !empty($active->photo)) {
            Storage::delete('public/uploads/photos/' . $active->photo);
        }

        $active->fill($request->all());
        $active->save();
        return $this->getActives($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Active $active)
    {
        if (!empty($active->photo)) {
            Storage::delete('public/uploads/photos/' . $active->photo);
        }
        
        $active->delete();
        return $this->getActives($request);
    }

    public function getActives(Request $request)
    {
        $actives = Active::searchActive($request->active)
                         ->searchCategoryAct($request->categoryAct)
                         ->searchLocation($request->location)
                         ->orderBy('name', 'ASC')
                         ->paginate($request->nroPages);

        if ($request->report && $request->report == 'true') {
            return response()->json(
                view('admin.actives._report')->with(['actives' => $actives])->render()
            );
        }
        else{
            return response()->json(
                view('admin.actives._ajax')->with(['actives' => $actives])->render()
            );
        }
    }
}