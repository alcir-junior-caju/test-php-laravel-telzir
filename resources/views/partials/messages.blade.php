@if (session()->has('message'))
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-{{ bootstrapMessage(session()->get('message_type')) }} alert-dismissible fade show" role="alert">
                    {!! session()->get('message') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
