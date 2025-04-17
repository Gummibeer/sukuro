<?php

namespace App\Models;

use Assada\Achievements\Achiever;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Achiever;
    use Authenticatable;
    use Authorizable;
    use HasUuids;

    public function uniqueIds(): array
    {
        return ['uuid'];
    }
}
