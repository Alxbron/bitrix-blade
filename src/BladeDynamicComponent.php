<?php

namespace Arrilot\BitrixBlade;

use Illuminate\Container\Container;
use Illuminate\View\DynamicComponent;

class BladeDynamicComponent extends DynamicComponent
{
    /**
     * Get an instance of the Blade tag compiler.
     *
     * @return \Illuminate\View\Compilers\ComponentTagCompiler
     */
    protected function compiler()
    {
        if (!static::$compiler) {
            static::$compiler = new BladeComponentTagCompiler(
                Container::getInstance()->make('blade.compiler')->getClassComponentAliases(),
                Container::getInstance()->make('blade.compiler')->getClassComponentNamespaces(),
                Container::getInstance()->make('blade.compiler')
            );
        }

        return static::$compiler;
    }
}
