<?php

namespace App\DTO;

use App\Http\Requests\UserRequest;
use Illuminate\Http\UploadedFile;

class UserDto extends DTO
{

    public function __construct(
        public readonly string|null $name,
        public readonly string $login,
        public readonly string  $password,
        public readonly UploadedFile|null  $cin,
        public readonly string|null  $gsm1,
        public readonly string|null  $gsm2,
        public readonly string|null  $adress,
        public readonly string|null  $website,
    ) {}

    public static function fromRequest(UserRequest $request): self
    {
        return new self(
            name: $request->validated('name'),
            login: $request->validated('login'),
            password: $request->validated('password'),
            cin: $request->validated('cin'),
            gsm1: $request->validated('gsm1'),
            gsm2: $request->validated('gsm2'),
            adress: $request->validated('adress'),
            website: $request->validated('website'),
        );
    }
}
