<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\HomePageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Action\NotFoundAction;
use ApiPlatform\Metadata\Post;


#[ORM\Entity(repositoryClass: HomePageRepository::class)]
#[ApiResource(operations: [
    new GetCollection()
])]
class HomePage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(type: Types::TEXT)]
    private ?string $fullText = null;

    #[ORM\Column(length: 255)]
    private ?string $seoTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $seoKeywords = null;

    #[ORM\Column(length: 255)]
    private ?string $seoDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $titlePage = null;

    #[ORM\Column(length: 255)]
    private ?string $titleAbout = null;

    #[ORM\ManyToMany(targetEntity: HeaderFooter::class)]
    private Collection $headerFooter;

    #[ORM\Column(length: 255)]
    private ?string $imageDate = null;

    #[ORM\Column(length: 255)]
    private ?string $imageCalendar = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;



    public function __construct()
    {

        $this->headerFooter = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getFullText(): ?string
    {
        return $this->fullText;
    }

    public function setFullText(string $fullText): static
    {
        $this->fullText = $fullText;

        return $this;
    }

    public function getSeoTitle(): ?string
    {
        return $this->seoTitle;
    }

    public function setSeoTitle(string $seoTitle): static
    {
        $this->seoTitle = $seoTitle;

        return $this;
    }

    public function getSeoKeywords(): ?string
    {
        return $this->seoKeywords;
    }

    public function setSeoKeywords(string $seoKeywords): static
    {
        $this->seoKeywords = $seoKeywords;

        return $this;
    }

    public function getSeoDescription(): ?string
    {
        return $this->seoDescription;
    }

    public function setSeoDescription(string $seoDescription): static
    {
        $this->seoDescription = $seoDescription;

        return $this;
    }



    public function getTitlePage(): ?string
    {
        return $this->titlePage;
    }

    public function setTitlePage(string $titlePage): static
    {
        $this->titlePage = $titlePage;

        return $this;
    }



    public function getTitleAbout(): ?string
    {
        return $this->titleAbout;
    }

    public function setTitleAbout(string $titleAbout): static
    {
        $this->titleAbout = $titleAbout;

        return $this;
    }


    /**
     * @return Collection<int, HeaderFooter>
     */
    public function getHeaderFooter(): Collection
    {
        return $this->headerFooter;
    }

    public function addHeaderFooter(HeaderFooter $headerFooter): static
    {
        if (!$this->headerFooter->contains($headerFooter)) {
            $this->headerFooter->add($headerFooter);
        }

        return $this;
    }

    public function removeHeaderFooter(HeaderFooter $headerFooter): static
    {
        $this->headerFooter->removeElement($headerFooter);

        return $this;
    }

    public function getImageDate(): ?string
    {
        return $this->imageDate;
    }

    public function setImageDate(string $imageDate): static
    {
        $this->imageDate = $imageDate;

        return $this;
    }

    public function getImageCalendar(): ?string
    {
        return $this->imageCalendar;
    }

    public function setImageCalendar(string $imageCalendar): static
    {
        $this->imageCalendar = $imageCalendar;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }



}
