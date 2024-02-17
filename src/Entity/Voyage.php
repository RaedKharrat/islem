<?php

namespace App\Entity;

use App\Repository\VoyageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VoyageRepository::class)]
class Voyage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Programme = null;

    #[ORM\Column(type: "date")]
    private ?\DateTimeInterface $DateDepart = null;

    #[ORM\Column(type: "date")]
    private ?\DateTimeInterface $DateArrive = null;

    #[ORM\Column(length: 255)]
    private ?string $Prix = null;

    #[ORM\OneToMany(targetEntity: Voyageur::class, mappedBy: 'voyage')]
    private Collection $Voyagee;

    public function __construct()
    {
        $this->Voyagee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProgramme(): ?string
    {
        return $this->Programme;
    }

    public function setProgramme(string $Programme): self
    {
        $this->Programme = $Programme;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->DateDepart;
    }

    public function setDateDepart(\DateTimeInterface $DateDepart): self
    {
        $this->DateDepart = $DateDepart;

        return $this;
    }

    public function getDateArrive(): ?\DateTimeInterface
    {
        return $this->DateArrive;
    }

    public function setDateArrive(\DateTimeInterface $DateArrive): self
    {
        $this->DateArrive = $DateArrive;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->Prix;
    }

    public function setPrix(string $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    /**
     * @Assert\LessThan(propertyPath="DateArrive", message="Departure date must be before the arrival date.")
     */
    public function isDateDepartValid(): bool
    {
        return $this->DateDepart < $this->DateArrive;
    }
}


    // /**
    //  * @return Collection<int, Voyageur>
    //  */
    // public function getVoyagee(): Collection
    // {
    //     return $this->Voyagee;
    // }

    // public function addVoyagee(Voyageur $voyagee): static
    // {
    //     if (!$this->Voyagee->contains($voyagee)) {
    //         $this->Voyagee->add($voyagee);
    //         $voyagee->setVoyage($this);
    //     }

    //     return $this;
    // }

    // public function removeVoyagee(Voyageur $voyagee): static
    // {
    //     if ($this->Voyagee->removeElement($voyagee)) {
    //         // set the owning side to null (unless already changed)
    //         if ($voyagee->getVoyage() === $this) {
    //             $voyagee->setVoyage(null);
    //         }
    //     }

    //     return $this;
    // }

