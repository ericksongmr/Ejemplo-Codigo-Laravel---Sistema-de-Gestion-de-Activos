<?php

namespace SGLCJUJEDU\Http\Controllers;

use Illuminate\Http\Request;
use SGLCJUJEDU\Http\Requests\UsersRequest;
use SGLCJUJEDU\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->getUsers($request);
        }

        $users = User::orderBy('name', 'asc')->paginate(5);

        return view('admin.users.index')->with([
                                            'title'  => 'Gestión de Usuarios',
                                            'users'  => $users,
                                            'active' => 'users'
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
    public function store(UsersRequest $request)
    {
        $user = new User($request->all());
        $user->save();
        return $this->getUsers($request);
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
    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        $user->save();
        return $this->getUsers($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return $this->getUsers($request);
    }

    public function getUsers(Request $request)
    {
        $users = User::orderBy('name', 'asc')->paginate($request->nroPages);

        return response()->json(
                view('admin.users._ajax')->with(['users' => $users])->render()
            );
    }
}
