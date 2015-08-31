<?php

namespace Flint\Bundle\AntennaBundle\Tests;

class AntennaBundleTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
    public function setUp()
    {
        parent::setUp();

        static::bootKernel();
    }

    public static function dataServices()
    {
        return [
            ['antenna.coder', 'Antenna\Coder'],
            ['antenna.username_password_authenticator', 'Antenna\Security\UsernamePasswordAuthenticator'],
            ['antenna.token_authenticator', 'Antenna\Security\TokenAuthenticator'],
        ];
    }

    /**
     * @dataProvider dataServices
     */
    public function testCreateService($id, $class)
    {
        $container = static::$kernel->getContainer();

        $this->assertInstanceOf($class, $container->get($id));
    }
}
