<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="css/styleAdmin.css">
    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.table-container');
            sections.forEach(section => section.style.display = 'none');
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
</head>
<body>
    <button class="voltar" onclick="window.history.back()">Voltar</button>
    <div class="container">
        <div class="menu">
            <button onclick="showSection('avaliacoes')">Visualizar Avaliações</button>
            <button onclick="showSection('perguntas')">Perguntas</button>
            <button onclick="showSection('setores')">Setor</button>
            <button onclick="showSection('dispositivos')">Dispositivo</button>
            <button onclick="showSection('usuarios')">Usuário</button>
        </div>
        <div class="content">
            <div id="avaliacoes" class="table-container">
                <h2>Visualizar Avaliações</h2>
                <?php
                    include '../src/db.php';

                    $sHtml = "
                    <table>
                        <thead>
                            <tr>
                                <th>Setor</th>
                                <th>Dispositivo</th>
                                <th>Avaliação</th>
                                <th>Feedback</th>
                                <th>Data/Hora</th>
                            </tr>
                        </thead>
                        <tbody>";

                    $result = select('avaliacao', ['*']);
                    foreach($result as $linha) {
                        $setor = select('setor', ['descricao'], "setor_codigo = ".$linha['setor_codigo']);
                        $dispositivo = select('dispositivo', ['descricao'], "dispositivo_codigo = ".$linha['dispositivo_codigo']);
                        $sHtml .= "
                        <tr>
                            <td>".$setor[0]['descricao']."</td>
                            <td>".$dispositivo[0]['descricao']."</td>
                            <td>".$linha['avaliacao']."</td>
                            <td>".$linha['feedback']."</td>
                            <td>".$linha['datahora']."</td>
                        </tr>";
                    }

                    $sHtml .= "        
                        </tbody>
                    </table>";
                    echo $sHtml;
                ?>
            </div>

            <div id="perguntas" class="table-container">
                <h2>Perguntas</h2>
                <?php
                    $sHtml = "
                    <table>
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Pergunta</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";

                    $result = select('pergunta', ['*']);
                    foreach($result as $linha) {
                        $sHtml .= "
                        <tr>
                            <td>".$linha['pergunta_codigo']."</td>
                            <td>".$linha['descricao']."</td>
                        </tr>";
                    }

                    $sHtml .= "        
                        </tbody>
                    </table>";
                    echo $sHtml;
                ?>
                <a href ="cadastros/pergunta.php" class="add-a">Adicionar Pergunta</a>
            </div>

            <div id="setores" class="table-container">
                <h2>Setor</h2>
                <?php
                    $sHtml = "
                    <table>
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Setor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";

                    $result = select('setor', ['*']);
                    foreach($result as $linha) {
                        $sHtml .= "
                        <tr>
                            <td>".$linha['setor_codigo']."</td>
                            <td>".$linha['descricao']."</td>
                            <td class=\"actions\">
                                <button class=\"delete\">Excluir</button>
                            </td>
                        </tr>";
                    }

                    $sHtml .= "        
                        </tbody>
                    </table>";
                    echo $sHtml;
                ?>
                <a href ="cadastros/setor.php" class="add-a">Adicionar Setor</a>
            </div>

            <div id="dispositivos" class="table-container">
                <h2>Dispositivo</h2>
                <?php
                    $sHtml = "
                    <table>
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Dispositivo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";

                    $result = select('dispositivo', ['*']);
                    foreach($result as $linha) {
                        $sHtml .= "
                        <tr>
                            <td>".$linha['dispositivo_codigo']."</td>
                            <td>".$linha['descricao']."</td>
                            <td class=\"actions\">
                                <button class=\"delete\">Excluir</button>
                            </td>
                        </tr>";
                    }

                    $sHtml .= "        
                        </tbody>
                    </table>";
                    echo $sHtml;
                ?>
                <a href ="cadastros/dispositivo.php" class="add-a">Adicionar Dispositivo</a>
            </div>
            <div id="usuarios" class="table-container">
                <h2>Usuário</h2>
                <?php
                    $sHtml = "
                    <table>
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Login</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";

                    $result = select('usuario', ['*']);
                    foreach($result as $linha) {
                        $sHtml .= "
                        <tr>
                            <td>".$linha['usuario_codigo']."</td>
                            <td>".$linha['login']."</td>
                            <td class=\"actions\">
                                <button class=\"delete\">Excluir</button>
                            </td>
                        </tr>";
                    }

                    $sHtml .= "        
                        </tbody>
                    </table>";
                    echo $sHtml;
                ?>
                <a href ="cadastros/usuario.php" class="add-a">Adicionar Usuário</a>
            </div>
        </div>
    </div>
</body>
</html>