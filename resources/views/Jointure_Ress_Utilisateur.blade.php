{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('IdUtilisateur', 'IdUtilisateur:') !!}
			{!! Form::text('IdUtilisateur') !!}
		</li>
		<li>
			{!! Form::label('IdRessource', 'IdRessource:') !!}
			{!! Form::text('IdRessource') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}