<?php

class Post
{
    private int     $id;
    private string  $titre;
    private string  $contenu;
    private string  $chapo;
    private string  $auteur;
    private date    $date_time_publication;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }


    /**
     * @return string
     */
    public function getContenu(): string
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     */
    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }
    /**
     * @return string
     */
    public function getChapo(): string
    {
        return $this->chapo;
    }

    /**
     * @param string $chapo
     */
    public function setChapo(string $chapo): void
    {
        $this->chapo = $chapo;
    }

    /**
     * @return string
     */
    public function getAuteur(): string
    {
        return $this->auteur;
    }

    /**
     * @param string $auteur
     */
    public function setAuteur(string $auteur): void
    {
        $this->auteur = $auteur;
    }

    /**
     * @return date
     */
    public function getDateTimePublication(): date
    {
        return $this->date_time_publication;
    }

    /**
     * @param date $date_time_publication
     */
    public function setDateTimePublication(date $date_time_publication): void
    {
        $this->date_time_publication = $date_time_publication;
    }

    public function allPosts(){
        $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet5;charset=utf8", "root", "");

        $articles = $bdd->query("SELECT id, titre, date_time_publication, chapo FROM articles ORDER BY date_time_publication DESC");

        $posts = [];
        while($row = $articles->fetch()){
            $post = [
                'id' => $row['id'],
                'title' => $row['titre'],
                'chapo' => $row['chapo'],
                'update' => $row['date_time_publication']
            ];
            $posts[] =  $post;
        }

        require('./app/Views/articleList.php');
    }
}