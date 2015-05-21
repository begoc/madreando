<?php

namespace App\Domain;


use Illuminate\Support\Collection;

class Article
{
    private $title;
    /**
     * @var Metadata
     */
    private $metadata;
    /**
     * @var Collection
     */
    private $paragraphs;
    /**
     * @var Image
     */
    private $signature;
    private $uri;

    public function __construct($title, Metadata $metadata, Collection $paragraphs, Image $signature, $uri)
    {

        $this->title = $title;
        $this->metadata = $metadata;
        $this->paragraphs = $paragraphs;
        $this->signature = $signature;
        $this->uri = $uri;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return Metadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param Metadata $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return Collection
     */
    public function getParagraphs()
    {
        return $this->paragraphs;
    }

    /**
     * @param Collection $paragraphs
     */
    public function setParagraphs($paragraphs)
    {
        $this->paragraphs = $paragraphs;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param Image $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param mixed $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }
}