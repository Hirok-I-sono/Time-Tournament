<?php

namespace App\Repositories\Interfaces;

use App\User;
use App\Repositories\Eloquents\UserRepository;

interface UserRepositoryInterface
{
    /**
     * 引数に渡されたメールアドレスを持つユーザーを取得する
     *
     * @param string $email
     * @return User
     */
    public function findFromEmail(string $email): User;

    ##ここから追加##
    /**
     * 引数に渡されたIDのユーザーのパスワードを更新する
     *
     * @param string $password
     * @param int $id
     * @return void
     */
    public function updateUserPassword(string $password, int $id): void;
}