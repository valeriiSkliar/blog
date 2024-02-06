<?php

namespace App\Services\MailServices;

interface Newsletter
{
    public function subscribe(string $email, $list = null);

}
