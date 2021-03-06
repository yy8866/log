<?php
/*
 * This file is part of the package.
 *
 * (c) 2013 Maxime Bouroumeau-Fuseau
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Songshenzong\Log\Bridge\SwiftMailer;

use Songshenzong\Log\DataCollector\MessagesCollector;
use Swift_Mailer;
use Swift_Plugins_Logger;
use Swift_Plugins_LoggerPlugin;

/**
 * Collects log messages
 *
 * http://swiftmailer.org/
 */
class SwiftLogCollector extends MessagesCollector implements Swift_Plugins_Logger
{
    /**
     * SwiftLogCollector constructor.
     *
     * @param Swift_Mailer $mailer
     */
    public function __construct(Swift_Mailer $mailer)
    {
        $mailer->registerPlugin(new Swift_Plugins_LoggerPlugin($this));
    }

    /**
     * @param $entry
     */
    public function add($entry)
    {
        $this->addMessage($entry);
    }

    /**
     * @return string
     */
    public function dump()
    {
        return implode(PHP_EOL, $this->_log);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'swiftmailer_logs';
    }
}
