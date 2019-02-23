<?php

namespace PlainCommands\Bundle;

use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\Argument\TaggedIteratorArgument;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PlainCommandsBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->register(CommandLoader::class)
            ->setPublic(true)
            ->addArgument(new Reference('annotation_reader'))
            ->addArgument(new TaggedIteratorArgument('plain_commands.set'))
        ;
    }

    public function registerCommands(Application $application)
    {
        /** @var CommandLoader $finder */
        $finder = $this->container->get(CommandLoader::class);

        $finder->applyTo($application);
    }
}
