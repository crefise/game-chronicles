<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Services\UserProfileService\UserProfileService;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Show auth user profile endpoint
     *
     * @param UserProfileService $userProfileService
     * @return ProfileResource
     */
    public function show(UserProfileService $userProfileService): ProfileResource
    {
        $profile = $userProfileService->show();

        return new ProfileResource($profile);
    }
}
