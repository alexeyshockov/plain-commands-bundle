<?php

namespace PlainCommands\Bundle;

use PlainCommands\CommandBuilder;
use PlainCommands\Reflection\Reflector;
use Symfony\Component\Console\Application;

class CommandLoader
{
    /**
     * @var iterable
     */
    private $commandSets;

    /**
     * @var Reflector
     */
    private $reflector;

    public function __construct($annotationReader, iterable $commandSets)
    {
        $this->commandSets = $commandSets;
        $this->reflector = new Reflector($annotationReader);
    }

    public function applyTo(Application $app)
    {
        $builder = new CommandBuilder($this->reflector);

        foreach ($this->commandSets as $object) {
            $builder->addCommandsFrom($object);
        }

        $builder->applyTo($app);
    }
}
