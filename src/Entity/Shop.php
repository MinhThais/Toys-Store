<?php

namespace App\Entity;

use App\Repository\ShopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShopRepository::class)
 */
class Shop
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Shopname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Address;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="shop")
     */
    private $Productid;

    public function __construct()
    {
        $this->Productid = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShopname(): ?string
    {
        return $this->Shopname;
    }

    public function setShopname(string $Shopname): self
    {
        $this->Shopname = $Shopname;

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

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProductid(): Collection
    {
        return $this->Productid;
    }

    public function addProductid(Product $productid): self
    {
        if (!$this->Productid->contains($productid)) {
            $this->Productid[] = $productid;
            $productid->setShop($this);
        }

        return $this;
    }

    public function removeProductid(Product $productid): self
    {
        if ($this->Productid->removeElement($productid)) {
            // set the owning side to null (unless already changed)
            if ($productid->getShop() === $this) {
                $productid->setShop(null);
            }
        }

        return $this;
    }
}
