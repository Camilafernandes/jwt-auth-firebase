<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean CamilaFernandes <CamilaFernandes148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CamilaFernandes\JWTAuth\Http\Parser;

use Illuminate\Http\Request;
use CamilaFernandes\JWTAuth\Contracts\Http\Parser as ParserContract;

class QueryString implements ParserContract
{
    use KeyTrait;

    /**
     * Try to parse the token from the request query string.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return null|string
     */
    public function parse(Request $request)
    {
        return $request->query($this->key);
    }
}
