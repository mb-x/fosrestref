<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Place;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get; // N'oublons pas d'inclure Get
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View; // Utilisation de la vue de FOSRestBundle
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations

class PlaceController extends Controller
{
    /**
     * @Rest\View()
     * @Rest\Get("/places")
     */
    public function getPlacesAction(Request $request)
    {
        $places = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Place')
            ->findAll();
        /* @var $places Place[] */

        return $places;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/places/{id}")
     */
    public function getPlaceAction(Request $request, $id)
    {
        $place = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Place')
            ->find($id);
        /* @var $place Place */
        if (empty($place)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }

        return $place;
    }
}
