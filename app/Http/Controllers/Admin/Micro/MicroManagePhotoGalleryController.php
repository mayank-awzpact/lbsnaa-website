<?php 
namespace App\Http\Controllers\Admin\Micro;

use App\Http\Controllers\Controller;
use App\Models\Admin\Micro\MicroManagePhotoGallery;
use App\Models\Admin\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


use App\Models\Admin\Micro\MicroManageAudit;
use Illuminate\Support\Facades\Auth; 

class MicroManagePhotoGalleryController extends Controller
{ 
    public function index()
    { 

        $galleries = DB::table('micro_manage_photo_galleries as sub')
        ->leftJoin('courses as parent', 'sub.course_id', '=', 'parent.id') // Correct join
        ->leftJoin('courses as second_row', 'sub.related_training_program', '=', 'second_row.id') // Correct join
        ->leftJoin('courses as third_row', 'sub.related_news', '=', 'third_row.id') // Correct join
        ->leftJoin('courses as four_row', 'sub.related_events', '=', 'four_row.id') // Correct join
        ->select(
            'sub.*',                    // All columns from micro_manage_photo_galleries
            'parent.id as course_id',   // Alias for parent.id to avoid overwriting sub.id
            'parent.name',              // Course name from parent
            'second_row.name as media_cat_name', // Media category name
            'third_row.name as related_news',
            'four_row.name as related_events'
        )
        ->get();
        
        // print_r($galleries);
        return view('admin.micro.manage_media_center.manage_photo.index', compact('galleries'));
    }

    public function create()
    {
        $mediaCategories = DB::table('micro_media_categories')
            ->where('status', 1)
            ->get(); // Retrieve records with status == 1        
        return view('admin.micro.manage_media_center.manage_photo.create', compact('mediaCategories')); 
    }
 
    public function store(Request $request)
    {
        // Validate inputs
        $request->validate([
            'image_files' => 'required|array', // Ensure an array of images is provided
            'image_files.*' => 'file|mimes:jpeg,png,jpg|max:2048', // Validate each file in the array
            'image_title_english' => 'required|string|max:255', // Ensure the English title is provided
            
            'status' => 'required|integer|in:1,0', // Ensure status is one of the valid values
            'course_id' => 'required|integer|exists:courses,id', // Ensure course ID exists in the database
            'media_categories' => 'required', // Ensure course ID exists in the database
            
        ], [
            // Custom error messages
            'image_files.required' => 'Please upload at least one image.',
            'image_files.*.mimes' => 'Each image must be a file of type: jpeg, png, jpg.',
            'image_files.*.max' => 'Each image must not exceed 2MB.',
            'image_title_english.required' => 'Please enter the English title.',
            'status.required' => 'Please select a valid status.',
            'course_id.required' => 'Please select a course.',
            'course_id.exists' => 'The selected course is invalid.',
        ]);

        // Ensure image files are provided
        $imageFiles = $request->file('image_files');
        if (!$imageFiles) {
            return redirect()->back()->with('error', 'No images uploaded!');
        }

        // Collect data for all images
        $data1 = [];
        foreach ($imageFiles as $file) {
            // Save image and get the path
            $path = $file->store('uploads/gallery', 'public');
            if (!$path) {
                return redirect()->back()->with('error', 'Failed to upload file.');
            }
            $data1[] = $path;
        }

        // Prepare data for insertion
        $data[] = [
            'image_title_english' => $request->input('image_title_english'),
            'image_title_hindi' => $request->input('image_title_hindi'),
            'status' => $request->input('status'),
            'image_files' => json_encode($data1),
            'course_id' => $request->input('course_id'),
            'related_news' => $request->input('related_news'),
            'related_training_program' => $request->input('related_training_program'),
            'related_events' => $request->input('related_events'),
            'media_categories'=> $request->input('media_categories'),
            'created_at' => now(), // Add timestamp for created_at
            'updated_at' => now(), // Add timestamp for updated_at
        ];

        // Insert all data in a single query
        if (!empty($data)) {
            MicroManagePhotoGallery::insert($data);
        }

        MicroManageAudit::create([
            'Module_Name' => 'Photo Gallery',
            'Time_Stamp' => time(),
            'Created_By' => null,
            'Updated_By' => null,
            'Action_Type' => 'Insert',
            'IP_Address' => $request->ip(),
        ]);

        return redirect()->route('micro-photo-gallery.index')->with('success', 'Gallery added successfully.');
    }



