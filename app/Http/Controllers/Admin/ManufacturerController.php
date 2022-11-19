<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ManufacturerController extends Controller
{

    public function index(Request $request)
    {
        return view('portals.admin.manufacturers.index');

    }

    public function update(Manufacturer $manufacturer, Request $request)
    {
        $rules = [];
        foreach (locales() as $key => $language) {
            $rules['name_' . $key] = 'required|string|max:255';
        }
        $this->validate($request, $rules);
        $data = [];
        foreach (locales() as $key => $language) {
            $data['name'][$key] = $request->get('name_' . $key);
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public');
            $data['image'] = $image;
        }

        $manufacturer->update($data);

        if ($request->ajax()) {
            return response()->json(['status' => true]);
        }
        Session::flash('success_message', __('item_edited'));

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $rules = [];
        foreach (locales() as $key => $language) {
            $rules['name_' . $key] = 'required|string|max:255';
        }
        $this->validate($request, $rules);
        $data = [];
        foreach (locales() as $key => $language) {
            $data['name'][$key] = $request->get('name_' . $key);
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public');
            $data['image'] = $image;
        }

        Manufacturer::query()->create($data);


        if ($request->ajax()) {
            return response()->json(['status' => true]);
        }
        Session::flash('success_message', __('item_added'));

        return redirect('manufacturers');
    }

    public function destroy($uuid, Request $request)
    {
        $manufacturers = Manufacturer::query()->whereIn('uuid', explode(',', $uuid))->delete();
        return response()->json(['status' => true]);
    }

    public function indexTable(Request $request)
    {
        $manufacturers = Manufacturer::query()->orderByDesc('id');
        return Datatables::of($manufacturers)
            ->filter(function ($query) use ($request) {
                $name = (urlencode($request->get('name')));
                if ($request->get('name')) {
                    $query->where('name->' . locale(), 'like', "%{$request->get('name')}%");
                }
            })->addColumn('action', function ($manufacturer) {
                $data_attr = '';
                $data_attr .= 'data-uuid="' . $manufacturer->uuid . '" ';
                $data_attr .= 'data-image="' . $manufacturer->image . '" ';
                foreach (locales() as $key => $value) {
                    $data_attr .= 'data-name_' . $key . '="' . $manufacturer->getTranslation('name', $key) . '" ';
                }
                $string = '';
                $string .= '<button class="edit_btn btn btn-sm btn-outline-primary" data-toggle="modal"
                    data-target="#edit_modal" ' . $data_attr . '>' . __('edit') . '</button>';
                $string .= ' <button type="button" class="btn btn-sm btn-outline-danger delete-btn" data-id="' . $manufacturer->uuid .
                    '">' . __('delete') . '</button>';
                return $string;
            })->make(true);
    }

}
