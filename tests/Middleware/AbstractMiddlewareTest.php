<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean CamilaFernandes <CamilaFernandes148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CamilaFernandes\JWTAuth\Test\Middleware;

use Mockery;
use CamilaFernandes\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use CamilaFernandes\JWTAuth\Test\AbstractTestCase;

abstract class AbstractMiddlewareTest extends AbstractTestCase
{
    /**
     * @var \Mockery\MockInterface|\CamilaFernandes\JWTAuth\JWTAuth
     */
    protected $auth;

    /**
     * @var \Mockery\MockInterface|\Illuminate\Http\Request
     */
    protected $request;

    public function setUp()
    {
        parent::setUp();

        $this->auth = Mockery::mock(JWTAuth::class);
        $this->request = Mockery::mock(Request::class);
    }
}
