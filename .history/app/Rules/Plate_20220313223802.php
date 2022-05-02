<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Plate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^(\d{2}\.?\d{3}\.?\d{3}\/?\d{4}-?\d{2})$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Must be a valid licence plate';
    }
}
