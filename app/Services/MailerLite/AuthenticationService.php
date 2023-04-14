<?php

namespace App\Services\MailerLite;

use App\Exceptions\CustomException;
use App\Models\Setting;

class AuthenticationService
{

    private $api_key;

    public function loadKey()
    {
        $setting_id = "api_key";

        // First try to load the key from settings table
        $setting = Setting::where("key", $setting_id)->first();

        // If not found in database, try to fetch the key from the env and insert into the database
        if (empty($setting)) {

            $env_key = env("MAILERLITE_KEY");
            // Throw an error if the key is also not set in the env file
            if (empty($env_key)) {
                return new CustomException("No Api key set for MailerLite.");
            }

            $setting = Setting::firstOrCreate(["key" => $setting_id], [
                "value" => $env_key
            ]);
        }

        $this->api_key = $setting->value;
        return $this;
    }

    public function getApiKey()
    {
        if(!$this->api_key){
            $this->loadKey();
        }
        return $this->api_key;
    }


}
