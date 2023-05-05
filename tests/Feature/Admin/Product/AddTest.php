<?php

namespace Tests\Feature\Admin\Product;

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
            'name' => 'Mocha',
            'price' => 30000,
            'customOption' => 'size',
        ];

        $response = $this->json('POST', 'api/admin/product/add', $data, $headers);
        $resp = json_decode($response->getContent(), true);

        if (!empty($resp) && !empty($resp['status']) && $resp['status'] == 200) {
            $response->assertStatus(200);
        }else{
            $response->assertStatus(400);
        }
    }
}
