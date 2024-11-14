<?php 

namespace App\Http\Controllers; 

use App\Models\PostModel; 
use Illuminate\Http\Request; 
use Illuminate\Http\JsonResponse;

class PostController extends Controller 
{ 
    public function delete($id) 
    { 
        // Cari post berdasarkan ID 
        $post = PostModel::find($id); 
 
        // Jika post tidak ditemukan, kembalikan respons error 
        if (!$post) { 
            return response()->json(['message' => 'Post not found'], 404); 
        } 
 
        // Hapus data post 
        $post->delete(); 
       // Kembalikan respons JSON yang menunjukkan sukses 
        return response()->json(['message' => 'Post berhasil dihapus!'], 200); 
    } 

    public function update(Request $request, $id) 
    { 
        // Validasi data yang dikirimkan 
        $request->validate([ 
            'title' => 'sometimes|string|max:255', // 'sometimes' berarti opsional 
            'content' => 'sometimes|string', 
        ]); 
 
 
        // Cari post berdasarkan ID 
        $post = PostModel::find($id); 
 
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
        $post = PostModel::find($id); 

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
        $posts = PostModel::all(); 
        
        // Kembalikan data dalam format JSON 
        return response()->json(['data' => $posts], 200); 
    } 

    public function create(Request $request): JsonResponse 
    { 
        $request->validate([ 
            'title' => 'required|string|max:255', 
            'content' => 'required', 
        ]); 

        // Create the post with mass assignment protection
        $post = new PostModel();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return response()->json(['message' => 'Post berhasil dibuat!', 'data' => $post], 201); 
    } 
}
