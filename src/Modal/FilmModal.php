<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 04/07/2018
 * Time: 10:02
 */

namespace App\Modal;
use App\Entity\Film;
use App\Entity\FilmGenere;
use App\Entity\OscarFilm;
use App\Entity\Tag;
use App\Entity\TagColl;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

class FilmModal
{
    /**
     * @Type("App\Entity\Film")
     * @var \Film
     * @Assert\NotBlank()
     */
    private $film;
    /**
     * @var array
     * @Type("array")
     * @Assert\NotBlank()
     */
    private $genere_id=[];
    /**
     * @Type("array")
     * @var array
     */
    private $tag_name =[];
    /**
     *  @Type("array")
     * @var array
     */
    private $oscar_id=[];

    /**
     * @return Film
     */
    public function getFilm(): Film
    {
        return $this->film;
    }

    /**
     * @param Film $film
     */
    public function setFilm(Film $film): void
    {
        $this->film = $film;
    }

    /**
     * @return array
     */
    public function getGenereId(): array
    {
        return $this->genere_id;
    }

    /**
     * @param array $genere_id
     */
    public function setGenereId(array $genere_id): void
    {
        $this->genere_id = $genere_id;
    }

    /**
     * @return array
     */
    public function getTagName(): array
    {
        return $this->tag_name;
    }

    /**
     * @param array $tag_id
     */
    public function setTagName(array $tag_name): void
    {
        $this->tag_name = $tag_name;
    }

    /**
     * @return array
     */
    public function getOscarId(): array
    {
        return $this->oscar_id;
    }

    /**
     * @param array $oscar_id
     */
    public function setOscarId(array $oscar_id): void
    {
        $this->oscar_id = $oscar_id;
    }




}