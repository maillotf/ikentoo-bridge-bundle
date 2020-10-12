<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Description of PapercutExtension
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\DependencyInjection
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class IkentooExtension extends Extension
{

	public function load(array $configs, ContainerBuilder $container)
	{
		$configuration = new Configuration();
		$config = $this->processConfiguration($configuration, $configs);

		// Authentication
		$container->setParameter('ikentoo.authentication.protocol', $config['authentication']['protocol']);
		$container->setParameter('ikentoo.authentication.host', $config['authentication']['host']);
		$container->setParameter('ikentoo.authentication.port', $config['authentication']['port']);
		$container->setParameter('ikentoo.authentication.token', $config['authentication']['token']);

		// load services for bundle
		$loader = new YamlFileLoader(
				$container,
				new FileLocator(__DIR__ . '/../Resources/config')
		);
		$loader->load('services.yml');
	}

}
