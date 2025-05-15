<?php

namespace App\Helpers;

class Email {

    /**
     * Valida el formato del email.
     *
     * @param string $email
     * @return bool
     */
    public static function validate($email) {
        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}