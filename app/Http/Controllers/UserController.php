<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use BreadTrait;

    protected $objectModel = User::class;
    protected $objectName = 'users';
    protected $objectIcon = 'fa fa-users';

    public function datatable()
    {
        return $this->getDatatables($this->objectModel::select(['id','name','email','status','last_login_at']))
            ->editColumn('last_login_at', function($eloquent) {
                return !empty($eloquent->last_login_at) ? $eloquent->last_login_at->diffForHumans() : '-';
            })
            ->make();
    }

    public function create(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed'
        ]);

        $object = $this->objectModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->status
        ]);

        if (!empty($request->roles)) {
            $object->assignRole($request->roles);
        }

        return $this->redirect($request, $object);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'nullable|confirmed'
        ]);

        $object = $this->objectModel::find($id);
        $object->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status
        ]);

        if (!empty($request->password)) {
            $object->password = bcrypt($request->password);
            $object->save();
        }

        if (!empty($request->roles)) {
            $object->syncRoles($request->roles);
        } else {
            $object->syncRoles([]);
        }

        return $this->redirect($request, $object);
    }
}
