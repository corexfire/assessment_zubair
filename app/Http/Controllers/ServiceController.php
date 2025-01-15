<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function edit(Service $service)
    {
        // dd($service);
        return view('dashboard.services.edit', [
            'service' => $service
        ]);
    }
    public function update(Request $request, Service $service)
    {
        // validasi data
        $validatedData = $request->validate([
            'image' => 'nullable',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        if ($request->hasFile('image')) {
            // hapus image sebelumnya 
            if ($service->image) {
                Storage::delete($service->image);
            }

            // mendapatkan filename original
            $originalFileName = $request->file('image')->getClientOriginalName();

            // buat unik nama file
            $fileName = time() . '_' . $originalFileName;

            // store ke storage 
            $path = $request->file('image')->storeAs('public/assets', $fileName);
            $validatedData['image'] = str_replace('public/', '', $path);
        } else {
            $validatedData['image'] = $request->input('image', $service->image);
        }

        // Update service
        $service->update($validatedData);

        // Return a response
        return redirect()->route('content.edit', 1)->with('success', 'Service updated successfully.');
    }
}
