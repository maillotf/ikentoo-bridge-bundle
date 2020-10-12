<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Description of Configuration
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\DependencyInjection
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Configuration implements ConfigurationInterface
{
	/**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
		$builder = new TreeBuilder('ikentoo');

        $builder->getRootNode()->addDefaultsIfNotSet()
            ->children()
				->arrayNode('authentication')
                    ->isRequired()
                    ->children()
                        ->scalarNode('protocol')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
						->scalarNode('host')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
						->scalarNode('port')
                            ->isRequired()
							->defaultValue(80)
                        ->end()
						->scalarNode('token')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
					->end()
				->end()
			->end()
		;
		return ($builder);
	}
}
