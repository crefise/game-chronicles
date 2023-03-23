<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ViewTrait;
use Illuminate\View\View;

class PerformanceController extends Controller
{
    use ViewTrait;

    /**
     * Module prefix
     */
    final const MODULE_PREFIX = 'performance';

    /**
     * Get index page
     *
     * @return View
     */
    public function index(): View
    {
        return $this->getView('index');
    }

    /**
     * Get create page
     *
     * @return View
     */
    public function create(): View
    {
        return $this->getView('create');
    }
}
