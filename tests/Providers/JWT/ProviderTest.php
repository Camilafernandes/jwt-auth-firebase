<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean CamilaFernandes <CamilaFernandes148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CamilaFernandes\JWTAuth\Test\Providers\JWT;

use CamilaFernandes\JWTAuth\Test\AbstractTestCase;
use CamilaFernandes\JWTAuth\Test\Stubs\JWTProviderStub;

class ProviderTest extends AbstractTestCase
{
    /**
     * @var \CamilaFernandes\JWTAuth\Test\Stubs\JWTProviderStub
     */
    protected $provider;

    public function setUp()
    {
        parent::setUp();

        $this->provider = new JWTProviderStub('secret', 'HS256', []);
    }

    /** @test */
    public function it_should_set_the_algo()
    {
        $this->provider->setAlgo('HS512');

        $this->assertSame('HS512', $this->provider->getAlgo());
    }

    /** @test */
    public function it_should_set_the_secret()
    {
        $this->provider->setSecret('foo');

        $this->assertSame('foo', $this->provider->getSecret());
    }
}
