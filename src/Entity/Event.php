<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"events:read", "events:item:get"}},
 *          },
 *          "put",
 *          "delete"
 *     },
 *     normalizationContext={"groups"={"events:read"}, "swagger_defintion_name"="Read"},
 *     denormalizationContext={"groups"={"events:write"}, "swagger_defintion_name"="Write"},
 *     shortName="events"
 * )
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"events:read", "events:write", "user:read", "user:write"})
     * @Assert\Length(
     *     min=2,
     *     max=50,
     *     maxMessage="Date and Time"
     * )
     */
    private $Start;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"events:read", "events:write", "user:read", "user:write"})
     * @Assert\Length(
     *     min=2,
     *     max=50,
     *     maxMessage="Date and Time"
     * )
     */
    private $End;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"events:read", "events:write", "user:read", "user:write"})
     * @Assert\Length(
     *     min=2,
     *     max=50,
     *     maxMessage="LastName, FristName"
     * )
     */
    private $Title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"events:read", "events:write", "user:read", "user:write"})
     */
    private $Content;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"events:read", "events:write", "user:read", "user:write"})
     */
    private $ContentFull;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"events:read", "events:write", "user:read", "user:write"})
     */
    private $Gender;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"events:read", "events:write", "user:read", "user:write"})
     */
    private $Email;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="events")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"events:read", "events:write"})
     * @Assert\Valid()
     */
    private $owner;

    public function __construct()
    {
        $this->owner = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStart(): ?string
    {
        return $this->Start;
    }

    public function setStart(string $Start): self
    {
        $this->Start = $Start;

        return $this;
    }

    public function getEnd(): ?string
    {
        return $this->End;
    }

    public function setEnd(string $End): self
    {
        $this->End = $End;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(?string $Content): self
    {
        $this->Content = $Content;

        return $this;
    }

    public function getContentFull(): ?string
    {
        return $this->ContentFull;
    }

    public function setContentFull(?string $ContentFull): self
    {
        $this->ContentFull = $ContentFull;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->Gender;
    }

    public function setGender(string $Gender): self
    {
        $this->Gender = $Gender;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getOwner(): Collection
    {
        return $this->owner;
    }

    public function addOwner(User $owner): self
    {
        if (!$this->owner->contains($owner)) {
            $this->owner[] = $owner;
        }

        return $this;
    }

    public function removeOwner(User $owner): self
    {
        if ($this->owner->contains($owner)) {
            $this->owner->removeElement($owner);
        }

        return $this;
    }
}
