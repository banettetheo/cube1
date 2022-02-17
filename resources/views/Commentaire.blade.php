{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('Contenue', 'Contenue:') !!}
			{!! Form::text('Contenue') !!}
		</li>
		<li>
			{!! Form::label('IdUser', 'IdUser:') !!}
			{!! Form::text('IdUser') !!}
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