    public function edit(Request $request, $id)
    {
        // Fetch the specific gallery with its associated course
        $gallery = DB::table('micro_manage_photo_galleries as sub')
        ->leftJoin('courses as parent', 'sub.course_id', '=', 'parent.id') 
        ->where('sub.id', $id)
        ->select('sub.*', 'parent.id as parent_id', 'parent.name as parent_name')
        ->first();



        if (!$gallery) {
            abort(404, 'Gallery not found');
        }

        // Fetch active media categories
        $mediaCategories = DB::table('micro_media_categories')
                            ->where('status', 1)
                            ->pluck('name', 'id'); // Use pluck for a key-value array

        // Fetch related data only if the fields are not null
        $related_news = $gallery->related_news 
            ? MicroManagePhotoGallery::select('id', 'related_news')->where('related_news', $gallery->related_news)->first()
            : null;

        $related_training_program = $gallery->related_training_program 
            ? MicroManagePhotoGallery::select('id', 'related_training_program')->where('related_training_program', $gallery->related_training_program)->first()
            : null;

        $related_events = $gallery->related_events 
            ? MicroManagePhotoGallery::select('id', 'related_events')->where('related_events', $gallery->related_events)->first()
            : null;

        // Fetch the course for dropdown
        $allCourses = Course::select('id', 'name')->where('id', $gallery->course_id)->first();

        $bbb = $related_news ? Course::select('id', 'name')->where('id', $related_news->related_news)->first() : null;
        $ccc = $related_training_program ? Course::select('id', 'name')->where('id', $related_training_program->related_training_program)->first() : null;
        $ddd = $related_events ? Course::select('id', 'name')->where('id', $related_events->related_events)->first() : null;

        return view('admin.micro.manage_media_center.manage_photo.edit', [
            'gallery' => $gallery,
            'allCourses' => $allCourses,
            'mediaCategories' => $mediaCategories, // Pass categories as key-value
            'aaa' => $allCourses ? $allCourses->name : null,
            'bbb' => $bbb ? $bbb->name : null,
            'ccc' => $ccc ? $ccc->name : null,
            'ddd' => $ddd ? $ddd->name : null,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validate inputs
        $request->validate([
            'image_files' => 'nullable|array',
            'image_files.*' => 'nullable|file|mimes:jpeg,png,jpg|max:2048', // Validate image files
            'image_title_english' => 'required|string|max:255', // Validate English title
            
            'status' => 'required|integer|in:1,0', // Validate status (either 1 or 0)
            'course_id' => 'required|integer|exists:courses,id', // Validate course ID exists
            
        ], [
            // Custom error messages
            'image_files.required' => 'Please upload at least one image.',
            'image_files.*.mimes' => 'Each image must be a file of type: jpeg, png, jpg.',
            'image_files.*.max' => 'Each image must not exceed 2MB.',
            'image_title_english.required' => 'Please enter the English title.',
            'status.required' => 'Please select a valid status.',
            'status.in' => 'Status must be either 1 or 0.',
            'course_id.required' => 'Please select a course.',
            'course_id.exists' => 'The selected course is invalid.',
            
        ]);

        // Find the gallery by ID
        $gallery = MicroManagePhotoGallery::findOrFail($id);

        // Get the old image paths (if any)
        $oldImages = json_decode($gallery->image_files, true) ?? [];

        // Handle removed images
        if ($request->has('removed_files')) {
            $removedFiles = json_decode($request->input('removed_files'), true) ?? [];

            // Delete removed images from storage
            foreach ($removedFiles as $removedFile) {
                $imagePath = storage_path('app/public/' . $removedFile);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                    Log::info("Removed image: $imagePath");
                } else {
                    Log::warning("Image not found for removal: $imagePath");
                }

                // Remove the file from the old images array
                $oldImages = array_filter($oldImages, function ($file) use ($removedFile) {
                    return $file !== $removedFile;
                });
            }
        }

        // Process new image files if they are uploaded
        $imageFiles = $request->file('image_files');
        $uploadedFiles = [];

        if ($imageFiles) {
            foreach ($imageFiles as $file) {
                // Store new files and get their paths
                $uploadedFiles[] = $file->store('uploads/gallery', 'public');
            }
        }

        // Merge remaining old images with newly uploaded images
        $updatedImages = array_merge($oldImages, $uploadedFiles);

        // Update the gallery with the new image data
        $gallery->image_files = json_encode($updatedImages);

        // Update other fields
        $gallery->image_title_english = $request->input('image_title_english', 'Default Title');
        $gallery->image_title_hindi = $request->input('image_title_hindi');
        $gallery->status = $request->input('status', 'Draft');
        $gallery->course_id = $request->input('course_id');
        $gallery->related_news = $request->input('related_news');
        $gallery->related_training_program = $request->input('related_training_program');
        $gallery->related_events = $request->input('related_events');
        $gallery->media_categories = $request->input('media_categories');
        $gallery->updated_at = now();

        // Save the gallery
        $gallery->save();

        MicroManageAudit::create([
            'Module_Name' => 'Photo Gallery',
            'Time_Stamp' => time(),
            'Created_By' => null,
            'Updated_By' => null,
            'Action_Type' => 'Update',
            'IP_Address' => $request->ip(),
        ]);

        return redirect()->route('micro-photo-gallery.index')->with('success', 'Gallery updated successfully.');
    }


    public function destroy($id)
    {
        try {
            // Fetch the record using the ID
            $gallery = MicroManagePhotoGallery::findOrFail($id);

            // Check if the status is 1 (Inactive), and prevent deletion
            if ($gallery->status == 1) {
                return redirect()->route('micro-photo-gallery.index')
                    ->with('error', 'Active photo galleries cannot be deleted.');
            }

            // Delete the record if the status is not 1
            $gallery->delete();

            return redirect()->route('micro-photo-gallery.index')
                ->with('success', 'Photo Gallery deleted successfully.');
        } catch (\Exception $e) {
            // Handle exceptions and return an error message
            return redirect()->route('micro-photo-gallery.index')
                ->with('error', 'Error deleting Photo Gallery: ' . $e->getMessage());
        }
    }


    public function searchCourses(Request $request)
    {
        $query = $request->query('query');
        $courses = Course::where('name', 'LIKE', '%' . $query . '%')->limit(10)->get(['id', 'name']);
        return response()->json($courses);
    }


    public function show($id)
    {
        $photos = MicroManagePhotoGallery::where('gallery_id', $id)->get();  // Returns a collection
        return view('admin.micro.manage_media_center.manage_photo.edit', compact('photos'));
    }

}