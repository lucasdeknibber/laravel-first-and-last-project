<?php
// app/Http/Controllers/FaqController.php

namespace App\Http\Controllers;

use App\Models\FaqCategory;

class FaqController extends Controller
{
    public function index()
    {
        $faqCategories = FaqCategory::with('faqItems')->get();
        return view('faq', compact('faqCategories'));
    }
}
