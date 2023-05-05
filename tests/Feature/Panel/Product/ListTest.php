<?php

namespace Tests\Feature\Panel\Product;

use Tests\TestCase;

class ListTest extends TestCase
{
    public function testBasicTest()
    {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->accessToken,
        ];

        $response = $this->json('GET', 'api/product', [], $headers);
        $resp = json_decode($response->getContent(), true);

        if (!empty($resp) && !empty($resp['status']) && $resp['status'] == 200) {
            $response->assertStatus(200);
        }else{
            $response->assertStatus(400);
        }
    }
}
