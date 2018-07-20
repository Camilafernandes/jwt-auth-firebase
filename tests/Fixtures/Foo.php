<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean CamilaFernandes <CamilaFernandes148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CamilaFernandes\JWTAuth\Test\Fixtures;

use CamilaFernandes\JWTAuth\Claims\Claim;

class Foo extends Claim
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'foo';
}
