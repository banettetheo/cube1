{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('IdCategorie', 'IdCategorie:') !!}
			{!! Form::text('IdCategorie') !!}
		</li>
		<li>
			{!! Form::label('IdType', 'IdType:') !!}
			{!! Form::text('IdType') !!}
		</li>
		<li>
			{!! Form::label('Lien_ressources', 'Lien_ressources:') !!}
			{!! Form::text('Lien_ressources') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}