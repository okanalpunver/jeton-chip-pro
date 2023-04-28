<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Requests\Admin\Site\TestimonialRequest;

class TestimonialController extends BaseController
{
    public $relation = 'testimonials';

    public $viewBase = 'site.testimonial';

    public $label = 'Müşteri Yorumları';

    public $singularLabel = 'Müşteri Yorumu';

    public $routeBase = 'site.testimonial';

    public function store(TestimonialRequest $request)
    {
        $this->site->{"$this->relation"}()->create([
            'name' => $request->name,
            'content' => $request->content,
            'point' => $request->point,
        ]);

        return $this->redirectTo('index');
    }

    public function update(TestimonialRequest $request, $id)
    {
        $this->site->{"$this->relation"}()->findOrFail($id)->update([
            'name' => $request->name,
            'content' => $request->content,
            'point' => $request->point,
        ]);

        return $this->redirectTo('index');
    }
}
