<?php

namespace Aizatto\Bundle\UserBundle\Entity;

use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

abstract class UserLogManager {

  protected
    $em,
    $logger,
    $request,
    $security_context,
    $user_class;

  public function __construct($container,
                              EntityManager $em,
                              Logger $logger,
                              SecurityContext $security_context,
                              $user_class) {
    $this->em = $em;
    $this->logger = $logger;
    $this->request = $container->get('request');
    $this->security_context = $security_context;
    $this->user_class = $user_class;
  }

  public function persist($type, $message) {
    $id = null;

    if (is_array($type)) {
      foreach ($type as $t) {
        $this->persist($t, $message);
      }
      return;
    } else if (is_string($type)) {
      // skip
    } else if (is_object($type)) {
      $object = $type;
      $type = get_class($object);
      $id = $object->getID();
    } else {
      throw new \Exception(sprintf('Unexpected type: %s', gettype($type)));
    }

    $log = id(newv($this->user_class, array()))
      ->setType($type)
      ->setTypeID($id)
      ->setMessage($message)
      ->setIPAddress(ip2long($this->request->getClientIP(true)))
      ->setSessionID($this->request->getSession()->getID())
      ->setCreatedAt(new \DateTime());

    if ($this->security_context->isGranted('ROLE_USER') &&
        $user = $this->security_context->getToken()->getUser()) {
      $log->setUser($user);
    }

    $this->em->persist($log);
    return $log;
  }

}
