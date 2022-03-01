<?php

class User
{
    private string $nomUser;
    private string $prenomUser;
    private string $emailUser;
    private string $dateDeNaissanceUser;
    private int $role;

    public function getNomUser() : string|bool
    {
        return isset($this->nomUser) ? $this->nomUser : false;
    }
    public function setNomUser(string $nom): void
    {
        $this->nomUser = $nom;
    }
    public function getprenomUser() : string|bool
    {
        return isset($this->prenomUser) ? $this->prenomUser : false;
    }
    public function setprenomUser(string $prenom): void
    {
        $this->prenomUser = $prenom;
    }
    public function getemail() : string|bool
    {
        return isset($this->emailUser) ? $this->emailUser : false;
    }
    public function setemail(string $email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->emailUser = $email;
            return true;
        }
        else
            return false;
    }
    public function getdateNaissance() : string|bool
    {
        return isset($this->dateDeNaissanceUser) ? $this->dateDeNaissanceUser : false;
    }
    public function setdateNaissance(string $dateNaissance): void
    {
        $this->dateDeNaissanceUser = $dateNaissance;
    }

    public function inscription(Sql $c) // équivalent à new SQL()
    {
        $requete = "INSERT INTO users (usernom, userprenom, usermail, userdatenaissance, id_role)
        VALUES ('$this->nomUser', '$this->prenomUser', '$this->emailUser', '$this->dateDeNaissanceUser' , 2)";
        $c->insertion($requete);
    }
    // public function seConnecter(Sql $c)
    // {
    //     $query = "SELECT * FROM users WHERE usermail ='$emailUser'";
    //     $query->execute();
    //     $resultat = $query->fetchAll(PDO::FETCH_ASSOC);

    //     if (count($resultat === 0))
    //     {
    //         $messageErreur = 'Votre email n\'existe pas';
    //         return $messageErreur;
    //     }
    //     $c->insertion($query);
    // }
}