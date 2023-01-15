<?php

class Usuarios
{
    // MÉTODO RESPONSÁVEL POR CADASTRAR UM NOVO USUÁRIO NO BANCO DE DADOS
    public function cadastrar($nome, $email, $senha, $telefone)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();
        if ($sql->rowCount() == 0) {
            $sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":telefone", $telefone);
            $sql->execute();
            return true;
        } else {
            return false;
        }
    }

    // MÉTODO RESPONSÁVEL POR EFETUAR LOGIN NO SITE
    public function login($email, $senha)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION["cLogin"] = $dado["id"];
            return true;
        } else {
            return false;
        }
    }

    public function usuarioConectado($id)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT nome FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $dado = array();
        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch(PDO::FETCH_ASSOC);
            return $dado;
        } else {
            return array();
        }
    }

    public function getTotalUsuarios() {
        global $pdo;
        $sql = $pdo->query("SELECT COUNT(*) AS c FROM usuarios");
        $row = $sql->fetch();
        return $row['c'];
    }
}
