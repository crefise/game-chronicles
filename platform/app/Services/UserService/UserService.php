<?php

namespace App\Services\UserService;

use App\Exceptions\User\FailedCreateException;
use App\Models\User;
use App\Models\UserProfile;
use App\Services\AuthService\AuthService;
use App\Services\CoreService;
use App\Services\RolesAndPermissionsService\RolesAndPermissionsService;
use App\Services\UserProfileService\UserProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserService extends CoreService {
    /**
     * Model
     *
     * @return string
     */
    protected function model(): string
    {
        return User::class;
    }

    /**
     * Constructor
     *
     * @param Logger $logger
     * @param UserProfileService $userProfile
     */
    public function __construct(
        Logger $logger,
        private UserProfileService $userProfile
    ) {
        parent::__construct($logger);
    }

    /**
     * Store user
     *
     * @param array $data
     * @return User
     * @throws FailedCreateException
     */
    public function store(array $data): User
    {
        return $this->storeUser($data);
    }

    /**
     * Store user
     *
     * @param array $data
     * @return User
     * @throws FailedCreateException
     */
    public function storeUser(array $data): User
    {
        try {
            $user = $this->model()::create([
                'email'     => $data['email'],
                'password'  => Hash::make($data['password']),
            ]);

            $this->assignRole($user);

            $this->userProfile->store($user->id);

            return $user;
        } catch (\Exception $e) {
            throw new FailedCreateException();
        }
    }

    /**
     * Assign role to user
     *
     * @param User $user
     */
    protected function assignRole(User $user): void
    {
        $user->assignRole(RolesAndPermissionsService::ROLE_USER_SLUG);
    }
}
