@extends("templates.main")

@section("titulo", "Cadastro de Posições")

@section("formulario")
	<form method="POST" action="/posicaoJogador" class="row">
		<div class="form-group">
			<label>Posição: </label>
			<input type="text" name="posicao" value="{{ $posicao_jogador->posicao }}" class="form-control" />
		</div>
		<div class="form-group">
			<label>Descrição: </label>
			<input type="text" name="descricao" value="{{ $posicao_jogador->descricao }}" class="form-control" />
		</div>
		<div class="form-group">
			@csrf
			<input type="hidden" name="id" class="form-control" />
			<button type="submit" class="btn btn-success">Salvar</button>
			<a href="/posicaoJogador" class="btn btn-primary">Novo</a>
		</div>
	</form>
@endsection

@section("tabela")
	<table class="table table-striped">
		<colgroup>
			<col width="100">
			<col width="400">
			<col width="10">
			<col width="10">
		</colgroup>
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
					<a href="/posicaoJogador/{{ $posicao_jogador->id }}/edit" class="btn btn-warning">Editar</a>
				</td>
				<td>
					<form method="POST" action="/posicaoJogador/{{ $posicao_jogador->id }}">
						@csrf
						<input type="hidden" name="_method" value="DELETE" />
						<button type="submit" onclick="return confirm('Deseja realmente excluir?');" class="btn btn-danger">Excluir</button>
					</form>
				</td>
			</tbody>
		@endforeach
	</table>
@endsection