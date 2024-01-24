<?php

namespace App\Services\MailServices;


use MailchimpMarketing\ApiClient;

class MailChimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client){}

    public function subscribe(string $email, $list = null)
    {
        $list ??= config('services.mailchimp.list');
        return $this->client->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

}
