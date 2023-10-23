<?php

namespace Tune\Database\Eloquent\Casts;

use Tune\Contracts\Database\Eloquent\Castable;
use Tune\Contracts\Database\Eloquent\CastsAttributes;
use Tune\Support\Str;

class AsStringable implements Castable
{
    /**
     * Get the caster class to use when casting from / to this cast target.
     *
     * @param  array  $arguments
     * @return \Tune\Contracts\Database\Eloquent\CastsAttributes<\Tune\Support\Stringable, string|\Stringable>
     */
    public static function castUsing(array $arguments)
    {
        return new class implements CastsAttributes
        {
            public function get($model, $key, $value, $attributes)
            {
                return isset($value) ? Str::of($value) : null;
            }

            public function set($model, $key, $value, $attributes)
            {
                return isset($value) ? (string) $value : null;
            }
        };
    }
}
