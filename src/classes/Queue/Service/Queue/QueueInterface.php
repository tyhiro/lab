<?php

namespace Queue\Service\Queue;

use Queue\Wrapper\Message;

interface QueueInterface
{
    const DEFAULT_PRIORITY = 1;

    /**
     * @param array|Message $message
     * @param int $priority
     * @return bool
     * @throws \Queue\Exception\QueueException
     */
    public function add($message, $priority = self::DEFAULT_PRIORITY);

    /**
     * @param bool $active
     * @return $this
     */
    public function setActive($active);

    /**
     * @return bool
     */
    public function getActive();
}
