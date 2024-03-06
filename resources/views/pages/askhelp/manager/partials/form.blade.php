@csrf
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    Terms and Condition Text
                </h3>
            </div>
            <div class="md-card-content"> 
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1" >
                        <label for="terms_conditions">Text</label>
                        <textarea class="no_autosize tinymce" name="terms_conditions"
                                id="terms_conditions"
                        >{{isset($about)?$about->terms_conditions:''}}</textarea>
                        @include("layouts.partials.form-errors",['field'=>"terms_conditions"])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>