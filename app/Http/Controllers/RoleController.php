<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    use BreadTrait;

    protected $objectModel = Role::class;
    protected $objectName = 'roles';
    protected $objectIcon = 'fa fa-id-card';

    public function datatable()
    {
        return $this->getDatatables($this->objectModel::select(['id','name','guard_name']))->make();
    }

    public function create(Request $request)
    {
        $object = $this->objectModel::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);

        if (!empty($request->permissions)) {
            $object->givePermissionTo($request->permissions);
        }

        return $this->redirect($request, $object);
    }

    public function update(Request $request, $id)
    {
        $object = $this->objectModel::find($id);
        $object->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);

        if (!empty($request->permissions)) {
            $object->syncPermissions($request->permissions);
        } else {
            $object->syncPermissions([]);
        }

        return $this->redirect($request, $object);
    }
}
