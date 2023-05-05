<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public $uuid;

    public $user;
    public $arzyptoUser;
    public $accessToken;
    public $arzyptoAccessToken;

    public function setUp(): void
    {
        parent::setUp();
        // migrate the tables
        $this->artisan('migrate');

        // Call Database seeders for creating important data
        $this->seed();

        // Get First user
        $this->getUser();

        // Installing laravel passport
        $this->artisan('passport:install');

        // create accessToken
        $this->accessToken = $this->user->createToken('TestToken')->accessToken;
    }

    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getUser()
    {
        $this->user = User::where('id', 1)
            ->first();
    }
}
