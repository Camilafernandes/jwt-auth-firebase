<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean CamilaFernandes <CamilaFernandes148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CamilaFernandes\JWTAuth\Test;

use CamilaFernandes\JWTAuth\Token;

class TokenTest extends AbstractTestCase
{
    /**
     * @var \CamilaFernandes\JWTAuth\Token
     */
    protected $token;

    public function setUp()
    {
        parent::setUp();

        $this->token = new Token('foo.bar.baz');
    }

    /** @test */
    public function it_should_return_the_token_when_casting_to_a_string()
    {
        $this->assertEquals((string) $this->token, $this->token);
    }

    /** @test */
    public function it_should_return_the_token_when_calling_get_method()
    {
        $this->assertInternalType('string', $this->token->get());
    }
}
