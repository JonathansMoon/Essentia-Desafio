<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Validation\Rule;
use JMac\Testing\Traits\AdditionalAssertions;
use App\Http\Controller\ClientController;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Tests\TestCase;

class ValidationTest extends TestCase
{
    use AdditionalAssertions;

    public function ClientFormRequest()
    {
        $this->assertActionUsesFormRequest(
            CLientController::class,
            'store',
            CLientRequest::class
        );
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new CLientRequest();
    }

    public function testVerifaSeValidacaoEstaIntegra()
    {
        $this->withoutExceptionHandling();

        $client = Client::find(1);
        $photo = request()->isMethod('put') ? 'nullable|mimes:jpeg,jpg,png,gif' : 'required|mimes:jpeg,jpg,png,gif';
        $this->assertEquals([
            'name'      =>  'required|regex:/^[\pL\s\-]+$/u|max:255',
            'email'     =>  ['required', 'string', 'email', 'max:255', Rule::unique('clients')->ignore($client)],
            'phone'     =>  'required',
            'photo'     =>  $photo
    ], $this->subject->rules());
    }

}
