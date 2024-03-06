<div class="modal"
     id="renewpackage"
     role="dialog"
     aria-hidden="true"
     aria-labelledby="renewpackageTitle"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered"
         role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="renewpackageTitle">renew package</h5>
                <button class="close m-0"
                        data-dismiss="modal"
                        type="button"
                        aria-label="Close">
                    <i class="material-icons"
                       aria-hidden="true">close</i>
                </button>
            </div>
            <div class="modal-body pt-0">
                <form method="POST" class="ajax" id="confirmForm">
                    @csrf
                    <div class="form-row mb-4">
                        <div class="col-12">
                            <p class="h6"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-6">
                            <button class="btn btn-primary btn-block"
                                    type="submit">@lang('common.confirm')</button>
                        </div>
                        <div class="col-12 col-md-6">
                            <button class="btn btn-outline-primary btn-block" data-dismiss="modal"
                                    type="button">@lang('common.cancel')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
