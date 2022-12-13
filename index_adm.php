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
			<div class="conteudo">
				<?php
					include 'banco.php';
					session_start();
					
					if(!isset($_SESSION['nome'])) {
						echo "<h2>Você não pode acessar a página. Faça novamente o login</h2>";
						echo "<a href ='index.html'</a>";
						die();
					}
				$nome = $_SESSION["nome"];
				?>
				<h2 class="saudacao">Bem vindo: <?php $nome; ?></h2>
				<a href="index.html">Sair</a>
				<a href="cadastrousuario.php">Cadastro de funcionários</a>
				<h2 class="titulo_galeria">Página de acesso aos funcionários</h2>
				
				<form name="pesquisa" action="index_adm.php" method="post">
					<div id="campo">
						<label>O que desejar pesquisar</label>
						<select name="campo" id="campo" required>
							<option selected disabled value="">Selecione uma opãço</option>
							<option value="agendamento">Agendamento</option>
							<option value="contato">Contato</option>
						</select>
						<label id="data_pesquisa">Data: </label>
						<input type="date" name="data_pesquisa" id="data_pesquisa" required>
						<button type="submit" value="enviar">Enviar</button>
					</div>
				</form>
				<?php
					if (isset($_POST["campo"])) {
						$opcao = $_POST["campo"];
					} else {
						$opcao = "";
					}
					
					if (isset($_POST["data_pesquisa"])) {
						$data_pesquisa = $_POST["data_pesquisa"];
					} else {
						$data_pesquisa = "";
					}
					
					if ($opcao == "" or $data_pesquisa == "") {
						echo "Por favor, preencher os campos acima";
					} else {
						switch ($opcao) {
							case "agendamento":
								$consulta = "Select * from agendamento where data = '$data_pesquisa'";
								$query = $mysqli->query($consulta); ?>
								
								<table>
									<tr>
										<th>ID</th>
										<th>Nome</th>
										<th>Telefone</th>
										<th>Horario</th>
										<th>Serviço</th>
										<th>Data</th>
										<th>Excluir</th>
										<th>Alterar</th>
									</tr>
									<?php
									while ($dados = $query-> fetch_object()) {
										$id = $dados -> id_servico;
										$data = $dados -> data;
										
										if ($data <> "") {
											echo '<tr><td><center>' . $id . '</center></td>';
											echo '<td>' . $dados-> nome . '</td>';
											echo '<td>' . $dados-> telefone . '</td>';
											echo '<td>' . $dados -> horario . '</td>';
											echo '<td>' . $dados -> servico . '</td>';
											echo '<td>' . $data . '</td>';
											
											if ($dados -> id_servico == true) {
												echo "<td><center><a href=excluir_agenda.php?id_servico=$id><img src='Imagens/excluir.jpg' width='10%'></center></td>"; //Imagem Excluir
											} else {
												echo "<td><center><a href=excluir_agenda.php?id_servico=$id><img src='Imagens/checked.jpg' width='10%'></center></td>"; //Imagem Checked
											}
											echo "<td><center><a href=editar_agenda.php?id_servico=$id><img src='Imagens/editar.jpg' width='10%'></center></td></tr>"; //Imagem Editar
										} else {
											echo '<tr><td><center>' . $id . '</center></td>';
											echo '<td>' . $dados-> nome . '</td>';
											echo '<td>' . $dados-> telefone . '</td>';
											echo '<td>' . $dados -> horario . '</td>';
											echo '<td>' . $dados -> servico . '</td>';
											echo '<td>' . $data . '</td>';
											
											if ($dados -> id_servico == true) {
												echo "<td><center><a href=excluir_agenda.php?id_servico=$id><img src='Imagens/excluir.jpg' width='10%'></center></td>"; //Imagem Excluir
											} else {
												echo "<td><center><a href=excluir_agenda.php?id_servico=$id><img src='Imagens/checked.jpg' width='10%'></center></td>"; //Imagem Checked
											}
											echo "<td><center><a href=editar_agenda.php?id_servico=$id><img src='Imagens/editar.jpg' width='10%'></center></td></tr>"; //Imagem Editar
										}
									}
									?>
								</table><?php
										break;
							case "contato":
								$consulta = "Select * from contato where data_mensagem = '$data_pesquisa'";
								$query = $mysqli->query($consulta); ?>
								
								<table>
									<tr>
										<th>ID</th>
										<th>Nome</th>
										<th>Telefone</th>
										<th>Assunto</th>
										<th>Mensagem</th>
										<th>Data da Mensagem</th>
										<th>Excluir</th>
									</tr><?php
									while ($dados = $query-> fetch_object()) {
										$id = $dados -> id;
										$data = $dados -> data_mensagem;
										
										if ($data <> "") {
											echo '<tr><td><center>' . $id . '</center></td>';
											echo '<td>' . $dados-> nome . '</td>';
											echo '<td>' . $dados-> telefone . '</td>';
											echo '<td>' . $dados -> assunto . '</td>';
											echo '<td>' . $dados -> mensagem . '</td>';
											echo '<td>' . $data . '</td>';
											
											if ($dados -> id == true) {
												echo "<td><center><a href=excluir_contato.php?id=$id><img src='Imagens/excluir.jpg' width='10%'></center></td>"; //Imagem Excluir
											} else {
												echo "<td><center><a href=excluir_contato.php?id=$id><img src='Imagens/checked.jpg' width='10%'></center></td>"; //Imagem Checked
											}
										} else {
											echo '<tr><td><center>' . $id . '</center></td>';
											echo '<td>' . $dados-> nome . '</td>';
											echo '<td>' . $dados-> telefone . '</td>';
											echo '<td>' . $dados -> assunto . '</td>';
											echo '<td>' . $dados -> mensagem . '</td>';
											echo '<td>' . $data . '</td>';
											
											if ($dados -> id_servico == true) {
												echo "<td><center><a href=excluir_contato.php?id=$id><img src='Imagens/excluir.jpg' width='10%'></center></td>"; //Imagem Excluir
											} else {
												echo "<td><center><a href=excluir_contato.php?id=$id><img src='Imagens/checked.jpg' width='10%'></center></td>"; //Imagem Checked
											}
										}
									} ?>
								</table> <?php
										break;
						}
					}
				?>
			</div>
		</section>
	</main>
</body>
</html>