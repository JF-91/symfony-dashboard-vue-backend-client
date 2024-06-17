<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Enums\PostTypeEnum;
use App\Repository\PostRepository;
use Carbon\Carbon;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PostRepository::class)]

#[ApiResource(
    normalizationContext: ['groups' => ['post:read']],
    denormalizationContext: ['groups' => ['post:write']],
    paginationItemsPerPage: 10,
)]
#[ApiFilter(BooleanFilter::class, properties: ['isPublished'])]
class Post
{

    public function __construct() {
        $this->createdAt = new \DateTimeImmutable();
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]

    #[Groups(['post:read', 'post:write'])]
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 180, maxMessage: 'The title must be less than 180 characters')]
    private ?string $title = null;

    #[Groups(['post:read', 'post:write'])]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 10000, maxMessage: 'The description must be less than 10000 characters')]
    #[Assert\Regex(
        pattern: '/<p>(.*?)<\/p>/',
        message: 'The description must be a valid HTML'
    )]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[Groups(['post:read', 'post:write'])]
    #[Assert\Url]
    #[Assert\Length(min: 3, max: 255, maxMessage: 'The URL must be less than 255 characters')]
    #[Assert\Regex(
        pattern: '/(http|https):\/\/[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,}(\/\S*)?/',
        message: 'The URL must be a valid URL'
    )]
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $url_img = null;

    #[Groups(['post:read', 'post:write'])]

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $img_path = null;

    #[Groups(['post:read', 'post:write'])]

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Url]
    private ?string $link = null;

    #[Groups(['post:read', 'post:write'])]
    #[ORM\Column]
    private ?bool $isPublished = false;

    #[Groups(['post:read', 'post:write'])]
    #[ORM\ManyToOne(inversedBy: 'posts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(type: Types::STRING, length: 255, enumType: PostTypeEnum::class, options: ['default' => PostTypeEnum::UNKNOWN])]
    private PostTypeEnum $type;

    public function getId(): ?int
    {
        return $this->id;
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


    #[Groups(['post:read'])]
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /*
    *Return the date in a human readable format
    */
    #[Groups(['post:read'])]
    public function getHumanCreatedAt(): string
    {
        return Carbon::instance($this->createdAt)->diffForHumans();
    }


    /*
    * Return the text description without html tags
    */
    #[Groups(['post:read'])]
    public function getTextDescription(): string
    {
        return strip_tags($this->description);
    }


    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
    
    public function getUrlImg(): ?string
    {
        return $this->url_img;
    }

    public function setUrlImg(?string $url_img): static
    {
        $this->url_img = $url_img;

        return $this;
    }

    public function getImgPath(): ?string
    {
        return $this->img_path;
    }

    public function setImgPath(?string $img_path): static
    {
        $this->img_path = $img_path;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): static
    {
        $this->link = $link;

        return $this;
    }

    public function isPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setPublished(bool $isPublished): static
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getType(): PostTypeEnum
    {
        return $this->type;
    }

    public function setType(PostTypeEnum $type): static
    {
        $this->type = $type;

        return $this;
    }
}
