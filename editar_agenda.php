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
		<section>
			<div class="editar">
				<?php
					include 'banco.php';
					
					$id = $_GET['id_servico'];
					$executa = "select * from agendamento where id_servico = '$id'";
					$query = $mysqli->query($executa);
					
					while ($dados = $query -> fetch_object()){
						$id = $dados -> id_servico;
						$nome = $dados -> nome;
						$telefone = $dados -> telefone;
						$horario = $dados -> horario;
						$servico = $dados -> servico;
						$data = $dados -> data;
					}
					$query -> free();
				?>
				<form method="post" action="alteracao_agendamento.php">
					<input type="hidden" name="id_servico" value="<?php echo $id; ?>" maxlength="50" size="50">
					<label id="nome">Nome: </label>
					<input type="text" name="txtnome" id="nome" value="<?php echo $nome; ?>" maxlength="50" size="50">
					<label id="tel">Telefone: </label>
					<input type="text" name="txttelefone" id="tel" value="<?php echo $telefone; ?>" maxlength="9" size="50">
					<label id="horario">Horario: </label>
					<input type="time" name="txthorario" id="horario" value="<?php echo $horario; ?>">
					<label id="servico">Serviço: </label>
					<select name="txtservico" id="servico">
						<option value=" Designer de Sobrancelhas " <?php if($servico == " Designer de Sobrancelhas " )?>> Designer de Sobrancelhas</option>
						<option value="Designer de Sobrancelhas e Aplicação de Henna"<?php if($servico == "Designer de Sobrancelhas e Aplicação de Henna" )?>> Designer de Sobrancelhas e Aplicação de Henna</option>
						<option value="Designer de Sobrancelhas e Cilios"<?php if($servico == "Designer de Sobrancelhas e Cilios" )?>>Designer de Sobrancelhas e Cílios</option>
						<option value=" Extensao de Cilios"<?php if($servico == " Extensao de Cilios" )?>> Extensão de Cílios </option>						
						<option value="Microblanding"<?php if($servico == "Microblanding" )?>>Microblanding</option>
						<option value="Shadow line"<?php if($servico == "Shadow line" )?>>Shadow Line</option>
					</select>
					<label id="data">Data: </label>
					<input type="date" name="txtdata" id="data" value="<?php echo $data; ?>" size="50">
					<button type="submit" id="alterar" value="Alterar" name="alterar">Alterar</button>
				</form>
			</div>
		</section>
	</main>
</body>
</html>