<?php

namespace Cyberfusion\CoreApi\Support;

class ValidationHelper
{
    /**
     * Before ranting/laughing about this, read the following:
     *
     * See: https://github.com/Respect/Validation/issues/1533.
     *
     * If you have an array with the string "14.1" and the string "14.10", our lovely array_unique function with the
     * SORT_REGULAR flag thinks those are the same. So, we need to do some magic to make sure that doesn't happen. This
     * function will add a suffix (two kisses, spreading the love) to all strings in the array to make sure it really
     * understands the unique values.
     */
    public static function prepareArray(?array $array): ?array
    {
        if ($array === null) {
            return null;
        }

        return array_map(
            static fn ($value) => is_string($value)
                ? $value . 'xx'
                : $value,
            $array
        );
    }
}
