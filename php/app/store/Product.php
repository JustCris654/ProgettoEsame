<?php

class Product implements JsonSerializable
{

    //non mi piace public pero private o protected non crea i json
    private string $product_name;
    private string $description;
    private string $category;
    private string $brand;
    private float $price;
    private string $linkImage;
//    private string $articleCard;

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


//    public function getCard(): string
//    {
//        $card = "<div class='col'>
//                    <div class='card shadow-sm'>
//                        <svg class='bd-placeholder-img card-img-top' width='100%' height='225'
//                             xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: Thumbnail'
//                             preserveAspectRatio='xMidYMid slice' focusable='false'><title> $this->product_name </title>
//                            <image href='https://images-na.ssl-images-amazon.com/images/I/51F79GDGXGL._AC_SL1000_.jpg'
//                                   height='100%' width='100%'></image>
//                        </svg>
//
//                        <div class='card-body'>
//                            <p class='card-text'> $this->product_name </p>
//                            <div class='d-flex justify-content-between align-items-center'>
//                                <div class='btn-group'>
//                                    <button type='button' class='btn btn-sm btn-outline-secondary'>Dettagli</button>
//                                </div>
//                                <button type='button' class='price btn btn-warning'>
//                                $this->price €
//                                </button>
//
//                            </div>
//                        </div>
//                    </div>
//                </div>";
//        return $card;
//    }


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