<?php

namespace App\Services\AuthService;

use App\Exceptions\Auth\FailedLoginException;
use App\Exceptions\User\FailedCreateException;
use App\Models\User;
use App\Services\CoreService;
use App\Services\UserService\UserService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuthService extends CoreService {
    /**
     * Generate sanctum token
     *
     * @param $user
     * @return string
     */
    public function generateToken($user): string
    {
        return $user->createToken($user->email)->plainTextToken;
    }

    /**
     * Login user
     *
     * @param array $credentials
     * @return string|null
     * @throws FailedLoginException
     */
    public function loginUser(array $credentials): string|null
    {
        if (Auth::attempt($credentials)) {
            $user  = Auth::user();

            return $this->generateToken($user);
        }

        throw new FailedLoginException();
    }

    /**
     * Register and login user
     *
     * @param array $data
     * @param UserService $userService
     * @return string
     * @throws FailedCreateException
     */
     public function registerAndLoginUser(array $data, UserService $userService): string
     {
        $user = $userService->storeUser($data);

        return $this->generateToken($user);
     }


    /**
     * Register user
     *
     * @param array $data
     * @param UserService $userService
     * @return Model
     * @throws FailedCreateException
     */
    public function registerUser(array $data, UserService $userService): Model
    {
        return $userService->storeUser($data);
    }

    /**
     * Logout auth user
     */
    public function logoutCurrentUser(): void
    {
        /**
         * @var User $user
         */
        $user = Auth::user();

        $this->logoutUser($user);
    }

    /**
     * Logout user
     *
     * @param User $user
     */
    public function logoutUser(User $user): void
    {
        $user->tokens()->delete();
    }
}
