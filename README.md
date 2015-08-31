AntennaBundle
=============

Makes it easier to integrate Antenna (and through it JWT) authentication
with your Symfony project.

Install
-------

``` bash
composer require flint/antenna-bundle
```

``` php
class AppKernel extends \Symfony\Component\HttpKernel\Kernel
{
    public function registerBundles()
    {
        // ...
        $bundles[] = new Flint\Bundle\AntennaBundle\AntennaBundle();
        // ...
    }
}
```

``` yaml
antenna:
  secret: your-shared-secret
```

Usage
-----

``` yaml
# security.yml
security:
    providers:
        in_memory:
            memory:
                users:
                    henrikbjorn:
                        password: my-unique-password
                        roles: 'ROLE_USER'

    firewalls:
        token_exchange:
            pattern: ^/auth
            simple-preauth:
                provider: in_memory
                authenticator: antenna.username_password_authenticator
        web_token:
            pattern: ^/api
            simple-preauth:
                provider: in_memory
                authenticator: antenna.token_authenticator
```
