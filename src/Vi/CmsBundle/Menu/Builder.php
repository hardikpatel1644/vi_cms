<?php

namespace Vi\CmsBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Description of Builder
 *
 * @author Hardik Patel <hardikpatel1644@gmail.com>
 */
class Builder extends ContainerAware {

    /**
     * 
     * @param \Knp\Menu\FactoryInterface $factory
     * @param array $options
     * @return type
     */
    public function mainMenu(FactoryInterface $factory, array $options) {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $repository = $em->getRepository('ViCmsBundle:Cms');
        $asCms = $repository->findAllOrderedByName();
        $menu = $factory->createItem('root', array("attributes" => array("class" => 'nav navbar-nav')));
        $menu->setChildrenAttributes(array("class" => 'nav navbar-nav'));
        $menu->addChild('Home', array('route' => 'vi_cms_homepage', 'attributes' => array('class' => 'active')));
        foreach ($asCms as $asValue) {

            $menu->addChild($asValue['cmsTitle'], array(
                'route' => 'vi_cms_page',
                'routeParameters' => array('slug' => $asValue['slug'])
            ));
        }
        $menu->setCurrent($this->container->get('request')->getRequestUri());
        return $menu;
    }

}
