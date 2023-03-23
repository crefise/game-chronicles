<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ViewTrait;
use Illuminate\View\View;

class AuthController extends Controller
{
    use ViewTrait;

    /**
     * Module prefix
     */
    final const MODULE_PREFIX = 'auth';

    /**
     * Get registration page
     *
     * @return View
     */
    public function registration(): View
    {
        return $this->getView('registration');
    }

    /**
     * Get login page
     *
     * @return View
     */
    public function login(): View
    {
        return $this->getView('login');
    }
}
