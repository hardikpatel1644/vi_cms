<?php


namespace Vi\CmsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Description of CmsAdmin
 *
 * @author Hardik Patel <hardikpatel1644@gmail.com>
 */
class CmsAdmin extends Admin {

    protected $translationDomain = 'admin';

    /**
     * configure options
     * @param \Sonata\AdminBundle\Route\RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection) {
        parent::configureRoutes($collection);
        $collection->clearExcept(array('list', 'edit', 'create', 'show'));
    }

    /**
     * set what to display in list.
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $list
     */
    protected function configureListFields(ListMapper $list) {
        $list->addIdentifier('cmsTitle', null, array('label' => 'cms.title'));
        $list->add('cms_heading', 'sonata_type_collection', array('label' => 'cms.heading'));
        $list->add('cms_slug', null, array('label' => 'cms.slug'));
        $list->add('cms_content', null, array('label' => 'cms.content'));
        

        $list->add(
            'status', null, array(
            'editable' => true,
            'inline' => true,
            'template' => 'ViCmsBundle:Admin:custom_list_status.html.twig',
            'label' => 'cms.status'
                )
        );
/**        $list->add(
                '_action', 'actions', array(
            'label' => 'cms.votes',
            'actions' => array('show' => array())
        )); */
    }

    /**
     * Function to show all fields
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper) {
        $objFeedback = $this->getSubject();

        $showMapper
                ->with('cms.votes')
                ->add('votes', null, array(
                    'label' => 'cms.votes',
                    'route' => array('name' => 'show'),
                    'template' => 'ViCmsBundle:Admin:custom_list_votes.html.twig',
                        )
                )
                ->end();
    }

    /**
     * Function to render edit fields in edit page
     * @param \Oxind\AdminBundle\Admin\FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper->with('cmsTitle')
                ->add('cmsTitle', null, array('label' => 'cms.title'))
                ->add('cmsHeading', null, array('label' => 'cms.heading'))
                ->add('slug', null, array('label' => 'cms.slug'))
                ->add('cmsContent', 'textarea', array('label' => 'cms.content'))
                ->add('status', null, array('label' => 'cms.status'))
                ->end();
    }

}
