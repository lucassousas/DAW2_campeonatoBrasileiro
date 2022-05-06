@extends("templates.main")

@section("titulo", "Cadastro de Clubes")

@section("formulario")
	<form method="POST" action="/clube" class="row">
		<div class="form-group">
			<label>Nome: </label>
			<input type="text" name="nome" value="{{ $clube->nome }}" class="form-control" />
		</div>
		<div class="form-group">
			<label>Escudo: </label>
			<input type="file" name="escudo" value="{{ $clube->escudo }}" class="form-control" />
		</div>
		<div class="form-group">
			@csrf
			<input type="hidden" name="id" class="form-control" />
			<button type="submit" class="btn btn-success">Salvar</button>
			<a href="/clube" class="btn btn-primary">Novo</a>
		</div>
	</form>
@endsection

@section("tabela")
	<table class="table table-striped">
		<colgroup>
			<col width="100">
			<col width="200">
			<col width="80">
			<col width="80">
		</colgroup>
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
						<a href="/clube/{{ $clube->id }}/edit" class="btn btn-warning">Editar</a>
					</td>
					<td>
						<form method="POST" action="/clube/{{ $clube->id }}">
							@csrf
							<input type="hidden" name="_method" value="DELETE" />
							<button type="submit" onclick="return confirm('Deseja realmente excluir?');" class="btn btn-danger">Excluir</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection