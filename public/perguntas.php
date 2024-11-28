<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Satisfação</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="survey-container">
        <h1>Pesquisa de Satisfação</h1>
        <p>Com base na sua experiência em nossa instituição, em uma escala de 0 (MUITO INSATISFEITO) a 10 (COMPLETAMENTE SATISFEITO), 
        o quão provável você recomendaria nossos serviços a um amigo e/ou familiar?</p>
        
        <form action="../src/perguntas.php" method="POST">
            <div class="scale">
                <input type="radio" id="rating0" name="rating" value="0">
                <label for="rating0" class="scale-btn">0</label>
                
                <input type="radio" id="rating1" name="rating" value="1">
                <label for="rating1" class="scale-btn">1</label>
                
                <input type="radio" id="rating2" name="rating" value="2">
                <label for="rating2" class="scale-btn">2</label>
                
                <input type="radio" id="rating3" name="rating" value="3">
                <label for="rating3" class="scale-btn">3</label>
                
                <input type="radio" id="rating4" name="rating" value="4">
                <label for="rating4" class="scale-btn">4</label>
                
                <input type="radio" id="rating5" name="rating" value="5">
                <label for="rating5" class="scale-btn">5</label>
                
                <input type="radio" id="rating6" name="rating" value="6">
                <label for="rating6" class="scale-btn">6</label>
                
                <input type="radio" id="rating7" name="rating" value="7">
                <label for="rating7" class="scale-btn">7</label>
                
                <input type="radio" id="rating8" name="rating" value="8">
                <label for="rating8" class="scale-btn">8</label>
                
                <input type="radio" id="rating9" name="rating" value="9">
                <label for="rating9" class="scale-btn">9</label>
                
                <input type="radio" id="rating10" name="rating" value="10">
                <label for="rating10" class="scale-btn">10</label>
            </div>
            
            <label for="feedback">Deixe seu feedback:</label><br>
            <textarea id="feedback" name="feedback" rows="2" cols="60"></textarea><br><br>
        
            <?php
            include '../src/db.php';
            $sHtml = '';
            $result = select('pergunta', ['*']);
            foreach($result as $linha) {
                $idpergunta = $linha['pergunta_codigo'];
                $sHtml .= "
                <label for=\"pergunta[$idpergunta]\">".$linha['descricao']."</label><br>
                <textarea id=\"pergunta[$idpergunta]\" name=\"pergunta[$idpergunta]\" rows=\"2\" cols=\"60\" required></textarea><br><br>";
            }
            echo $sHtml;
            ?>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
