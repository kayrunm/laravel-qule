<?php

namespace Kayrunm\Qule\Laravel\Tests;

use Kayrunm\Qule\Response;
use Kayrunm\Qule\Laravel\Model;
use Orchestra\Testbench\TestCase;
use GuzzleHttp\Psr7\Response as PsrResponse;

class QuleTest extends TestCase
{
    /** @test */
    public function it_converts_keys_to_snake_case(): void
    {
        $model = new Model([
            'firstName' => 'Foo',
            'LastName' => 'Barson',
            'email address' => 'foo.barson@emailprovider.com',
        ]);

        $this->assertEquals('Foo', $model->first_name);
        $this->assertEquals('Barson', $model->last_name);
        $this->assertEquals('foo.barson@emailprovider.com', $model->email_address);
    }

    /** @test */
    public function it_creates_model_from_response(): void
    {
        $response = $this->response('responses/customer_response.json');

        $model = Model::fromResponse($response, 'customer');

        $this->assertEquals('Foo', $model->first_name);
        $this->assertEquals('Barson', $model->last_name);
        $this->assertEquals('foo.barson@emailprovider.com', $model->email);
    }

    /** @test */
    public function it_creates_model_from_edge(): void
    {
        $response = $this->response('responses/customers_response.json');
        $edge = $response->toObject()->data->customers->edges[0];

        $model = Model::fromEdge($edge);

        $this->assertEquals('Foo', $model->first_name);
        $this->assertEquals('Barson', $model->last_name);
        $this->assertEquals('foo.barson@emailprovider.com', $model->email);
    }

    private function response(string $path): Response
    {
        $psrResponse = new PsrResponse(
            200, [], $this->fixture($path)
        );

        return new Response($psrResponse);
    }

    private function fixture(string $path): string
    {
        $dir = dirname(__FILE__) . '/Fixtures/';

        return file_get_contents($dir . $path);
    }
}
