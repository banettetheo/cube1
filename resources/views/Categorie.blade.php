{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('Nom', 'Nom:') !!}
			{!! Form::text('Nom') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}