@extends("templates.main")

@section("titulo", "Cadastro de Jogadores")

@section("formulario")
	<form method="POST" action="/jogador" class="row" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nome: </label>
			<input type="text" name="nome" value="{{ $jogador->nome }}" class="form-control" />
		</div>
		<div class="form-group">
			<label>Data de Nascimento: </label>
			<input type="date" name="dataNasc" value="{{ $jogador->dataNasc }}" class="form-control" />
		</div class="form-group">
		<div>
			<label>Clube: </label>
			
		</div>
		<div class="form-group">
			<label>Posição: </label>

		</div>
		<div class="form-group">
			@csrf
			<input type="hidden" name="id" class="form-control">
			<button type="submit" class="btn btn-success">Salvar</button>
			<a href="/jogador" class="btn btn-primary">Novo</a>
		</div>
	</form>
@endsection

@section("tabela")
	<table class="table table-striped">
		<colgroup>
			<col width="300">
			<col width="200">
			<col width="100">
			<col width="60">
			<col width="60">
		</colgroup>
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
						<a href="/jogador/{{ $jogador->id }}/edit" class="btn btn-warning">Editar</a>
					</td>
					<td>
						<form method="POST" action="/jogador/{{ $jogador->id }}">
							@csrf
							<input type="hidden" name="_method" value="DELETE" />
							<button type="submit" onclick="return confirm('Deseja realmente excluir?');" class="btn btn-danger">Excluir</button>
						</form>
					</td>
				</tr>
			</tbody>
		@endforeach
	</table>
@endsection