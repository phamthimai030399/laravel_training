<?php

namespace App\Repositories\Token;

use App\Models\Token;
use App\Repositories\BaseRepository;

class TokenRepository extends BaseRepository implements TokenRepositoryInterface
{
    public function __construct(Token $token)
    {
        $this->model = $token;
    }
}
