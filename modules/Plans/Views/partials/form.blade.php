<div class="modal-body">
    <div class="form-row">
        <div class="col-md-4">
            <label for="name">Nome</label>
            <input type="text" name="name" value="{{ isset($plan->name) ? $plan->name : '' }}" class="form-control px-2" id="name" placeholder="Seu Plano" required>
            <div class="invalid-feedback">
                <strong>
                    @if ($errors->has('name'))
                        {{ $errors->first('name') }}
                    @else
                        Preencha o campo Nome!
                    @endif
                </strong>
            </div>
        </div>
        <div class="col-md-4">
            <label for="minutes">Minutos</label>
            <input type="number" name="minutes" value="{{ isset($plan->minutes) ? $plan->minutes : '' }}" class="form-control px-2" id="minutes" placeholder="16" min="1" max="999" maxlength="3" required>
            <div class="invalid-feedback">
                <strong>
                    @if ($errors->has('minutes'))
                        {{ $errors->first('minutes') }}
                    @else
                        Preencha o campo Minutos!
                    @endif
                </strong>
            </div>
        </div>
        <div class="col-md-4">
            <label for="percent">Porcentagem</label>
            <input type="number" name="percent" value="{{ isset($plan->percent) ? $plan->percent : '' }}" class="form-control px-2" id="percent" placeholder="10" min="1" max="99" maxlength="2" required>
            <div class="invalid-feedback">
                <strong>
                    @if ($errors->has('percent'))
                        {{ $errors->first('percent') }}
                    @else
                        Preencha o campo Porcentagem!
                    @endif
                </strong>
            </div>
        </div>
    </div>
</div>
