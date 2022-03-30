<?php
if ((($_POST['address'] == "") || ($_POST['address'] == 0) || !$_POST['address']) || (($_POST['cidade'] == "") || ($_POST['cidade'] == 0) || !$_POST['cidade']) || (($_POST['uf'] == "") || ($_POST['uf'] == 0) || !$_POST['uf'])) {
    echo false;
    return false;
} else {
    define('bd_dns', "mysql:host=localhost; dbname=db_cep_consulta; charset=utf8"); #parte do dns
    define('bd_user', "root"); #parte do dns
    define('bd_pword', "usbw"); #parte do dns

    try { #faz um try catch para instanciar o PDO
        $banco = new PDO(bd_dns, bd_user, bd_pword);
    } catch (\PDOException $e) { #lança a excessão caso haja erro
        exit("Houve um erro na conexão do banco de dados. Error Num: " . $e->getCode() . ". Mensagem do Erro: " . $e->getMessage()); #se tiver erro/exec -> sai do script e exibe uma mensagem
    }
    $stmt = $banco->prepare("SELECT nm_endereco, cd_cep FROM tb_cep WHERE nm_endereco = :address");
    $stmt->bindValue(':address', $_POST['address'], PDO::PARAM_STR);
    try {
        $stmt->execute();
        $contaLinha = $stmt->rowCount();
        if ($contaLinha == 1) {
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            echo $resultado['cd_cep'];
        } else {
            echo false;
            return false; # seta o retorno da função como falso
        }
    } catch (\PDOException $e) {
        exit(false); #se houver um erro, sai do script e exibe o problema
    }
}
