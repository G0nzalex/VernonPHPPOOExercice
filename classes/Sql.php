<?php

class Sql
{
    private string $serverName = "localhost";
    private string $userName = "root";
    private string $database = "poo";
    private string $userPassword = "";
    private object $connexion;
    private string $emailUser;
    private string $password;

    public function __construct()
    {
        try 
        {
            $this->connexion = new PDO("mysql:host=$this->serverName;
            dbname=$this->database", $this->userName, $this->userPassword);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            die("Erreur : " . $e->getMessage());
        }
    }
    public function insertion($requete)
    {
        try
        {
            $this->connexion->beginTransaction();
            $this->connexion->exec($requete);
            $this->connexion->commit();
        }
        catch(PDOException $e)
        {
            die("Erreur : " . $e->getMessage());
        }
    }
    public function signIn()
    {

    }
    public function login($emailUser, $password)
    {   
        $this->connexion->prepare("SELECT * FROM USERS WHERE USERMAIL='$emailUser'");
        $this->connexion->execute();
        $resultat = $this->connexion->fetchAll(PDO::FETCH_OBJ);
        
       
        if(count($resultat) === 0) {
            echo "Pas de résultat avec votre login/mot de passe";
        }

        else {
            $passwordRequete = $resultat[0]->MDP;
            if(password_verify($password, $passwordRequete)) {
                if(!isset($_SESSION['login'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['nom'] = $resultat[0]->nom;
                    $_SESSION['prenom'] = $resultat[0]->prenom;
                    $_SESSION['role'] = $resultat[0]->idrole;
                    echo "<script>
                    document.location.replace('http://localhost/VernonPHPPOOExercice/');
                    </script>";
                }
                else {
                    echo "<p>Vous êtes déjà connecté, donc vous navez rien à faire ici";
                }
            }
            else {
                echo "Bien tenté, mais non";
            }
        }
    }
    public function __destruct()
    {
        unset($this->connexion);
    }
}