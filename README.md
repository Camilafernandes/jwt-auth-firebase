Fork de https://github.com/tymondesigns/jwt-auth com alterações para funcionar com Firebase


```bash
composer require Camilafernandes/jwt-auth-firebase
```
No arquivo config/app.php altere o array de providers incluido a linha:

```bash

Tymon\JWTAuth\Providers\JWTAuthServiceProvider::class

```

No mesmo arquivo no array de facades incluir:

```bash

    'JWTAuth'   => Tymon\JWTAuthFacades\JWTAuth::class,
    'JWTFactory' => Tymon\JWTAuthFacades\JWTFactory::class

```

Depois rodar os comando :


```bash

php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\JWTAuthServiceProvider"
php artisan jwt:generate

```

E seguir com as configurações normais do JWT-AUTH do Tymons.

Depois de to instalado, necessário baixar o json de conexão e salvar na raiz do projeto.
Alterar as variaveis de ambiente JSON_FIREBASE com o caminho do json e DATABASE_URI com a url do database.

