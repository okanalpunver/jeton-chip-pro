<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Requests\Admin\Site\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends BaseController
{
    public $relation = 'categories';
    
    public $viewBase = 'site.category';
    
    public $label = 'Kategoriler';
    
    public $singularLabel = 'Kategori';

    public $routeBase = 'site.category';

    public function store(CategoryRequest $request)
    {
        if ($request->hasFile('photo')) {

            $path = $request->photo->store('images', 'public');
            
            $data = [
                'name' => $request->name,
                'photo' => $path,    
            ];

        } else {
            $data = [
                'name' => $request->name,
            ];
        }

        $this->site->{"$this->relation"}()->create($data);

        return $this->redirectTo('index');
    }

    public function update(CategoryRequest $request, $id)
    {
        if ($request->hasFile('photo')) {
            $path = $request->photo->store('images', 'public');
        
            $data = [
                'name' => $request->name,
                'photo' => $path,    
            ];

        } else {
            $data = [
                'name' => $request->name,
            ];
        }

        $this->site->{"$this->relation"}()->findOrFail($id)->update($data);

        return $this->redirectTo('index');
    }
}
