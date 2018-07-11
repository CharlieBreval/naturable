<?php

namespace App\Entity\Admin;

use App\Tools\Sluggifier;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="naturable_therapy")
 * @ORM\Entity(repositoryClass="App\Repository\TherapyRepository")
 */
class Therapy
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $banner;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Admin\TherapyContent", mappedBy="therapy", cascade={"persist"})
     */
    private $contents;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->contents = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        $this->slug = Sluggifier::sluggify($title);

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getContents()
    {
        return $this->contents;
    }

    public function addContent(TherapyContent $content)
    {
        // for a many-to-one association:
        $content->setTherapy($this);

        $this->contents->add($content);
    }

    public function removeContent(TherapyContent $content)
    {
        $this->contents->removeElement($content);
    }

    public function getBanner(): ?string
    {
        return $this->banner;
    }

    public function setBanner(?string $banner): self
    {
        $this->banner = $banner;

        return $this;
    }
}
