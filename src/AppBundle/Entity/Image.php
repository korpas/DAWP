<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks()
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // ..... other fields

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="image_upload", fileNameProperty="imageName")

     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Products", inversedBy="prodimg")
     */
    private $prodimgs;

    /**
     * @ORM\OneToOne(targetEntity="LEKORP\UserBundle\Entity\User")
     */
    private $imgprofile;

    public function __construct()
    {

        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime("now");
    }
    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Products
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }




    /**
     * @param string $imageName
     *
     * @return Products
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set prodimg
     *
     * @param \AppBundle\Entity\Products $images
     *
     * @return Image
     */
    public function setProdimgs(\AppBundle\Entity\Products $images)
    {
        $this->prodimgs = $images;
        return $this;
    }
    /**
     * Remove images
     *
     * @param \AppBundle\Entity\Products $images
     */
    public function removeProdimgs(\AppBundle\Entity\Products $images)
    {
        $this->prodimgs->removeElement($images);
    }
    /**
     * Get prodimgs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProdimgs()
    {
        return $this->prodimgs;
    }



    /**
     * @return mixed
     */
    public function getImgprofile()
    {
        return $this->imgprofile;
    }

    /**
     * @param mixed $imgprofile
     */
    public function setImgprofile($imgprofile)
    {
        $this->imgprofile = $imgprofile;
    }


}
