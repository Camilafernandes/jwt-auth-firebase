<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean CamilaFernandes <CamilaFernandes148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CamilaFernandes\JWTAuth\Providers;

use CamilaFernandes\JWTAuth\Http\Parser\AuthHeaders;
use CamilaFernandes\JWTAuth\Http\Parser\InputSource;
use CamilaFernandes\JWTAuth\Http\Parser\QueryString;
use CamilaFernandes\JWTAuth\Http\Parser\LumenRouteParams;

class LumenServiceProvider extends AbstractServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->app->configure('jwt');

        $path = realpath(__DIR__.'/../../config/config.php');
        $this->mergeConfigFrom($path, 'jwt');

        $this->app->routeMiddleware($this->middlewareAliases);

        $this->extendAuthGuard();

        $this->app['CamilaFernandes.jwt.parser']->setChain([
            new AuthHeaders,
            new QueryString,
            new InputSource,
            new LumenRouteParams,
        ]);
    }
}
