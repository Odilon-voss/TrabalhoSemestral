<?php
    include 'db.php';
    date_default_timezone_set('America/Sao_Paulo');

    if(!$_POST['rating']) {
        echo "<script>
        alert('Deve ser informada a avaliação de 0 a 10', location.href = '../public/perguntas.php);
        </script>";
    } else {
        $dataHora = date('Y-m-d H:i:s');
        $dados = [
            1,
            1,
            $_POST['rating'],
            $_POST['feedback'],
            $dataHora
        ];
        $result = insert('avaliacao', ["setor_codigo", "dispositivo_codigo", "avaliacao", "feedback", "datahora"], $dados);
    
        $perguntas = $_POST['pergunta'];
        foreach($perguntas as $iPergunta => $sValor) {
            $dados = [
                $iPergunta,
                $result['avaliacao_codigo'],
                $sValor
            ];
            insert('respostasperguntas', ["pergunta_codigo", "avaliacao_codigo", "resposta"], $dados);
        }
    
        if($result) {
            echo "<script>
                    alert('O Hospital Regional Alto Vale (HRAV) agradece sua resposta e ela é muito importante para nós, pois nos ajuda a melhorar continuamente nossos serviços.', location.href = '../public/perguntas.php');
                  </script>";
        } else {
            echo "<script>
                    alert('Houve falha ao processar a inclusão. Tente novamente', location.href = '../public/perguntas.php);
                    </script>";
        }
    }

?>