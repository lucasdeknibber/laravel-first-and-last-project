<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\FaqItem;
use Auth;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except(['index']);
    }


    public function index()
    {
        $faqCategories = FaqCategory::with('faqItems')->get();
        return view('faq.index', compact('faqCategories'));
    }

    public function createCategory()
    {
        return view('faq.create_category');
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|unique:faq_categories,name',
        ]);

        FaqCategory::create($validated);

        return redirect()->route('faq.index')->with('status', 'FAQ category added!');
    }

    public function editCategory($id)
    {
        $category = FaqCategory::findOrFail($id);
        return view('faq.edit_category', compact('category'));
    }

    public function updateCategory($id, Request $request)
    {
        $category = FaqCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|min:3|unique:faq_categories,name,' . $id,
        ]);

        $category->update($validated);

        return redirect()->route('faq.index')->with('status', 'FAQ category updated!');
    }

    public function destroyCategory($id)
    {
        $category = FaqCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('faq.index')->with('status', 'FAQ category deleted!');
    }
    public function createItem($categoryId)
    {
        return view('faq.create_item', ['categoryId' => $categoryId]);
    }

    public function storeItem(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'faq_category_id' => 'required|exists:faq_categories,id',
        ]);

        FaqItem::create($validated);

        return redirect()->route('faq.index')->with('status', 'FAQ item added!');
    }
}
