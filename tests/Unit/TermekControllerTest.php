<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\TermekController;
use App\Models\Termek;

class TermekControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_kontroller1()
    {
        $this->setName("A termékKontroller lekérdezés megfelelő mezőket ad-e vissza?");

        $controller = new TermekController();
        $eredmeny = $controller->index()[0];
        $this->assertIsNumeric($eredmeny->ar);
        $this->assertIsNumeric($eredmeny->kedvezmeny);
    
        $this->assertIsString($eredmeny->nev);
        $this->assertIsString($eredmeny->leiras);
        $this->assertIsNumeric($eredmeny->kategoriaid);
        $this->assertIsNumeric($eredmeny->kategoria->id);
        
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_kontroller_update()
    {
        $this->setName("A termékKontroller update megfelelő mezőket ad-e vissza?");

        $controller = new TermekController();
        $termek = Termek::first();
        $id = $termek->id;

        $myRequest = new \App\Http\Requests\UpdateTermekRequest();
        $myRequest->setMethod('PUT');
        $myRequest->request->add(['nev' => 'körte']);
        $myRequest->request->add(['ar' => '100']);

/*
 $requestMock = Mockery::mock(Request::class)
            ->makePartial()
            ->shouldReceive('path')
            ->once()
            ->andReturn('testing/5');

        app()->instance('request', $requestMock->getMock());
*/


      /*  $request = \Illuminate\Http\Request::create('/api/termek', "PUT", ["nev"=>"szilva"]);
        $request->setRouteResolver(function () use ($request) {
            return (new \Illuminate\Routing\Route('PUT', '/api/termek', []))->bind($request);
        });
        var_dump(request());*/

        $eredmeny = $controller->update($myRequest, $termek);
        
        $termek = Termek::where(["id" => $id])->first();
        $this->assertEquals($termek->nev, "körte");
    }
}
