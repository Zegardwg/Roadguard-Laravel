<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{
    public function update(Request $request, $id) 
    { 
        // Validasi data yang dikirimkan 
        $request->validate([ 
            'title' => 'sometimes|string|max:255', // 'sometimes' berarti opsional 
            'content' => 'sometimes|string', 
        ]); 
 
 
        // Cari post berdasarkan ID 
        $post = AdminModel::find($id); 
 
        // Jika post tidak ditemukan, kembalikan respons error 
        if (!$post) { 
            return response()->json(['message' => 'Post not found'], 404); 
        } 
 
        // Update data post dengan data yang dikirim 
        $post->update($request->only(['title', 'content'])); 
 
        // Kembalikan respons JSON yang menunjukkan sukses 
        return response()->json(['message' => 'Post berhasil diperbarui!', 'data' => $post], 200); 
    }

    public function show($id): JsonResponse 
    { 
        // Cari data berdasarkan custom_id 
        $post = AdminModel::find($id); 

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
        $posts = AdminModel::all(); 
        
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
        $post = AdminModel::create([ 
            'title' => $request->input('title'), 
            'content' => $request->input('content'), 
        ]); 
 
        return response()->json(['message' => 'Post berhasil dibuat!', 'data' => $post], 201); 
    }
}
