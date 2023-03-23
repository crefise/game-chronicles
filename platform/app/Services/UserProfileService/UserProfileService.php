<?php

namespace App\Services\UserProfileService;

use App\Exceptions\User\FailedCreateException;
use App\Models\User;
use App\Models\UserProfile;
use App\Services\AuthService\AuthService;
use App\Services\CoreService;
use App\Services\RolesAndPermissionsService\RolesAndPermissionsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserProfileService extends CoreService {
    /**
     * Model class
     *
     * @return string
     */
    protected function model(): string
    {
        return UserProfile::class;
    }

    /**
     * Store user profile
     *
     * @param int $userId
     * @return UserProfile
     */
    public function store(int $userId): UserProfile
    {
        return $this->model()::create([
            'user_id' => $userId
        ]);
    }

    /**
     * Update user profile
     *
     * @param int $profileId
     * @param $data
     */
    public function update(int $profileId, $data): void
    {
        $profile = $this->model()::find($profileId);

        $profile->update($data);
    }

    /**
     * Get auth user profile
     *
     * @return UserProfile
     */
    public function show(): UserProfile
    {
        /** @var User $user */
        $user = auth()->user();

        return $user->profile;
    }
}
