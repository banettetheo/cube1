{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('Nom', 'Nom:') !!}
			{!! Form::text('Nom') !!}
		</li>
		<li>
			{!! Form::label('Prenom', 'Prenom:') !!}
			{!! Form::text('Prenom') !!}
		</li>
		<li>
			{!! Form::label('Moderateur', 'Moderateur:') !!}
			{!! Form::text('Moderateur') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}