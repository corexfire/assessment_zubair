<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        // dd($content);
        return view('dashboard.contents.edit', [
            'content' => $content,
            "services" => Service::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        $validatedData = $request->validate([
            'headline_content_1' => 'required|min:3|max:225',
            'headline_content_2' => 'required|min:3|max:225',
            'headline_content_3' => 'required|min:3|max:225',
            'small_content' => 'required|min:3|max:225',
            'circle_assets_1' => 'image|file|max:2048',
            'circle_assets_2' => 'image|file|max:2048',
            'circle_assets_3' => 'image|file|max:2048',
            'image_1' => 'image|file|max:2048',
            'image_2' => 'image|file|max:2048'
        ]);

        // Handle file upload image icon 1
        if ($request->file('circle_assets_1')) {
            // hapus image sebelumnya jika ada
            if ($content->circle_assets_1) {
                Storage::delete($content->circle_assets_1);
            }

            // dapatkan original name
            $originalFileName = $request->file('circle_assets_1')->getClientOriginalName();

            // buat nama file unik
            $fileName = time() . '_' . $originalFileName;

            // store ke storage
            $path = $request->file('circle_assets_1')->storeAs('public/assets', $fileName);
            $validatedData['circle_assets_1'] = str_replace('public/', '', $path);
        }

        // Handle file upload image icon 2
        if ($request->file('circle_assets_2')) {
            // hapus image sebelumnya jika ada
            if ($content->circle_assets_2) {
                Storage::delete($content->circle_assets_2);
            }

            // dapatkan original name
            $originalFileName = $request->file('circle_assets_2')->getClientOriginalName();

            // buat nama file unik
            $fileName = time() . '_' . $originalFileName;

            // store ke storage
            $path = $request->file('circle_assets_2')->storeAs('public/assets', $fileName);
            $validatedData['circle_assets_2'] = str_replace('public/', '', $path);
        }

        // Handle file upload image icon 3
        if ($request->file('circle_assets_3')) {
            // hapus image sebelumnya jika ada
            if ($content->circle_assets_3) {
                Storage::delete($content->circle_assets_3);
            }

            // dapatkan original name
            $originalFileName = $request->file('circle_assets_3')->getClientOriginalName();

            // buat nama file unik
            $fileName = time() . '_' . $originalFileName;

            // store ke storage
            $path = $request->file('circle_assets_3')->storeAs('public/assets', $fileName);
            $validatedData['circle_assets_3'] = str_replace('public/', '', $path);
        }

        // handle file upload image hero 1
        if ($request->file('image_1')) {
            // hapus image sebelumnya jika ada
            if ($content->image_1) {
                Storage::delete($content->image_1);
            }
            // dapatkan original name
            $originalFileName = $request->file('image_1')->getClientOriginalName();

            // buat nama file unik
            $fileName = time() . '_' . $originalFileName;
            // store ke storage
            $path = $request->file('image_1')->storeAs('public/images', $fileName);
            $validatedData['image_1'] = str_replace('public/', '', $path);
        }

        // handle file upload hero 2
        if ($request->file('image_2')) {
            // hapus image sebelumnya jika ada
            if ($content->image_2) {
                Storage::delete($content->image_2);
            }
            // dapatkan original name
            $originalFileName = $request->file('image_2')->getClientOriginalName();

            // buat nama file unik
            $fileName = time() . '_' . $originalFileName;

            // store ke storage
            $path = $request->file('image_2')->storeAs('public/images', $fileName);
            $validatedData['image_2'] = str_replace('public/', '', $path);
        }

        // update content
        $content->update($validatedData);

        return redirect()->route('content.edit', 1)->with('success', "Content has been updated!");
    }
}
