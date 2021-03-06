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
        $fileCouverture = $request->files->get('imageCouverture');
        $fileGroupe = $request->files->get('imageGroupe');
        $fileAnimateur = $request->files->get('imageAnimateur');
        $data = json_decode($request->request->get('formModel'));

        $animateur = $data->animateur;
        $newanimateur = new Animateur();
        $focusGroupe = $this->get('jms_serializer')->deserialize(json_encode($data), 'UserBundle\Entity\FocusGroupe', 'json');





       

        $fileNameCouverture = $this->generateUniqueFileName() . '.' . $fileCouverture->guessExtension();
        $fileNameGroupe = $this->generateUniqueFileName() . '.' . $fileGroupe->guessExtension();
        $fileNameAnimateur = $this->generateUniqueFileName() . '.' . $fileAnimateur->guessExtension();
        try {
            $fileCouverture->move($this->getParameter('users_directory'), $fileNameCouverture);
            $fileGroupe->move($this->getParameter('users_directory'), $fileNameGroupe);
            $fileAnimateur->move($this->getParameter('users_directory'), $fileNameAnimateur);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }
        $media = new \UserBundle\Entity\Media();
        $media->setName($fileNameAnimateur);
        $newanimateur->setFirstname($animateur->firstname);
        $newanimateur->setLastname($animateur->firstname);
        $newanimateur->setProfession($animateur->profession);
        $newanimateur->setPhoto($media);

        
        $focusGroupe->setPhotoCouverture($fileNameCouverture);
        $focusGroupe->setPhotoGroupe($fileNameGroupe);
        $focusGroupe->setStatut(5);
        $focusGroupe->setOldStatut(0);
        $focusGroupe->setNom($data->nom);
        $focusGroupe->setRaison($data->raison);
        $focusGroupe->setDescription1($data->description1);
        $focusGroupe->setDescription2($data->description2);
        $focusGroupe->setAnimateur($newanimateur);

        $focusGroupe->setCreatedBy($this->getUser());
        $em->persist($focusGroupe);
        $em->persist($newanimateur);
          $em->persist($media);
;
        $em->flush();


        $response = array(
            'code' => 0,
            'message' => 'Focus Groupe created!',
            'errors' => null,
            'result' => null
        );

        return new JsonResponse($response, Response::HTTP_CREATED);
    }

    /**
     * @return string
     */
    private function generateUniqueFileName() {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

}
