<?php

namespace App\Services\MailerLite;

use MailerLite\MailerLite;

class SubscriberService
{

    private MailerLite $mailerLite;
    public function __construct()
    {
        $authentication_service = new AuthenticationService;
        $this->mailerLite = new MailerLite(['api_key' => $authentication_service->getApiKey()]);
    }


    public function create(array $data)
    {
        $payload = [
            "email" => $data["email"],
            "fields" => ["name" => $data["name"], "country" => $data["country"]]
        ];
        return $this->mailerLite->subscribers->create($payload);
    }

    public function update($id, array $data)
    {
        $payload = [
            "fields" => ["name" => $data["name"], "country" => $data["country"]]
        ];
        return $this->mailerLite->subscribers->update($id, $payload);
    }

    public function delete($id)
    {
        return $this->mailerLite->subscribers->delete($id);
    }

    public function find($email)
    {
        return $this->mailerLite->subscribers->find($email);
    }

    public function list(array $query = [])
    {
       return $this->mailerLite->subscribers->get($query);
    }

    public function getCount()
    {
        $response = $this->mailerLite->subscribers->get(["limit" => 0]);
        return $response["body"]["total"] ?? 0;
    }
}
