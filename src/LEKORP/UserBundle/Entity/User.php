<?php

namespace LEKORP\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="app_user")
 * @ORM\Entity(repositoryClass="LEKORP\UserBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Products", mappedBy="owner")
     */
    private $leproducts;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Messages",  cascade={"remove"}, mappedBy="users")
     */
    private $messages;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Messages", cascade={"remove"}, mappedBy="users2")
     */
    private $messages2;




    public function __construct()
    {
        $this->messages = new ArrayCollection();
        $this->messages2 = new ArrayCollection();
        parent::__construct();
        $this->createdAt    = new \DateTime();
        $this->updatedAt    = $this->createdAt;
        $this->leproducts = new ArrayCollection();

    }

    public function setCreatedAt()
    {
        // never used
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @ORM\PreUpdate()
     *
     * @return User
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function __toString()
    {
        return $this->username;
    }

    /**
     * Add message
     *
     * @param \AppBundle\Entity\Messages $message
     *
     * @return User
     */
    public function addMessage(\AppBundle\Entity\Messages $message)
    {
        $this->messages[] = $message;
        return $this;
    }
    /**
     * Remove message
     *
     * @param \AppBundle\Entity\Messages $message
     */
    public function removeMessages($message)
    {
        $this->messages->removeElement($message);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\ArrayCollection  $messages
     *
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Add message2
     *
     * @param \AppBundle\Entity\Messages $message2
     *
     * @return User
     */
    public function addMessage2(\AppBundle\Entity\Messages $message2)
    {
        $this->messages2[] = $message2;
        return $this;
    }
    /**
     * Remove message2
     *
     * @param \AppBundle\Entity\Messages $message2
     */
    public function removeMessages2($message2)
    {
        $this->messages2->removeElement($message2);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\ArrayCollection  $messages2
     *
     */
    public function getMessages2()
    {
        return $this->messages2;
    }



}