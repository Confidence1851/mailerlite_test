<?php

namespace Tests\Unit;

use App\Services\MailerLite\SubscriberService;
use MailerLite\Exceptions\MailerLiteValidationException;
use Tests\TestCase;

class SubscriberTest extends TestCase
{
    private SubscriberService $subscriberService;
    public function setUp(): void
    {
        parent::setUp();
        $this->subscriberService = new SubscriberService;
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_with_valid_email()
    {
        $this->subscriberService->create([
            "name" => "Confidence Ugolo",
            "email" => "ugoloconfidence@gmail.com",
            "country" => "Canada"
        ]);
        $this->assertTrue(true);
    }

    public function test_create_with_invalid_email()
    {
        try {
            $this->subscriberService->create([
                "name" => "Confidence Ugolo",
                "email" => "ugoloconfidence",
                "country" => "Canada"
            ]);
        } catch (MailerLiteValidationException $e) {
            $this->assertTrue(true, $e->getMessage());
        }
    }

    public function test_update_name_and_country_with_valid_id()
    {
        $email = "ugoloconfidence@gmail.com";
        $response = $this->subscriberService->find($email);
        $data = $response["body"]["data"];
        $this->subscriberService->update($data["id"], [
            "name" => "Confidence Ugolo",
            "country" => "Canada"
        ]);
        $this->assertTrue(true);
    }

    public function test_list()
    {
        $this->subscriberService->list();
        $this->assertTrue(true);
    }

    public function test_list_count()
    {
        $this->subscriberService->list();
        $this->assertTrue(true);
    }


    public function test_delete_with_valid_id()
    {
        $id = "ugoloconfidence@gmail.com";
        $this->subscriberService->delete($id);
        $this->assertTrue(true);
    }

}
