<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ViewTrait;
use Illuminate\View\View;

class DashboardController extends Controller
{
    use ViewTrait;

    /**
     * Module prefix
     */
    final const MODULE_PREFIX = 'dashboard';

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
