<?php

declare(strict_types=1);

namespace App\DependencyInjection\Compiler;

use App\Service\Strategy\ReturnTypeContext;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ReturnTypeContextCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $service = $container->findDefinition(ReturnTypeContext::class);

        $strategyServiceIds = array_keys($container->findTaggedServiceIds('strategy_return_type'));

        foreach ($strategyServiceIds as $strategyServiceId) {
            $service->addMethodCall('addStrategy', [new Reference($strategyServiceId)]);
        }
    }
}