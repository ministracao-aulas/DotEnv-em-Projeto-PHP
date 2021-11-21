<?php

if (!function_exists('env'))
{
    function env(string $key, $default = null, $must_be_type = null)
    {
        $value = ($_ENV[$key] ?? null);

        //Verifica o tipo de dado da variavel $value
        if ($must_be_type)
        {
            if (is_array($must_be_type))
            {
                if (!in_array($value, $must_be_type))
                {
                    return $default;
                }
            }
            else
            {
                if (gettype($value) !== $must_be_type)
                {
                    return $default;
                }
            }
        }

        return $value ?? $default;
    }
}
