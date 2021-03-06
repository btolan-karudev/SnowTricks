<?php

namespace App\Entity;

use App\Service\UploaderHelper;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="5", minMessage="Le titre de l'image doit faire au moins 10 caractères")
     */
    private $caption;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trick", inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trick;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $star;

    public function __construct(Trick $trick)
    {
        $this->trick = $trick;
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    public function setTrick($trick): ?Trick
    {
        $this->trick = $trick;

        return $trick;
    }

    public function getTrick(): ?Trick
    {
        return $this->trick;
    }


    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getImagePath(): string
    {
        return UploaderHelper::TRICK_IMAGE . '/' . $this->getFilename();
    }

    public function getStar(): ?bool
    {
        return $this->star;
    }

    public function setStar(?bool $star): self
    {
        $this->star = $star;

        return $this;
    }


}
