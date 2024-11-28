<?php
    date_default_timezone_set('America/Sao_Paulo');
    $conexao = json_decode(file_get_contents('../config/config.env'));
    try {
        $database = $conexao->database;
        $dbconn = pg_connect("host=".$database->host." port=".$database->port." dbname=".$database->dbname." user=".$database->user." password=".$database->password);

        if($dbconn) {
            
            $dataHora = date('Y-m-d H:i:s');

            $dados = [
                $_POST['rating'],
                $dataHora
            ];

            $result = pg_query_params(
                $dbconn,
                "INSERT INTO avaliacao (AVARESPOSTA, AVADATAHORA)
                 VALUES ($1, $2)",
                $dados
            ); 

            if($result) {
                echo "<script>
                        alert('Dados inseridos com sucesso.');
                        location.href = '/php/exercs/bd/01_cadastro_pessoa.html';
                      </script>";
            } else {
                echo "<script>
                        alert('Houve falha ao processar a inclusão. Tente novamente');
                      </script>";
            }
        }
    } catch (Exception $e){
        echo "<script>
                alert('Houve falha ao processar a inclusão. " . $e->getMessage() . ");
             </script>";
    }
?>