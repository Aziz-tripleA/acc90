<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactDataRequest;
use App\Http\Requests\UpdateContactDataRequest;
use App\Models\ContactData;
use Illuminate\Http\Request;

class ManagerContactDataController extends Controller
{

    public function index()
    {
        return view('pages.contact.manager.index', [
            'breadcrumb' => $this->breadcrumb([], 'Contact Data'),
            'contacts' => ContactData::get()->sortBy('order'),
        ]);
    }

    public function update(Request $request)
    {
        foreach ($request->contact as $item) {
            if ($contactData = ContactData::find($item['id'])) {
                $contactData->update([
                    'value' => $item['value']
                ]);
            }
        }
        return $this->returnCrudData('Updated Successfully');
    }

}
