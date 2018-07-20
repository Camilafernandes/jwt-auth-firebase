<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean CamilaFernandes <CamilaFernandes148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CamilaFernandes\JWTAuth\Test\Stubs;

use Cartalyst\Sentinel\Users\UserInterface;

class SentinelStub implements UserInterface
{
    public function getUserId()
    {
        return 123;
    }

    public function getUserLogin()
    {
        return 'foo';
    }

    public function getUserLoginName()
    {
        return 'bar';
    }

    public function getUserPassword()
    {
        return 'baz';
    }
}
