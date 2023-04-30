<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seller;
use App\Models\User;

class UserController extends BaseController
{
    public $model = 'App\Models\Admin';

    public $viewBase = 'admin';

    public $label = 'Kullanıcılar';

    public $singularLabel = 'Kullanıcı';

    public $routeBase = 'admin';

    private $array = [];

    public function getNestedUsers()
    {
        $users = User::query()
//                     ->where('parent_id', null)
                     ->paginate(30);
        return view('admin.users.index', compact('users'));
    }

    public function getNestedUserList($id)
    {

        return view('admin.users.hierarchy', compact('id'));
    }

    public function updateStatusAsActive($id)
    {

        User::query()
            ->where('id', $id)
            ->update([
                         'status' => 0
                     ]);

        return redirect()->back();


    }

    public function updateStatusAsPassive($id)
    {

        User::query()
            ->where('id', $id)
            ->update([
                         'status' => 1
                     ]);

        return redirect()->back();


    }

    public function updateUserAsSeller($id)
    {

        $user = User::query()
                    ->find($id);

        Seller::create([
                           'name' => $user->name,
                           'email' => $user->email,
                           'phone' => $user->phone,
                           'qty' => 0,
                           'amount' => 0,
                           'status' => $user->status ?? 0,
                       ]);


        return redirect()->back();

    }


    public function getUserHierarchy($id)
    {
        $user = \App\Models\User::query()
                                ->with('children')
                                ->where('id', $id)
                                ->first();

        $this->recursiveUserMap($user, $this->array);


        return response()->json($this->array);

    }

    public function recursiveUserMap($user, $array)
    {

        $this->array += [
            $user->id => [
                'value' => $user->name,
                'parent' => $user->parent_id
            ]
        ];


        $childs = User::query()
                      ->with('children')
                      ->where('parent_id', $user->id)
                      ->get();


        foreach ($childs as $user) {


            $this->array += [
                $user->id => [
                    'value' => $user->name,
                    'parent' => $user->parent_id
                ]
            ];

            $this->recursiveUserMap($user, $this->array);


        }


    }


}
