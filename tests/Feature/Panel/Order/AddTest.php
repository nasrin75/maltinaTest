<?php

namespace Tests\Feature\Panel\Order;

use Tests\TestCase;

class AddTest extends TestCase
{
    public function testBasicTest()
    {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->accessToken,
        ];

        $data = [
            'productID'=> 2,
            'optionID' => 3,
        ];

        $response = $this->json('POST', 'api/order/add', $data, $headers);
        $resp = json_decode($response->getContent(), true);

        if (!empty($resp) && !empty($resp['status']) && $resp['status'] == 200) {
            $response->assertStatus(200);
        }else{
            $response->assertStatus(400);
        }
    }
}
