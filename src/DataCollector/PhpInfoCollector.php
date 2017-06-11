<?php
/*
 * This file is part of the package.
 *
 * (c) 2013 Maxime Bouroumeau-Fuseau
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Songshenzong\Log\DataCollector;

/**
 * Collects info about PHP
 */
class PhpInfoCollector extends DataCollector
{
    /**
     * @return array
     */
    public function collect()
    {
        return [
            'version'   => PHP_VERSION,
            'interface' => PHP_SAPI
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'php';
    }
}
