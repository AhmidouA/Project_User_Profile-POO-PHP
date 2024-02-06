<?php

class Manager {
    private $bddPDO;

    /* CONSTUCT */
    function __construct(PDO $db)
    {
        $this->bddPDO = $db;
    }

    /* METHODE */
    function insert(Users $user)
    {
        $request = $this->bddPDO->prepare('INSERT INTO users(lastName, firstName, email, phone) 
            value (:lastName, :firstName, :email, :phone)');

        $request->bindValue(':lastName', $user->getLastName());
        $request->bindValue(':firstName', $user->getFirstName());
        $request->bindValue(':email', $user->getEmail());
        $request->bindValue(':phone', $user->getPhone());

        $request->execute();
        $request->closeCursor();
    }

    function getUsers()
    {
        $request = $this->bddPDO->query('SELECT * FROM users_db.users ORDER BY lastName ASC');
        $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');

        $allUsers = $request->fetchAll();
        $request->closeCursor();

        return $allUsers;
    }

    function getUser($userId)
    {
        $request = $this->bddPDO->prepare('SELECT * FROM users WHERE id =:id');

        $request->bindValue(':id', (int)$userId, PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');

        $user = $request->fetch();
        $request->closeCursor();
        return $user;
    }

    function updateUser(Users $user)
    {
        $request = $this->bddPDO->prepare('UPDATE users 
            SET lastName=:lastName, firstName=:firstName, email=:email, phone=:phone
            WHERE id=:id');

        $request->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        $request->bindValue(':lastName', $user->getLastName());
        $request->bindValue(':firstName', $user->getFirstName());
        $request->bindValue(':email', $user->getEmail());
        $request->bindValue(':phone', $user->getPhone());

        $request->execute();
        $request->closeCursor();
    }

    function deleteUser($id)
    {

        $this->bddPDO->exec('DELETE FROM users WHERE id=' . (int)$id);
    }
}
