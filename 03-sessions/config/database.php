<?php

    // - - - - - - - - - - - - - - - - - - - - 
    // Connection
    try {
        $conx = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);

        // if ($conx) {
        //     echo "<h4>Connection DB Success ✅ </h4>";
        // }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // - - - - - - - - - - - - - - - - - - - - 
    // LOGIN USERS

    function loginUser($conx, $email, $pass) {
        try {
            $sql = "SELECT * FROM users
            WHERE email = :email LIMIT 1";
            
            $stm = $conx->prepare($sql);
            $stm->execute(['email' => $email]);


            if ($stm->rowCount() > 0) {
 
                        $user = $stm ->fetch();
                        if (password_verify($pass, $user["password"])) {

                            //echo"yupiiiiii usted si esta registrado.....";
                            $_SESSION['uid'] = $user['id'];
                            return true;

                        } else {
                            $_SESSION['error'] = "PASSWORD INCORRECT";
                        return false;

                        } 

            }  else {
                
                $_SESSION['error'] = "EMAIL INCORRECT";
                return false;
            }


            //return $stm->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // - - - - - - - - - - - - - - - - - - - - 
