<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastro de Posições</title>
	</head>
	<body>
		<form method="POST" action="/posicaoJogador">
			<div>
				<label>Posição: </label>
				<input type="text" name="posicao" value="{{ $posicao_jogador->posicao }}" />
			</div>
			<div>
				<label>Descrição: </label>
				<input type="text" name="descricao" value="{{ $posicao_jogador->descricao }}" />
			</div>
			<div>
				@csrf
				<input type="hidden" name="id" />
				<button type="submit">Salvar</button>
				<a href="/posicaoJogador">Novo</a>
			</div>
		</form>
		<table>
			<thead>
				<tr>
					<th>Posição</th>
					<th>Descrição</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			@foreach ($posicao_jogadores as $posicao_jogador)
				<tbody>
					<td>{{ $posicao_jogador->posicao }}</td>
					<td>{{ $posicao_jogador->descricao }}</td>
					<td>
						<a href="/posicaoJogador/{{ $posicao_jogador->id }}/edit">Editar</a>
					</td>
					<td>
						<form method="POST" action="/posicaoJogador/{{ $posicao_jogador->id }}">
							@csrf
							<input type="hidden" name="_method" value="DELETE" />
							<button type="submit" onclick="return confirm('Deseja realmente excluir?');">Excluir</button>
						</form>
					</td>
				</tbody>
			@endforeach
		</table>
	</body>
</html>