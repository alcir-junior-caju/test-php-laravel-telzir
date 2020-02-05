@extends('layouts.app')

@section('title', '- Conheça nossos Planos')
@section('class', 'front')

@include('layouts.scripts.validate')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <a class="font-title text-uppercase d-block" href="{{ url('/') }}">
                    <i class="fab fa-shopware"></i> {{ config('app.name', 'Laravel') }}
                    <br />
                    <span>Comunicação</span>
                </a>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <h1 class="display-4 font-weight-bold text-white">
                    Conheça nossos novos planos de chamadas a longa distância.
                </h1>
                <h2 class="text-white">
                    Ao lado disponibilizamos uma calculadora, para que você veja todas a vantagens de usar nossos novos planos.
                </h2>
                <h4 class="text-white text-right mt-5">
                    Venha para <span class="font-title text-uppercase" style="font-size: 1.5rem;"><i class="fab fa-shopware"></i> {{ config('app.name', 'Laravel') }}</span> e seja livre.
                </h4>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <form class="needs-validation form-horizontal" action="{{ route('calculate') }}" method="post" novalidate>
                    @csrf
                    <div class="row py-4">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                            <select name="call" class="custom-select" required>
                                <option value="">Escolha a chamada</option>
                                @foreach ($content['calls'] as $call)
                                    <option value="{{ $call->value }}">de {{ $call->present()->getCall('origin') }} para {{ $call->present()->getCall('destination') }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <strong class="text-white">
                                    Escolha a chamada!
                                </strong>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 mb-2">
                            <input type="number" name="minutes" value="" class="form-control form-control-sm px-2" id="minutes" placeholder="10" min="1" max="999" maxlength="3" required>
                            <div class="invalid-feedback">
                                <strong class="text-white">
                                    Escolha os minutos!
                                </strong>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                            <select name="plan" class="custom-select" required>
                                <option value="">Escolha o plano</option>
                                @foreach ($content['plans'] as $plan)
                                    <option value="{{ $plan->minutes }}|{{ $plan->percent }}">{{ $plan->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <strong class="text-white">
                                    Escolha o plano!
                                </strong>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 mb-2">
                            <button type="submit" class="btn btn-primary btn-sm">Calcular</button>
                        </div>
                    </div>
                    <div class="row py-1 h1">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-2">
                            <strong class="text-white h4">Com o plano</strong>
                            <div class="text-success bg-white p-4">
                                <i class="fas fa-check"></i> R$
                                @if (!empty($content['result']['discount']))
                                    {{ $content['result']['discount'] }}
                                @else
                                    0,00
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <strong class="text-white h4">Sem o plano</strong>
                            <div class="text-danger bg-white p-4">
                                <i class="fas fa-times"></i> R$
                                @if (!empty($content['result']['real']))
                                    {{ $content['result']['real'] }}
                                @else
                                    0,00
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
