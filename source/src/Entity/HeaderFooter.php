<?php

namespace App\Entity;

use App\Repository\HeaderFooterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HeaderFooterRepository::class)]
class HeaderFooter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageForm = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $copyright = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $textCenter = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $privacyPolicy = null;

    #[ORM\Column(length: 255)]
    private ?string $Phone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $policyLink = null;

    #[ORM\Column(length: 255)]
    private ?string $policyTitle = null;

    #[ORM\ManyToMany(targetEntity: Menu::class)]
    private Collection $menu;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vacancyListSeoTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vacancyListSeoKeywords = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vacancyListSeoDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pageListSeoTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pageListSeoKeywords = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pageListSeoDescription = null;



    public function __construct()
    {
        $this->menu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getImageForm(): ?string
    {
        return $this->imageForm;
    }

    public function setImageForm(?string $imageForm): static
    {
        $this->imageForm = $imageForm;

        return $this;
    }




    public function getCopyright(): ?string
    {
        return $this->copyright;
    }

    public function setCopyright(string $copyright): static
    {
        $this->copyright = $copyright;

        return $this;
    }

    public function getTextCenter(): ?string
    {
        return $this->textCenter;
    }

    public function setTextCenter(string $textCenter): static
    {
        $this->textCenter = $textCenter;

        return $this;
    }

    public function getPrivacyPolicy(): ?string
    {
        return $this->privacyPolicy;
    }

    public function setPrivacyPolicy(string $privacyPolicy): static
    {
        $this->privacyPolicy = $privacyPolicy;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->Phone;
    }

    public function setPhone(string $Phone): static
    {
        $this->Phone = $Phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPolicyLink(): ?string
    {
        return $this->policyLink;
    }

    public function setPolicyLink(string $policyLink): static
    {
        $this->policyLink = $policyLink;

        return $this;
    }

    public function getPolicyTitle(): ?string
    {
        return $this->policyTitle;
    }

    public function setPolicyTitle(string $policyTitle): static
    {
        $this->policyTitle = $policyTitle;

        return $this;
    }

    /**
     * @return Collection<int, Menu>
     */
    public function getMenu(): Collection
    {
        return $this->menu;
    }

    public function addMenu(Menu $menu): static
    {
        if (!$this->menu->contains($menu)) {
            $this->menu->add($menu);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): static
    {
        $this->menu->removeElement($menu);

        return $this;
    }

    public function getVacancyListSeoTitle(): ?string
    {
        return $this->vacancyListSeoTitle;
    }

    public function setVacancyListSeoTitle(?string $vacancyListSeoTitle): static
    {
        $this->vacancyListSeoTitle = $vacancyListSeoTitle;

        return $this;
    }

    public function getVacancyListSeoKeywords(): ?string
    {
        return $this->vacancyListSeoKeywords;
    }

    public function setVacancyListSeoKeywords(?string $vacancyListSeoKeywords): static
    {
        $this->vacancyListSeoKeywords = $vacancyListSeoKeywords;

        return $this;
    }

    public function getVacancyListSeoDescription(): ?string
    {
        return $this->vacancyListSeoDescription;
    }

    public function setVacancyListSeoDescription(?string $vacancyListSeoDescription): static
    {
        $this->vacancyListSeoDescription = $vacancyListSeoDescription;

        return $this;
    }

    public function getPageListSeoTitle(): ?string
    {
        return $this->pageListSeoTitle;
    }

    public function setPageListSeoTitle(?string $pageListSeoTitle): static
    {
        $this->pageListSeoTitle = $pageListSeoTitle;

        return $this;
    }

    public function getPageListSeoKeywords(): ?string
    {
        return $this->pageListSeoKeywords;
    }

    public function setPageListSeoKeywords(?string $pageListSeoKeywords): static
    {
        $this->pageListSeoKeywords = $pageListSeoKeywords;

        return $this;
    }

    public function getPageListSeoDescription(): ?string
    {
        return $this->pageListSeoDescription;
    }

    public function setPageListSeoDescription(?string $pageListSeoDescription): static
    {
        $this->pageListSeoDescription = $pageListSeoDescription;

        return $this;
    }
}
