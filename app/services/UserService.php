<?php

namespace App\Services;

use App\DTO\UserDto as Dto;
use App\Models\User as Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService extends Service
{

    public function query()
    {
        return Model::query();
    }

    public function create(Dto $dto)
    {
        $user = User::create([
            'name' => 'test',
            'login' => $dto->login,
            'password' => Hash::make($dto->password),
        ]);

        auth()->login($user);

        return $user;
    }


    function logout()
    {
        Auth::logout(); 
    }


    function login(Dto $userDto)
    {
        $userdata = array(
            'login' => $userDto->login,
            'password' => $userDto->password
        );

        return Auth::attempt($userdata);
    }


    public function delete(User $user): void
    {
        $user->delete();
    }


    public function deleteFromArrayOfIds(array $ids): void
    {
        self::query()->whereIn('id', $ids)->delete();
    }


    public function update(User $user, Dto $dto)
    {
        $item = $user;

        $item->fill([
            'name' => $dto->name,
            'login' => $dto->login,
            'password' => $dto->password,
        ]);

        if ($item->isDirty()) {
            $item->save();
            $item->refresh();
        }
    }
}