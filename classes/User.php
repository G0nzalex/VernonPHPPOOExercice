<?php

class User
{
    private string $nomUser;
    private string $prenomUser;
    private string $email;
    private string $dateNaissance;
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
        return isset($this->email) ? $this->email : false;
    }
    public function setemail(string $email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->email = $email;
            return true;
        }
        else
            return false;
    }
    public function getdateNaissance() : string|bool
    {
        return isset($this->dateNaissance) ? $this->dateNaissance : false;
    }
    public function setdateNaissance(string $dateNaissance): void
    {
        $this->dateNaissance = $dateNaissance;
    }
}