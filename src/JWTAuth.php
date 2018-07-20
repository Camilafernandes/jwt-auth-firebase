<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean CamilaFernandes <CamilaFernandes148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CamilaFernandes\JWTAuth;

use CamilaFernandes\JWTAuth\Http\Parser\Parser;
use CamilaFernandes\JWTAuth\Contracts\Providers\Auth;

class JWTAuth extends JWT
{
    /**
     * The authentication provider.
     *
     * @var \CamilaFernandes\JWTAuth\Contracts\Providers\Auth
     */
    protected $auth;

    /**
     * Constructor.
     *
     * @param  \CamilaFernandes\JWTAuth\Manager  $manager
     * @param  \CamilaFernandes\JWTAuth\Contracts\Providers\Auth  $auth
     * @param  \CamilaFernandes\JWTAuth\Http\Parser\Parser  $parser
     *
     * @return void
     */
    public function __construct(Manager $manager, Auth $auth, Parser $parser)
    {
        parent::__construct($manager, $parser);
        $this->auth = $auth;
    }

    /**
     * Attempt to authenticate the user and return the token.
     *
     * @param  array  $credentials
     *
     * @return false|string
     */
    public function attempt(array $credentials)
    {
        if (! $this->auth->byCredentials($credentials)) {
            return false;
        }

        return $this->fromUser($this->user());
    }

    /**
     * Authenticate a user via a token.
     *
     * @return \CamilaFernandes\JWTAuth\Contracts\JWTSubject|false
     */
    public function authenticate()
    {

        if($this->config('firebase') == false){
        $id = $this->getPayload()->get('sub');

            if (! $this->auth->byId($id)) {
                return false;
            }
        }

        return $this->user();

        if($this->config('firebase') == true){
            $id = $this->getPayload($token)->get('sub');

            $firebase = FirebaseServiceProvider::register();

            $database = $firebase->getDatabase();
            $user = $database->getReference('Users')
            ->orderByChild('key')
            ->equalTo($id)
            ->getValue();
            if (! $user) {
                return false;
            }

            $this->auth = $user;

            return $this->auth;
        }
    }

    /**
     * Alias for authenticate().
     *
     * @return \CamilaFernandes\JWTAuth\Contracts\JWTSubject|false
     */
    public function toUser()
    {
        return $this->authenticate();
    }

    /**
     * Get the authenticated user.
     *
     * @return \CamilaFernandes\JWTAuth\Contracts\JWTSubject
     */
    public function user()
    {
        return $this->auth->user();
    }
}
