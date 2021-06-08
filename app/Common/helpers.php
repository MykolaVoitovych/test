<?php

if (! function_exists('get_user_experience')) {
    /**
     * Get user experience
     *
     * @param  string  $userId
     * @return string
     */
    function get_user_experience($userId)
    {
        $user = \App\Models\User::find($userId);
        return optional($user)->experience;
    }
}
