<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $level = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $estimated_time = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $files = null;

    #[ORM\Column(nullable: true)]
    private ?bool $validated = null;

    #[ORM\ManyToOne(inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Languages $language = null;



    /**
     * @var Collection<int, chapters>
     */
    #[ORM\OneToMany(targetEntity: chapters::class, mappedBy: 'cours')]
    private Collection $chapter;

    /**
     * @var Collection<int, review>
     */
    #[ORM\OneToMany(targetEntity: review::class, mappedBy: 'cours')]
    private Collection $review;

    public function __construct()
    {
        $this->chapter = new ArrayCollection();
        $this->review = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getEstimatedTime(): ?\DateTimeInterface
    {
        return $this->estimated_time;
    }

    public function setEstimatedTime(\DateTimeInterface $estimated_time): static
    {
        $this->estimated_time = $estimated_time;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getFiles(): ?string
    {
        return $this->files;
    }

    public function setFiles(?string $files): static
    {
        $this->files = $files;

        return $this;
    }

    public function isValidated(): ?bool
    {
        return $this->validated;
    }

    public function setValidated(?bool $validated): static
    {
        $this->validated = $validated;

        return $this;
    }

    public function getLanguage(): ?Languages
    {
        return $this->language;
    }

    public function setLanguage(?Languages $language): static
    {
        $this->language = $language;

        return $this;
    }



    /**
     * @return Collection<int, chapters>
     */
    public function getChapter(): Collection
    {
        return $this->chapter;
    }

    public function addChapter(chapters $chapter): static
    {
        if (!$this->chapter->contains($chapter)) {
            $this->chapter->add($chapter);
            $chapter->setCours($this);
        }

        return $this;
    }

    public function removeChapter(chapters $chapter): static
    {
        if ($this->chapter->removeElement($chapter)) {
            // set the owning side to null (unless already changed)
            if ($chapter->getCours() === $this) {
                $chapter->setCours(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, review>
     */
    public function getReview(): Collection
    {
        return $this->review;
    }

    public function addReview(review $review): static
    {
        if (!$this->review->contains($review)) {
            $this->review->add($review);
            $review->setCours($this);
        }

        return $this;
    }

    public function removeReview(review $review): static
    {
        if ($this->review->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getCours() === $this) {
                $review->setCours(null);
            }
        }

        return $this;
    }
}
