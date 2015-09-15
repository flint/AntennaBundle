<?php

namespace Flint\Bundle\AntennaBundle\Tests\DependencyInjection;

use Flint\Bundle\AntennaBundle\DependencyInjection\Configuration;
use Matthias\SymfonyConfigTest\PhpUnit\AbstractConfigurationTestCase;

class ConfigurationTest extends AbstractConfigurationTestCase
{
    protected function getConfiguration()
    {
        return new Configuration();
    }

    public function testSecretIsRequired()
    {
        $this->assertConfigurationIsInvalid([], 'The child node "secret" at path "antenna" must be configured.');
    }

    /**
     * @dataProvider configurationSets
     */
    public function testConfiguration($config, $expectedConfig)
    {
        $mergedConfigs = [$config];

        $this->assertProcessedConfigurationEquals($mergedConfigs, $expectedConfig);
    }

    public function configurationSets()
    {
        return [
            [['secret' => 'my_secret'], ['secret' => 'my_secret', 'time_to_live' => '7 days']],
            [['secret' => 'my_secret', 'time_to_live' => '10 days'], ['secret' => 'my_secret', 'time_to_live' => '10 days']],
        ];
    }
}
