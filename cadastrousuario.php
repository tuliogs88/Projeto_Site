<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <script type="text/javascript" src="JS/efeitos.js"></script>
    <title>Projeto Faculdade 5 Semestre</title>
</head>
<body>
    <header>
        <div class="itens_header">
            <div id="logo">
                <img src="Imagens/logo.jpg" width="250" height="150">
            </div>
            <div id="links">
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="galeria.html">Galeria</a></li>
                        <li><a href="agendamentos.html">Agendamentos</a></li>
                        <li><a href="contatos.html">Contatos</a></li>
                        <li><a href="localizacao.html">Localização</a></li>
                        <li><a href="videos.html">Videos</a></li>
                        <li><a href="administracao.html">administração</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <section class="principal" style="display: flex; flex-direction: row; justify-content: center; margin-left: 215px; padding-bottom: 310px;">
            <div class="cadastro_usuario">
                <h2 class="titulo_galeria">Cadastro de Funcionário</h2>
                <form method="post" action="cadastroefetuado.php">
                    <label id="nome_adm">Nome: </label>
                    <input type="text" id="nome_adm" name="nome_usuario" required>
                    <label id="senha_adm">Senha: </label>
                    <input type="password" id="senha_adm" name="senha_usuario" required>
                    <label id="funcao">Cargo: </label>
                    <select name="funcao_usuario" id="funcao" required>
                        <option selected disabled value="">--Selecione o serviço desejado--</option>
                        <option value="dona">Dona</option>
                        <option value="assistente">Assistente</option>
                    </select>
                    <button id="confirmar" type="submit" name="enviar">Enviar</button>
                    <button id="limpar" type="reset" name="limpar">Limpar</button>
            </div>
        </section>
    </main>
    <footer style="display: flex; margin-left: 160px;">
        <strong>Siga a Daiane Santos no Instagram</strong>
        <a href="https://instagram.com/sobrancelhasda_dai?igshid=sn1sunztshxh"><img src="Imagens/instagram.svg"></a>
    </footer>
</body>
</html>