<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    // Function to show the upload form and list videos
    public function index()
    {
        $videos = Video::latest()->get();
        return view('videos.index', compact('videos'));
    }

    // Function to handle video upload
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,mov,ogg,webm', // Limit the size to 20MB
            'title' => 'required|string|max:255', // Custom title
            'description' => 'nullable|string',   // Optional description
        ]);

        if ($request->hasFile('video')) {
            $file = $request->file('video');

            // Generate random filename based on current timestamp
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('videos', $filename, 'public');

            // Save video details to database
            Video::create([
                'video_name' => $request->input('title'),        // Use custom title
                'video_path' => '/storage/' . $path,             // Save path with generated filename
                'description' => $request->input('description'), // Save description
            ]);

            return redirect()->back()->with('success', 'Video uploaded successfully!');
        }

        return redirect()->back()->with('error', 'Failed to upload video.');
    }
    public function destroy(Video $video)
    {
        try {
            // Menghapus file dari storage
            // 'video_path' adalah '/storage/videos/filename.ext', jadi kita perlu menghapus 'videos/filename.ext'
            $filePath = str_replace('/storage/', '', $video->video_path);
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            // Menghapus record dari database
            $video->delete();

            return redirect()->back()->with('success', 'Video berhasil dihapus.');
        } catch (\Exception $e) {
            // Log error jika diperlukan
            // Log::error('Error deleting video: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal menghapus video.');
        }
    }
}
