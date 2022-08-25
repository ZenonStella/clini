<?php

// la classe Users sera un enfant de Database
class Users extends DataBase
{
    private int $_users_id;
    private string $_users_mail;
    private string $_users_password;
    private int $_role_id_role;

    // mise en place des setters / getters

    public function setUsersId(int $id)
    {
        $this->_users_id = $id;
    }

    public function getUsersId()
    {
        return $this->_users_id;
    }

    public function setUsersMail(string $mail)
    {
        $this->_users_mail = $mail;
    }

    public function getUsersMail()
    {
        return $this->_users_mail;
    }

    public function setUsersPassword(string $password)
    {
        $this->_users_mail = $password;
    }

    public function getUsersPassword()
    {
        return $this->_users_password;
    }

    public function setUsersRoleId(int $roleId)
    {
        $this->_role_id_role = $roleId;
    }

    public function getUsersRoleId()
    {
        return $this->_role_id_role;
    }

    /**
     * Fonction permettant de savoir si un mail est present dans la table users
     * 
     * @param string $mail : Mail à rechercher
     * 
     * @return bool
     */
    public function checkIfMailExists(string $mail): bool
    {
        // création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        // j'écris la requête me permettant d'aller chercher le mail dans la table users
        // je mets en place un marqueur nominatif :mail
        $sql = "SELECT `users_mail` FROM `users` WHERE `users_mail` = :mail";

        // je prépare la requête que je stock dans $query à l'aide de la méthode ->prepare()
        $query = $pdo->prepare($sql);

        // je lie la valeur du paramètre $mail au marqueur nominatif :mail à l'aide de la méthode ->bindValue()
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        // une fois le mail récupéré, j'execute la requête à l'aide de la méthode ->execute()
        $query->execute();

        // je stock dans $result les données récupèrées à l'aide de la méthode ->fetchAll()
        // afin de ne pas avoir d'erreur lorsque qu'on nous allons compter le tableau
        $result = $query->fetchAll();

        // je fais un count pour savoir si $result est vide
        if (count($result) != 0) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Fonction permettant de récupérer les infos presentes dan sla table users selon le mail reseigné 
     *  
     * @param string $mail : le mail user
     * 
     * @return array : tableau contenant les ifos du Users
     */
    public function getInfoUsers(string $mail): array
    {
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM users WHERE users_mail = :mail";
        $query = $pdo->prepare($sql);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}
