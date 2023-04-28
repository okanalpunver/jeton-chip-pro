<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Repositories\AsideMenuRepository;

class AsideMenuComposer
{
    /**
     * The user repository implementation.
     *
     * @var AsideMenuRepository
     */
    protected $asideMenu;

    /**
     * Create a new aside menu composer.
     *
     * @param  AsideMenuRepository  $asideMenu
     * @return void
     */
    public function __construct(AsideMenuRepository $asideMenu)
    {
        // Dependencies automatically resolved by service container...
        $this->asideMenu = $asideMenu;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('sidebarMenu', $this->asideMenu->get());
    }
}