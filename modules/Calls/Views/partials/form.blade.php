<div class="modal-body">
    <div class="form-row">
        <div class="col-md-4">
            <label for="origin">Origem</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text px-2" id="inputGroupPrepend">0</span>
                </div>
                <input type="number" name="origin" value="{{ isset($call->origin) ? $call->origin : '' }}" class="form-control px-2" id="origin" placeholder="11" aria-describedby="inputGroupPrepend" min="1" max="99" maxlength="2" required>
                <div class="invalid-feedback">
                    <strong>
                        @if ($errors->has('origin'))
                            {{ $errors->first('origin') }}
                        @else
                            Preencha o campo Origem!
                        @endif
                    </strong>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <label for="destination">Destino</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text px-2" id="inputGroupPrepend">0</span>
                </div>
                <input type="number" name="destination" value="{{ isset($call->destination) ? $call->destination : '' }}" class="form-control px-2" id="destination" placeholder="16" aria-describedby="inputGroupPrepend" min="1" max="99" maxlength="2" required>
                <div class="invalid-feedback">
                    <strong>
                        @if ($errors->has('destination'))
                            {{ $errors->first('destination') }}
                        @else
                            Preencha o campo Destino!
                        @endif
                    </strong>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <label for="value">Valor / min</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text px-3" id="inputGroupPrepend">R$</span>
                </div>
                <input type="text" name="value" value="{{ isset($call->value) ? $call->present()->getValue : '' }}" class="form-control px-2" id="value" placeholder="1,50" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    <strong>
                        @if ($errors->has('value'))
                            {{ $errors->first('value') }}
                        @else
                            Preencha o campo Valor!
                        @endif
                    </strong>
                </div>
            </div>
        </div>
    </div>
</div>
