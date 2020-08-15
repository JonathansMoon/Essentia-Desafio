<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Image;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    public function testVerificaSeRotaRetornaValorCorreto()
    {
        $data = array(
            "name"      => "jonathan gomes",
            "email"     => "jona@hotmail.com",
            "phone"     => "(34) 23432-4324",
            "photo"     => UploadedFile::fake()->image('profile.png', 600, 600),
        );

        $response = $this->json('POST', '/client', $data);

        $response
            ->assertStatus(302);
    }
}
