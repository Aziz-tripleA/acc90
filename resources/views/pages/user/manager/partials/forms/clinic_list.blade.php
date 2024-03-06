<form action="{{route('list.manager.store')}}" enctype="multipart/form-data" class="ajax"
      method="POST" id="BasicInfo">
    @csrf
    <input type="hidden" name="admin" value="1">
    <input type="hidden" name="type" value="clinic">
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <div class="uk-margin-top">
        <h3 class="full_width_in_card heading_c">
            Add Products to Clinic List
        </h3>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <label for="product_edit_linked_products" class="uk-form-label">
                    Products
                </label>
                <select id="product_edit_linked_products" name="product_ids[]" multiple data-md-selectize
                        data-md-selectize-bottom>
                    <option value="">Select Products</option>
                    @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->info->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="uk-grid">
            <div class="uk-width-medium-1-1 mt-20">
                <button class="md-btn md-btn-primary md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light"
                        type="submit">
                    Save Changes
                </button>
            </div>
        </div>
        <h3 class="full_width_in_card heading_c">
            Current Clinic List
        </h3>
        <table class="uk-table uk-table-nowrap">
            <thead>
            <tr>
                <th class="uk-width-2-10 uk-text-center">Image</th>
                <th class="uk-width-5-10">Title</th>
                <th class="uk-width-2-10 uk-text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->clinic()->latest()->get() as $list)
                <tr>
                    <td><img class="img_thumb" style="max-height: 100px;"
                             src="{{$list->product->getUrlFor('cover','thumb')?:asset('assets/admin/img/avatars/avatar_01_tn.png')}}"/>
                    </td>
                    <td>{{$list->product->info->title}}</td>
                    <td>
                        <a class="confirm-action-button"
                           data-uk-modal="{target:'#confirmationModal'}"
                           data-action="{{route('list.destroy',$list->id)}}"
                           data-custom_method='@method('DELETE')'>
                            <i class="md-icon material-icons">delete</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>
</form>
