<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminRequest;
use Illuminate\Support\Arr;

class UserController extends BaseController
{
    public $model = 'App\Models\Admin';
    
    public $viewBase = 'admin';
    
    public $label = 'Kullanıcılar';
    
    public $singularLabel = 'Kullanıcı';

    public $routeBase = 'admin';

    public function getNestedUsers(){
        $user = \App\Models\User::query()->get()->nest();
        return view('admin.users.index',compact('user'));
    }


}
