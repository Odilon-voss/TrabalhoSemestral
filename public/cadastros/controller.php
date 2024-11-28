<?php

include '../../src/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_GET['cadastro']) {
        case 'usuario':
            $resultado = insert('usuario', ['login', 'senha'], [$_POST['login'], $_POST['senha']]);       
            break;
        case 'dispositivo':
            $resultado = insert('dispositivo', ['descricao'], [$_POST['descricao']]);       
            break;
        case 'pergunta':
            $resultado = insert('pergunta', ['descricao'], [$_POST['descricao']]);       
            break;
        case 'setor':
            $resultado = insert('setor', ['descricao'], [$_POST['descricao']]);       
            break;
    }

    if ($resultado) {
        echo "<script>
                  alert('Cadastrado realizado com sucesso!.');
              </script>";
    } else {
        echo "<script>
                  alert('Erro ao cadastrar.');
              </script>";
    }
}
?>
