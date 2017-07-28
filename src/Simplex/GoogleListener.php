<?php
namespace Simplex;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class GoogleListener
 * @package Simplex
 */
class GoogleListener implements EventSubscriberInterface
{

    /**
     * @param ResponseEvent $event
     */
    public function onResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();

        if ($response->isRedirection()
            || (
                $response->headers->has('Content-Type')
                && false === strpos($response->headers->get('Content-Type'), 'html')
            )
            || 'html' !== $event->getRequest()->getRequestFormat()
        ) {
            return;
        }

        $response->setContent($response->getContent() . 'GA CODE');
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return ['response' => 'onResponse'];
    }
}
