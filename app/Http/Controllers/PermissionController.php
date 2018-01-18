<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    use BreadTrait;

    protected $objectModel = Permission::class;
    protected $objectName = 'permissions';
    protected $objectIcon = 'fa fa-key';

    public function datatable()
    {
        return $this->getDatatables(Permission::select(['id','name','guard_name']))->make();
    }

    public function create(Request $request)
    {
        $object = $this->objectModel::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);

        if ($request->save == 'browse')
            return redirect()->route("{$this->objectName}");
        elseif ($request->save == 'edit')
            return redirect()->route("{$this->objectName}.edit", ['id' => $object]);
        elseif ($request->save == 'add')
            return redirect()->route("{$this->objectName}.add");
        else
            return redirect($request->previous_url);
    }

    public function update(Request $request, $id)
    {
        $object = $this->objectModel::find($id);
        $object->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);

        if ($request->save == 'browse')
            return redirect()->route("{$this->objectName}");
        elseif ($request->save == 'edit')
            return redirect()->route("{$this->objectName}.edit", ['id' => $object]);
        elseif ($request->save == 'add')
            return redirect()->route("{$this->objectName}.add");
        else
            return redirect($request->previous_url);
    }
}
