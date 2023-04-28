<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Repositories\HeaderMenuRepository;

class HeaderMenuComposer
{
    /**
     * The user repository implementation.
     *
     * @var HeaderMenuRepository
     */
    protected $headerMenu;

    /**
     * Create a new aside menu composer.
     *
     * @param  HeaderMenuRepository  $headerMenu
     * @return void
     */
    public function __construct(HeaderMenuRepository $headerMenu)
    {
        // Dependencies automatically resolved by service container...
        $this->headerMenu = $headerMenu;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // $view->with('headerMenu', $this->headerMenu->get());
        $view->with('headerMenu', '');
    }
}