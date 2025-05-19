<?php

namespace Application\Compiler;

use Skyline\Compiler\Factory\AbstractFactoryFactory;
use Skyline\Compiler\Factory\BasicCompilersFactory;
use Skyline\Compiler\Factory\ConfigMainCompilerFactory;
use Skyline\Compiler\Factory\ConfigParameterCompilerFactory;
use Skyline\Compiler\Factory\ConfigPluginsCompilterFactory;
use Skyline\Compiler\Factory\CreateHTAccessCompilerFactory;
use Skyline\Compiler\Factory\DirectoryProtectionCompilerFactory;
use Skyline\Compiler\Factory\FindPackageCompilersFactory;
use Skyline\Compiler\Factory\SkylineEntryPointCompilerFactory;

class OptimierterCompiler extends AbstractFactoryFactory
{
    /**
     * @inheritDoc
     */
    protected function getFactoryClassNames(): array
    {
        return [
            BasicCompilersFactory::class,
            ConfigMainCompilerFactory::class,
            ConfigParameterCompilerFactory::class,
            ConfigPluginsCompilterFactory::class,
            CreateHTAccessCompilerFactory::class,
           # SkylineEntryPointCompilerFactory::class,
           # DirectoryProtectionCompilerFactory::class,
            FindPackageCompilersFactory::class
        ];
    }
}