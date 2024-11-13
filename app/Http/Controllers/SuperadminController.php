<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuperadminModel;
use Illuminate\Http\JsonResponse;

class SuperadminController extends Controller
{
    public function show($id): JsonResponse 
    { 
        // Cari data berdasarkan custom_id 
        $post = SuperadminModel::find($id); 

        // Jika data tidak ditemukan, kembalikan respons error 
        if (!$post) { 
            return response()->json(['message' => 'Post not found'], 404); 
        } 

        // Kembalikan data dalam format JSON 
        return response()->json(['data' => $post], 200); 
    }

    public function index(): JsonResponse 
    { 
        // Ambil semua data dari tabel posts 
        $posts = SuperadminModel::all(); 
        
        // Kembalikan data dalam format JSON 
        return response()->json(['data' => $posts], 200); 
    } 

    public function create(Request $request) 
    { 
        $request->validate([ 
            'title' => 'required|string|max:255', 
            'content' => 'required',  
        ]); 
 
        // Create the post without needing custom_id from the request (auto-incremented) 
        $post = SuperadminModel::create([ 
            'title' => $request->input('title'), 
            'content' => $request->input('content'), 
        ]); 
 
        return response()->json(['message' => 'Post berhasil dibuat!', 'data' => $post], 201); 
    }
}
