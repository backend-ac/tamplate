<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        Lead::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'status' => 'new',
        ]);

        return back()->with('success', 'Заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.');
    }
}
