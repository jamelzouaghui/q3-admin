<?php

/* Copyright (C) 2016 OUICARE, All Rights Reserved.
 * Web site : www.ouicare.net
 *
 *  __       .  __  __   __  __
 * /  \ |  | | /   /  | |   |__|
 * \__/ |__| | \__ \__| |   |__
 *
 *
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * This file can not be copied and/or distributed without the express permission of OUICARE
 *
 * @author 
 */

namespace UserBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\Animateur;
use UserBundle\Entity\FocusGroupe;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Admin Controller
 * @author zouaghui jamel
 */
class FocusGroupeController extends Controller {

    /**
     * @ApiDoc(
     *     resource=true,
     *     description="Get the list of all focusgroupes",
     *     section="focusgroupes"
     * )
     *
     * @Route("/api/focusgroupes",name="list_focusgroupes")
     * @Method({"GET"})
     */
    public function listContacts() {

        $focusGroupes = $this->getDoctrine()->getRepository('UserBundle:FocusGroupe')->findAll();

        if (!count($focusGroupes)) {
            $response = array(
                'code' => 1,
                'message' => 'No focusgroupe found!',
                'errors' => null,
                'result' => null
            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }


        $data = $this->get('jms_serializer')->serialize($focusGroupes, 'json');

        $response = array(
            'code' => 0,
            'message' => 'success',
            'errors' => null,
            'result' => json_decode($data)
        );

        return new JsonResponse($response, 200);
    }

    /**
     * @ApiDoc(
     * description="Create a new focusgroupe",
     *
     *    statusCodes = {
     *        201 = "Creation with success",
     *        400 = "invalid form"
     *    },
     *    responseMap={
     *         201 = {"class"=FocusGroupe::class},
     *
     *    },
     *     section="focusgroupe"
     *
     *
     * )
     *
     * @param Request $request
     * @return JsonResponse
     * @Route("/api/focusgroupe/addfocusgroupe",name="new_focusgroupe")
     * @Method({"POST"})
     */
    public function createFocusGroupe(Request $request) {
        $em = $this->getDoctrine()->getManager();


        $data = json_decode($request->getContent(), true);

        $focusGroupe = $data['focusGroupe'];
        $animateur = $focusGroupe['animateur'];

        $newAnimateur = new Animateur();
        $newFocusGroupe = new FocusGroupe();

        $newAnimateur->setFirstname($animateur['firstname']);
        $newAnimateur->setLastname($animateur['firstname']);
        $newAnimateur->setProfession($animateur['profession']);

        $newFocusGroupe->setAnimateur($newAnimateur);
        $newFocusGroupe->setNom($focusGroupe['nom']);
        $newFocusGroupe->setRaison($focusGroupe['raison']);
        $newFocusGroupe->setDescription1($focusGroupe['description1']);
        $newFocusGroupe->setDescription2($focusGroupe['description2']);
        $newFocusGroupe->setStatut(5);
        $newFocusGroupe->setOldStatut(0);
        $newFocusGroupe->setCreatedAt(new \DateTime('now'));
        $newFocusGroupe->setSlug($focusGroupe['nom']);
        $newFocusGroupe->setCreatedBy($this->getUser());
        $em->persist($newAnimateur);
        $em->persist($newFocusGroupe);
    
        $em->flush();
        $response = array(
            'code' => 0,
            'message' => 'Focus Groupe created!',
            'errors' => null,
            'result' => null
        );

        return new JsonResponse($response, Response::HTTP_CREATED);
    }

}
