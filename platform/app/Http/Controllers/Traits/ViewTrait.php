<?php

namespace App\Http\Controllers\Traits;

use Illuminate\View\View;

trait ViewTrait {
    /**
     * Get view
     *
     * @param string $view
     * @return View
     */
    protected function getView(string $view): View
    {
        return view(self::MODULE_PREFIX . '.' . $view);
    }
}
