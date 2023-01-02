<?php

namespace MyApp\Models;

class Post
{
    private     $id;
    private     $titre;
    private     $contenu;
    private     $chapo;
    private     $auteur;
    private     $date_time_publication;
    private     $id_utilisateur;

    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }

    /**
     * @param mixed $id_utilisateur
     */
    public function setIdUtilisateur($id_utilisateur): void
    {
        $this->id_utilisateur = $id_utilisateur;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getChapo()
    {
        return $this->chapo;
    }

    /**
     * @param mixed $chapo
     */
    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    /**
     * @return mixed
     */
    public function getDateTimePublication()
    {
        return $this->date_time_publication;
    }

    /**
     * @param mixed $date_time_publication
     */
    public function setDateTimePublication($date_time_publication)
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