<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ViewTrait;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    use ViewTrait;

    /**
     * Module prefix
     */
    const MODULE_PREFIX = 'welcome';

    /**
     * Get index page
     *
     * @return View
     */
    public function index(): View
    {
        return $this->getView('index');
    }
}
