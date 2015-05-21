<?php

namespace App\Domain;


class Paragraph
{
    private $text;
    /**
     * @var Image
     */
    private $image;

    public function __construct($text, Image $image)
    {

        $this->text = $text;
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param Image $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

}