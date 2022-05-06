<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastro de Jogadores</title>
	</head>
	<body>
		<form method="POST" action="/jogador" class="row" enctype="multipart/form-data">
			<div>
				<label>Nome: </label>
				<input type="text" name="nome" value="{{ $jogador->nome }}" />
			</div>
			<div>
				<label>Data de Nascimento: </label>
				<input type="date" name="dataNasc" value="{{ $jogador->dataNasc }}" />
			</div>
			<div>
				<label>Clube: </label>
				
			</div>
			<div>
				<label>Posição: </label>

			</div>
			<div>
				@csrf
				<input type="hidden" name="id">
				<button type="submit">Salvar</button>
				<a href="/jogador">Novo</a>
			</div>
		</form>
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Clube</th>
					<th>Posição</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			@foreach ($jogadores as $jogador)
				<tbody>
					<tr>
						<td>{{ $jogador->nome }}</td>
						<td></td>
						<td></td>
						<td>
							<a href="/jogador/{{ $jogador->id }}/edit">Editar</a>
						</td>
						<td>
							<form method="POST" action="/jogador/{{ $jogador->id }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE" />
								<button type="submit" onclick="return confirm('Deseja realmente excluir?');">Excluir</button>
							</form>
						</td>
					</tr>
				</tbody>
			@endforeach
		</table>
	</body>
</html>