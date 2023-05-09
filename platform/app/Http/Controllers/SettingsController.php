<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ViewTrait;
use Illuminate\View\View;

class SettingsController extends Controller
{
    use ViewTrait;

    /**
     * Module prefix
     */
    final const MODULE_PREFIX = 'settings';

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
     * Get show page
     *
     * @return View
     */
    public function show(): View
    {
        return $this->getView('show');
    }
}
