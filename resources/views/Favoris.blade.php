{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('Utilisateur_id', 'Utilisateur_id:') !!}
			{!! Form::text('Utilisateur_id') !!}
		</li>
		<li>
			{!! Form::label('IdRessources', 'IdRessources:') !!}
			{!! Form::text('IdRessources') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}