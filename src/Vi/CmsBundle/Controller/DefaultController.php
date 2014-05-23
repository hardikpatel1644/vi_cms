<?php

namespace Vi\CmsBundle\Controller;

/*
 * This file is part of the ViCmsBundle package.
 *
 * (c) ViCmsBundle <https://github.com/hardikpatel1644/ViCmsBundle/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Description of DefaultController
 *
 * @author Hardik Patel <hardikpatel1644@gmail.com>
 * @Route("/")
 */
class DefaultController extends Controller {

    /**
     * @Route("/", name="vi_cms_homepage")
     */
    public function indexAction() {
        $request = $this->getRequest();
        $session = $request->getSession();
        $repository = $this->getDoctrine()->getRepository('ViCmsBundle:Cms');
        $asCms = $repository->findAllOrderedByName();
        return $this->render('ViCmsBundle:Default:index.html.twig', array('asCms' => $asCms));
    }

    /**
     * @Route("/api/",name="vi_cms_api")
     * @Method({"GET"})

     * @return type
     */
    public function apiAction() {
        $repository = $this->getDoctrine()->getRepository('ViCmsBundle:Cms');
        $asCms = $repository->findAllOrderedByName();
        $response = new Response();
        $response->setContent(json_encode($asCms));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/{slug}", name="vi_cms_page")
     * @Method({"GET"})
     */
    public function pageAction($slug) {
        $request = $this->getRequest();
        $session = $request->getSession();
        $repository = $this->getDoctrine()->getRepository('ViCmsBundle:Cms');
        $asCms = array();
        $asCms = $repository->findBySlug($slug);

        if (empty($asCms)) {
            return $this->createNotFoundException();
        }
        return $this->render('ViCmsBundle:Default:page.html.twig', array('asCms' => $asCms));
    }

}
