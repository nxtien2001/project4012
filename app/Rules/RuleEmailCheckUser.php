<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class RuleEmailCheckUser implements Rule
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
    public function passes($attribute, $newEmail)
    {
        $oldEmail =  User::find(request()->id)->email;
        // $oldEmail = request()->id->email;
        if ($newEmail === $oldEmail) {
            return true;
        }
        $check = User::where('email', $newEmail)->count();
        if ($check > 0) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email đã tồn tại';
    }
}
