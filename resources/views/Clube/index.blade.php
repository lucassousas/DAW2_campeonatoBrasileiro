<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastro de Clubes</title>
	</head>
	<body>
		<form method="POST">
			<div>
				<label>Nome: </label>
				<input type="text" name="nome" />
			</div>
			<div>
				<label>Escudo: </label>
				<input type="file" name="escudo" />
			</div>
			<div>
				<button type="submit">Salvar</button>
				<a href="/clube">Novo</a>
			</div>
		</form>
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Escudo</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</body>
</html>