<?php

class Product implements JsonSerializable
{

    private string $product_name;
    private string $description;
    private string $category;
    private string $brand;
    private float $price;
    private string $linkImage;

    /**
     * Product constructor.
     * @param string $product_name
     * @param string $description
     * @param string $category
     * @param string $brand
     * @param float $price
     * @param string $linkImage
     */
    public function __construct(string $product_name, string $description, string $category, string $brand, float $price, string $linkImage)
    {
        $this->product_name = $product_name;
        $this->description = $description;
        $this->category = $category;
        $this->brand = $brand;
        $this->price = $price;
        $this->linkImage=$linkImage;
//        $this->articleCard = $this->getCard();
    }

    /**
     * @return string
     */
    public function getLinkImage(): string {
        return $this->linkImage;
    }

    /**
     * @param string $linkImage
     */
    public function setLinkImage(string $linkImage): void {
        $this->linkImage = $linkImage;
    }


    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->product_name;
    }

    /**
     * @param string $product_name
     */
    public function setProductName(string $product_name): void
    {
        $this->product_name = $product_name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
        return get_object_vars($this);
    }
}