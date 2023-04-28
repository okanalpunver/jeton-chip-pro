<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Arr;
use App\Http\Requests\Admin\AdminRequest;

class AdminController extends BaseController
{
    public $model = 'App\Models\Admin';
    
    public $viewBase = 'admin';
    
    public $label = 'Kullanıcılar';
    
    public $singularLabel = 'Kullanıcı';

    public $routeBase = 'admin';

    public function store(AdminRequest $request)
    {
        $this->model::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->status ?? 0,
        ]);

        return $this->redirectTo('index');
    }

    public function update(AdminRequest $request, $id)
    {
        $model = $this->model::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status ?? 0,
        ];

        if ($request->has('password')) {
            # change password if present...
            $data = Arr::add($data, 'password', bcrypt($request->password));
        }

        $model->update($data);

        return $this->redirectTo('index', true);
    }
}
