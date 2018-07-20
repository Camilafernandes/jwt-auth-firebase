Fork de https://github.com/CamilaFernandesdesigns/jwt-auth com alterações para funcionar com Firebase


```bash
composer require camilafernandes/jwt-auth-firebase
```
No arquivo config/app.php altere o array de providers incluido a linha:

```bash

CamilaFernandes\JWTAuth\Providers\JWTAuthServiceProvider::class

```

No mesmo arquivo no array de facades incluir:

```bash

    'JWTAuth'   => CamilaFernandes\JWTAuthFacades\JWTAuth::class,
    'JWTFactory' => CamilaFernandes\JWTAuthFacades\JWTFactory::class

```

Depois rodar os comando :


```bash

php artisan vendor:publish --provider="CamilaFernandes\JWTAuth\Providers\JWTAuthServiceProvider"
php artisan jwt:generate

```

E seguir com as configurações normais do JWT-AUTH do CamilaFernandess.

Depois de to instalado, necessário baixar o json de conexão e salvar na raiz do projeto.
Alterar as variaveis de ambiente JSON_FIREBASE com o caminho do json e DATABASE_URI com a url do database.

