@csrf
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-large-7-10">
        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    @if(isset($slide))
                        Edit Slide
                    @else
                        Add New Slide
                    @endif
                </h3>
            </div>
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <label for="slide_title">Title</label>
                        <input class="md-input"
                               type="text"
                               value="{{isset($slide)? $slide->title :''}}"
                               id="slide_title"
                               name="title"/>
                        @include("layouts.partials.form-errors",['field'=>"title"])
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <label for="slide_text">Description</label>
                        <input class="md-input"
                               type="text"
                               value="{{isset($slide)? $slide->description :''}}"
                               id="slide_text"
                               name="description"/>
                        @include("layouts.partials.form-errors",['field'=>"description"])
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2">
                        <label for="btn_text">Button Text</label>
                        <input class="md-input"
                               type="text"
                               value="{{isset($slide)? $slide->btn_text :''}}"
                               id="btn_text"
                               name="btn_text"/>
                        @include("layouts.partials.form-errors",['field'=>"btn_text"])
                    </div>
                </div>

                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2">
                        <label for="route_name">Button Link</label>
                        <input class="md-input"
                               type="text"
                               value="{{isset($slide)? $slide->route_name :''}}"
                               id="route_name"
                               name="route_name"/>
                        @include("layouts.partials.form-errors",['field'=>"route_name"])
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label for="slide_image">Image</label>
                        <input type="file" id="slide_image" name="cover" class="dropify"
                               data-max-file-size="2M"
                               @if(isset($slide) && $slide->getUrlFor('cover')) data-default-file="{{$slide->getUrlFor('cover')}}" @endif/>
                        @include("layouts.partials.form-errors",['field'=>"cover"])
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-2-3">
                <button
                    class="md-btn md-btn-primary md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light"
                    type="submit">
                    {{$submit_button}}
                </button>
            </div>
            <div class="uk-width-medium-1-3">
                <a href="{{url()->previous()}}"
                   class="md-btn md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light">
                    Cancel
                </a>
            </div>
        </div>
    </div>
    <div class="uk-width-large-3-10">
        @if(isset($slide))
            @permission('delete_shipping_zones')
            <button
                data-uk-modal="{target:'#confirmationModal'}"
                data-action="{{route('slide.admin.destroy',$slide->id)}}"
                data-append-input="1"
                data-field_name="redirect_to"
                data-field_value="{{ url()->previous() }}"
                data-custom_method='@method('DELETE')'
                class="confirm-action-button md-btn md-btn-danger md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light mt-20">
                Delete Slide
            </button>
            @endpermission
        @endif
    </div>
</div>
