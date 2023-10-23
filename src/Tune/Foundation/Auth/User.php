<?php

namespace Tune\Foundation\Auth;

use Tune\Auth\Authenticatable;
use Tune\Auth\MustVerifyEmail;
use Tune\Auth\Passwords\CanResetPassword;
use Tune\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tune\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Tune\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Tune\Database\Eloquent\Model;
use Tune\Foundation\Auth\Access\Authorizable;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
}
