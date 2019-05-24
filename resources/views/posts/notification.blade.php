@extends('layouts.main')

@section('content')

        <div class="col-sm-2">
                <div class="panel panel-default">
                
                    <div class="panel-body">
                            
                    @if (count($sinleers) > 0)
                            
                        
                           @foreach (Auth::user()->unreadNotifications as $notification)
                           @if ($notification->type == 'App\Notifications\MessageUpdate')
                        <div class="form-group">
                               <ul class="list-group">
                                   
                               <li class="list-group-item">{{ $notification->data['body'] }}, {{ $notification->data['recipient_id'] }}</li>
                               </ul>

                            <hr>
                        </div>
                           @endif
                           @endforeach

                    @endif 
                    </div>
                </div>
        </div>
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Enviar Mensajes</div>
                {!! Form::open(['route' => 'message_store']) !!}

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



               



            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                        <form action="notifications/{{ Auth::id()}}/borrados" method="post" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-info  
                            @if (count($sinleers) > 0)
                            active" 
                            @else
                            "disabled="disabled" 
                            @endif
                            >read all</button>
                        </form>

                    </div>
        </div>




@endsection