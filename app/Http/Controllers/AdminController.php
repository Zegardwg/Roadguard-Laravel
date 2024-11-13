<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class AdminController extends Controller
{
    public function create(Request $request) 
    { 
        $request->validate([ 
            'title' => 'required|string|max:255', 
            'content' => 'required', 
        ]); 
 
        // Create the post without needing custom_id from the request (auto-incremented) 
        $post = AdminModel::create([ 
            'title' => $request->input('title'), 
            'content' => $request->input('content'), 
        ]); 
 
        return response()->json(['message' => 'Post berhasil dibuat!', 'data' => $post], 201); 
    }
}
