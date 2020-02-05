@extends('layouts.app')

@section('title', '- Lista de Chamadas')

@include('layouts.scripts.validate')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-right">
                    <a class="btn btn-dark text-white pull-right" data-toggle="modal" data-target="#new-call">Novo</a>
                </div>

                <!-- Modal New Call -->
                <div class="modal fade" id="new-call" tabindex="-1" role="dialog" aria-labelledby="newCallTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-uppercase">
                                <h5 class="modal-title text-white" id="newCallTitle">Nova chamada</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="needs-validation form-horizontal" action="{{ route('admin.calls.store') }}" method="post" novalidate>
                                @csrf
                                @include('Call::partials.form')
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 mt-2">
                    <div class="card-header text-white bg-dark text-uppercase"><strong>Lista de Chamadas Valor / minuto</strong></div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-striped table-hover m-0">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Origem</th>
                                <th scope="col">Destino</th>
                                <th scope="col">Valor / min</th>
                                <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calls as $call)
                                    <tr>
                                        <th scope="row">{{ $call->id }}</th>
                                        <td>{{ $call->present()->getCall('origin') }}</td>
                                        <td>{{ $call->present()->getCall('destination') }}</td>
                                        <td>R$ {{ $call->present()->getValue }}</td>
                                        <th scope="row">
                                            <a href="" data-toggle="modal" data-target="#edit-call-{{ $call->id }}">Editar</a>
                                             |
                                            <a href="" data-toggle="modal" data-target="#delete-call-{{ $call->id }}">Deletar</a>
                                        </th>
                                    </tr>

                                    <!-- Modal Edit Call -->
                                    <div class="modal fade" id="edit-call-{{ $call->id }}" tabindex="-1" role="dialog" aria-labelledby="editCallTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary text-uppercase">
                                                    <h5 class="modal-title text-white" id="editCallTitle">Editar chamada</h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="needs-validation form-horizontal" action="{{ route('admin.calls.update', $call->id) }}" method="post" novalidate>
                                                    {{ method_field('PUT') }}
                                                    @csrf
                                                    @include('Call::partials.form')
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">Editar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Delete Call -->
                                    <div class="modal fade" id="delete-call-{{ $call->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteCallTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary text-uppercase">
                                                    <h5 class="modal-title text-white" id="deleteCallTitle">Deletar chamada</h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <strong>
                                                        Realmente deseja excluir a chamada
                                                        <span class="text-primary">
                                                            de
                                                            {{ $call->present()->getCall('origin') }} para
                                                            {{ $call->present()->getCall('destination') }} no valor de
                                                            {{ $call->present()->getValue() }}
                                                        </span>
                                                    </strong>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                                    <a href="{{ route('admin.calls.destroy', $call->id) }}" class="btn btn-primary">Sim</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
