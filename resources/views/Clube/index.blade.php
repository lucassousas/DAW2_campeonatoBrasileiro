<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastro de Clubes</title>
	</head>
	<body>
		<form method="POST" action="/clube">
			<div>
				<label>Nome: </label>
				<input type="text" name="nome" value="{{ $clube->nome }}" />
			</div>
			<div>
				<label>Escudo: </label>
				<input type="file" name="escudo" value="{{ $clube->escudo }}" />
			</div>
			<div>
				@csrf
				<input type="hidden" name="id">
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
				@foreach ($clubes as $clube)
					<tr>
						<td>{{ $clube->nome }}</td>
						<td></td>
						<td>
							<a href="/clube/{{ $clube->id }}/edit">Editar</a>
						</td>
						<td>
							<form method="POST" action="/clube/{{ $clube->id }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE" />
								<button type="submit" onclick="return confirm('Deseja realmente excluir?');">Excluir</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</body>
</html>