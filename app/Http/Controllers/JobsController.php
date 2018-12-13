<?php

namespace SGLCJUJEDU\Http\Controllers;

use Illuminate\Http\Request;
use SGLCJUJEDU\Http\Requests\JobsRequest;
use SGLCJUJEDU\Job;
use SGLCJUJEDU\Active;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->getJobs($request);
        }

        $jobs = Job::orderBy('description', 'asc')->paginate(5);

        return view('admin.jobs.index')->with([
                                            'title'  => 'Gestión de Trabajos',
                                            'jobs'   => $jobs,
                                            'active' => 'jobs'
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
    public function store(JobsRequest $request)
    {
        $job = new Job($request->all());
        $job->save();
        return $this->getJobs($request);
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
    public function update(Request $request, Job $job)
    {
        $job->fill($request->all());
        $job->save();
        return $this->getJobs($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Job $job)
    {
        $job->delete();
        return $this->getJobs($request);
    }

    public function getJobs(Request $request)
    {
        $jobs = Job::orderBy('description', 'ASC')->paginate($request->nroPages);

        return response()->json(
                view('admin.jobs._ajax')->with(['jobs' => $jobs])->render()
            );
    }

    public function assign(Request $request, Job $job)
    {
        if ($request->isMethod('post')) {
            
            $job->actives()->sync($request->actives);

            return redirect()->route('jobs.index')->with([
                                                'message' => 'Los Activos se han Agregado Exitosamente!'
                                                ]);
        }

        $actives = Active::where('category_active_id', 11)
                         ->orWhere('category_active_id', 12)
                         ->plucK('name', 'id');

        return view('admin.jobs.assign')->with([
                                            'title'   => 'Asignar Activos',
                                            'job'     => $job,
                                            'actives' => $actives,
                                            'active'  => 'jobs'
                                        ]);
    }
}
