<?php

namespace App\Http\Responses;

trait Response {
    /**
     * Success status slug
     */
    public string $SUCCESS_STATUS_SLUG = 'success';

    /**
     * Error status slug
     */
    public string $FAILED_STATUS_SLUG = 'error';
}
