{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('IdUser1', 'IdUser1:') !!}
			{!! Form::text('IdUser1') !!}
		</li>
		<li>
			{!! Form::label('IdUser2', 'IdUser2:') !!}
			{!! Form::text('IdUser2') !!}
		</li>
		<li>
			{!! Form::label('IdTypeRelation', 'IdTypeRelation:') !!}
			{!! Form::text('IdTypeRelation') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}