<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean CamilaFernandes <CamilaFernandes148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CamilaFernandes\JWTAuth\Test\Claims;

use CamilaFernandes\JWTAuth\Claims\IssuedAt;
use CamilaFernandes\JWTAuth\Test\AbstractTestCase;

class IssuedAtTest extends AbstractTestCase
{
    /**
     * @test
     * @expectedException \CamilaFernandes\JWTAuth\Exceptions\InvalidClaimException
     * @expectedExceptionMessage Invalid value provided for claim [iat]
     */
    public function it_should_throw_an_exception_when_passing_a_future_timestamp()
    {
        new IssuedAt($this->testNowTimestamp + 3600);
    }
}
