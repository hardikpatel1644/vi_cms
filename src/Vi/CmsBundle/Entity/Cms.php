<?php

namespace Vi\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Cms
 *
 * @author Hardik Patel <hardikpatel1644@gmail.com>
 */

/**
 * Description of Cms
 *
 * @ORM\Entity(repositoryClass="Vi\CmsBundle\Entity\Repository\CmsRepository")
 * @ORM\Table(name="cms")
 */
class Cms {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="cms_title",type="string", length=50, unique=true)
     * @Assert\NotBlank()
     */
    private $cmsTitle;

    /**
     * @ORM\Column(name="cms_heading",type="string", length=50)
     */
    private $cmsHeading;

    /**
     * @ORM\Column(name="cms_slug",type="string", length=100)
     */
    private $slug;

    /**
     * @ORM\Column(name="cms_content",type="text")
     */
    private $cmsContent;

    /**
     * @ORM\Column(name="status", type="boolean")
     * @Assert\Choice({"1", "0"})
     */
    private $status;

    /**
     * 
     * @param type $cmsTitle
     * @return \Vi\CmsBundle\Entity\Cms
     */
    public function setCmsTitle($cmsTitle) {
        $this->cmsTitle = $cmsTitle;
        return $this;
    }

    /**
     * 
     * @return type
     */
    public function getCmsTitle() {
        return $this->cmsTitle;
    }

    /**
     * 
     * @param type $cmsHeading
     * @return \Vi\CmsBundle\Entity\Cms
     */
    public function setCmsHeading($cmsHeading) {
        $this->cmsHeading = $cmsHeading;
        return $this;
    }

    /**
     * 
     * @return type
     */
    public function getCmsHeading() {
        return $this->cmsHeading;
    }

    /**
     * 
     * @param type $slug
     * @return \Vi\CmsBundle\Entity\Cms
     */
    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    /**
     * 
     * @return type
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * 
     * @param type $cmsContent
     * @return \Vi\CmsBundle\Entity\Cms
     */
    public function setCmsContent($cmsContent) {
        $this->cmsContent = $cmsContent;
        return $this;
    }

    /**
     * 
     * @return type
     */
    public function getCmsContent() {
        return $this->cmsContent;
    }

    /**
     * 
     * @param type $cmsContent
     * @return \Vi\CmsBundle\Entity\Cms
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    /**
     * 
     * @return type
     */
    public function getStatus() {
        return $this->status;
    }

}
