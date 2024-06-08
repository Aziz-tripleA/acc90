<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Article;
use App\Models\Book;
use App\Models\Feature;
use App\Models\Service;
use Illuminate\Http\Request;

class FeaturedController extends Controller
{
    public function index()
    {
        $featuredItems = Feature::orderBy('order')->get();
        return view('admin.featured.index', compact('featuredItems'));
    }
    public function getItems(Request $request, $type)
    {
        switch ($type) {
            case 'adss':
                $items = Ads::all();
                break;
            case 'articles':
                $items = Article::all();
                break;
            case 'books':
                $items = Book::all();
                break;
            case 'services':
                $items = Service::all();
                break;
            default:
                $items = collect();
        }
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'featureable_type' => 'required|string',
            'featureable_id' => 'required|integer',
        ]);

        $data['order'] = Feature::max('order') + 1;

        Feature::create($data);

        return redirect()->back()->with('success', 'Feature item added successfully');
    }

    public function updateOrder(Request $request)
    {
        $orderedIds = $request->input('orderedIds');

        foreach ($orderedIds as $order => $id) {
            Feature::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Feature::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Feature item removed successfully');
    }
}
