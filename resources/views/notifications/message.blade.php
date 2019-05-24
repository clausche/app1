@extends('layouts.main')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Enviar Mensajes
                    <span class="pull-right">
                        <form action="notifications/{{ Auth::id()}}/borrados" method="post" >
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-default">read all</button>
                    </form>
                    </span>

                </div>
                @include('partials.errors')
                {!! Form::open(['route' => 'men_store']) !!}

                    <div class="panel-body">
                    	<div class="form-group">
                    		<select class="form-control" name="recipient_id">
                    			<option class="arrow" value="">Selecciona el usuario</option>
                    			@foreach ($users as $user)
                    				<option value="{{ $user->id }}">{{ $user->name }}</option>}

                    			@endforeach
                    		</select>
                    	</div>
                    	{{-- <div class="form-group">
                    		{!! Form::select('user', $users->pluck('name','id'), null, ['class' => 'form-control']) !!}

                    	</div> --}}
                    	<div class="form-group">
                    	{!! Form::textarea('body' ,null, ['class' => 'form-control','placeholder'=>'Esribe tu mensaje aqui','rows'=>'3']) !!}

                    	</div>
                    	<div class="form-group">
                    		{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary btn-block']) !!}
                    	</div>

                    </div>


				{!! Form::close() !!}



        @if (count($sinleers) > 0)


                <div class="form-group">
                   @foreach (Auth::user()->unreadNotifications as $notification)
                   @if ($notification->type == 'App\Notifications\PruebaNotification')
                    <li>{{ $notification->data['Suscription_ended']['date'] }}
                    {{ $notification->data['content'] }}
                    Destinatario: <strong>{{ $notification->data['destinatario'] }}</strong>
                    {{ $notification->type }}</li>

                   @endif
                   @endforeach


                </div>
                <div class="form-group">


                </div>



        @endif







            </div>
        </div>
    </div>
</div>



@endsection