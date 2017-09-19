<?php

namespace Acme\ApiBundle\Controller;

use Acme\ApiBundle\Entity\User;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\FOSRestController;

class DemoController extends FOSRestController
{
	/**
	 * @return \Symfony\Component\HttpFoundation\Response
	 *
	 */
	public function getDemosAction()
	{
		$em = $this->getDoctrine()->getManager();
		/** @var User $user */
		$user = $this->get('security.token_storage')->getToken()->getUser();
//		$user->setRoles(['ROLE_AGENT']);
//		$em->persist($user);
//		$em->flush();
		$data = $user->getRoles();
		$view = $this->view($data);
		return $this->handleView($view);
	}
}