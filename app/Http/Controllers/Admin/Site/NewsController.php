<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Requests\Admin\Site\NewsRequest;

class NewsController extends BaseController
{
    public $relation = 'News';

    public $viewBase = 'site.news';

    public $label = 'Haberler';

    public $singularLabel = 'Haber';

    public $routeBase = 'site.news';

    public function store(NewsRequest $request)
    {
        $data = [
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
        ];

        if ($request->hasFile('image')) {
            $path = $request->image->store('images', 'public');
            $data['image'] = $path;
        }

        $this->site->{"$this->relation"}()->create($data);

        return $this->redirectTo('index');
    }

    public function update(NewsRequest $request, $id)
    {
        $data = [
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
        ];

        if ($request->hasFile('image')) {
            $path = $request->image->store('images', 'public');
            $data['image'] = $path;
        }

        $this->site->{"$this->relation"}()->findOrFail($id)->update($data);

        return $this->redirectTo('index');
    }
}
