<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\UserRepository;
use App\Domain\UserValidator;

class UserService
{
    private UserRepository $repository;
    private UserValidator $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * @param array{name?:string,email?:string,password?:string} $input
     */
    public function register(array $input): bool
    {
        $errors = $this->validator->validate($input);
        if (!empty($errors)) {
            return false;
        }

        $allUsers = $this->repository->findAll();
        foreach ($allUsers as $user) {
            if ($user['email'] === ($input['email'] ?? '')) {
                return false;
            }
        }

        $user = [
            'name' => isset($input['name']) ? (string) $input['name'] : 'Seu Nome',
            'email' => (string) ($input['email'] ?? ''),
            'password' => password_hash((string) ($input['password'] ?? ''), PASSWORD_DEFAULT)
        ];

        $this->repository->save($user);

        return true;
    }

    /**
     * @return array<int,array{name:string,email:string,password:string}>
     */
    public function listAllUsers(): array
    {
        return $this->repository->findAll();
    }
}
