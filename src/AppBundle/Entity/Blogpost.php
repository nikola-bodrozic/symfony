<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blogpost
 *
 * @ORM\Table(name="blogpost")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BlogpostRepository")
 */
class Blogpost
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=12)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="blogtext", type="text")
     */
    private $blogtext;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Blogpost
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Blogpost
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set blogtext
     *
     * @param string $blogtext
     * @return Blogpost
     */
    public function setBlogtext($blogtext)
    {
        $this->blogtext = $blogtext;

        return $this;
    }

    /**
     * Get blogtext
     *
     * @return string 
     */
    public function getBlogtext()
    {
        return $this->blogtext;
    }
}
