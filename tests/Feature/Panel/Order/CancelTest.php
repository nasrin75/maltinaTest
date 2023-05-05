<?php

namespace Tests\Feature\Panel\Order;

use Tests\TestCase;

class CancelTest extends TestCase
{
    public function testBasicTest()
    {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->accessToken,
        ];

        $data = [
            'orderID' => 1,
        ];

        $response = $this->json('PUT', 'api/order/cancel', $data, $headers);
        $resp = json_decode($response->getContent(), true);

        if (!empty($resp) && !empty($resp['status']) && $resp['status'] == 200) {
            $response->assertStatus(200);
        }else{
            $response->assertStatus(400);
        }

    }
}
