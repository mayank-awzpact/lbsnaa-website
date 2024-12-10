<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\FacultyMember;
use App\Models\Admin\StaffMember;
use App\Models\Admin\Staff; // Import the Staff model
use App\Models\Admin\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Admin\ManageAudit;
use Illuminate\Support\Facades\Auth;

class ManageOrganizationController extends Controller
{
    // List faculty members
    public function facultyIndex()
    {
        $facultyMembers = FacultyMember::get();
        return view('admin.faculty_members.index', compact('facultyMembers'));
    }

    public function facultyCreate()
    {
        $startYear = 2000;
        $currentYear = now()->year; // Get the current year
        $years = range($startYear, $currentYear); // Create an array of years

        // Fetch the codes from the manage_cadres table
        $cadres = DB::table('manage_cadres')->pluck('code', 'id'); // Get id as key and code as value
        return view('admin.faculty_members.create', compact('cadres','years'));
    }

    // Store a new faculty member
    // public function facultyStore(Request $request)
    // {
    //     // Handle image upload
    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $imageName = time() . '_' . $file->getClientOriginalName();
    //         $file->move(public_path('faculty_images/'), $imageName);
    //         $imagePath = 'faculty_images/' . $imageName;
    //     } else {
    //         $imagePath = null; // Handle if no image is uploaded
    //     }

    //     // Insert the data into the database
    //     $facultyMember = new FacultyMember();
    //     $facultyMember->language = $request->input('txtlanguage');
    //     $facultyMember->category = $request->input('category');
    //     $facultyMember->name = $request->input('name');
    //     $facultyMember->name_in_hindi = $request->input('name_in_hindi');
    //     $facultyMember->email = $request->input('email');
    //     $facultyMember->image = $imagePath; // Save the image path
    //     $facultyMember->description = $request->input('description');
    //     $facultyMember->description_in_hindi = $request->input('description_in_hindi');
    //     $facultyMember->designation = $request->input('designation');
    //     $facultyMember->designation_in_hindi = $request->input('designation_in_hindi');
    //     $facultyMember->cadre = $request->input('cadre');
    //     $facultyMember->batch = $request->input('batch');
    //     $facultyMember->service = $request->input('service');
    //     $facultyMember->country_code = $request->input('country_code');
    //     $facultyMember->std_code = $request->input('std_code');
    //     $facultyMember->phone_internal_office = $request->input('phone_internal_office');
    //     $facultyMember->phone_internal_residence = $request->input('phone_internal_residence');
    //     $facultyMember->phone_pt_office = $request->input('phone_pt_office');
    //     $facultyMember->phone_pt_residence = $request->input('phone_pt_residence');
    //     $facultyMember->mobile = $request->input('mobile');
    //     $facultyMember->abbreviation = $request->input('abbreviation');
    //     $facultyMember->rank = $request->input('rank');
    //     $facultyMember->present_at_station = $request->input('present_at_station');
    //     $facultyMember->acm_member = $request->input('acm_member');
    //     $facultyMember->acm_status_in_committee = $request->input('acm_status_in_committee');
    //     $facultyMember->co_opted_member = $request->input('co_opted_member');
    //     $facultyMember->page_status = $request->input('page_status');
    //     // print_r($facultyMember);die;
    //     // Save the faculty member
    //     $facultyMember->save();

    //     ManageAudit::create([
    //         'Module_Name' => 'Organization Module', // Static value
    //         'Time_Stamp' => time(), // Current timestamp
    //         'Created_By' => null, // ID of the authenticated user
    //         'Updated_By' => null, // No update on creation, so leave null
    //         'Action_Type' => 'Insert', // Static value
    //         'IP_Address' => $request->ip(), // Get IP address from request
    //     ]);

    //     // Redirect with a success message
    //     return redirect()->route('admin.faculty.index')->with('success', 'Faculty member added successfully.');
    // }

    // public function facultyStore(Request $request)
    // {
    //     // Validation rules
    //     $validated = $request->validate([
    //         'language' => 'required|in:1,2', // Replace with actual dropdown options
    //         'category' => 'required|string|in:1,0', // Replace with actual dropdown options
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255|unique:faculty_members,email',
    //         'designation' => 'required|string|max:255',
    //         'page_status' => 'required|in:1,0', // Assuming 1 for active, 0 for inactive

    //         // Optional fields
    //         'name_in_hindi' => 'nullable|string|max:255',
    //         'description' => 'nullable|string',
    //         'description_in_hindi' => 'nullable|string',
    //         'cadre' => 'nullable|string|max:255',
    //         'batch' => 'nullable|string|max:255',
    //         'service' => 'nullable|string|max:255',
    //         'country_code' => 'nullable|string|max:10',
    //         'std_code' => 'nullable|string|max:10',
    //         'phone_internal_office' => 'nullable|string|max:15',
    //         'phone_internal_residence' => 'nullable|string|max:15',
    //         'phone_pt_office' => 'nullable|string|max:15',
    //         'phone_pt_residence' => 'nullable|string|max:15',
    //         'mobile' => 'nullable|string|max:15',
    //         'abbreviation' => 'nullable|string|max:10',
    //         'rank' => 'nullable|string|max:10',
    //         'present_at_station' => 'nullable|string|max:255',
    //         'acm_member' => 'nullable|string|max:255',
    //         'acm_status_in_committee' => 'nullable|string|max:255',
    //         'co_opted_member' => 'nullable|string|max:255',
    //         'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image upload
    //     ]);
    //     // dd($validated);
    //     // Handle image upload
    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $imageName = time() . '_' . $file->getClientOriginalName();
    //         $file->move(public_path('faculty_images/'), $imageName);
    //         $imagePath = 'faculty_images/' . $imageName;
    //     } else {
    //         $imagePath = null; // Handle if no image is uploaded
    //     }

    //     // Insert the data into the database
    //     $facultyMember = new FacultyMember($validated);
    //     // dd($facultyMember);
    //     $facultyMember->image = $imagePath; // Save the image path
    //     $facultyMember->save();

    //     // Audit log
    //     ManageAudit::create([
    //         'Module_Name' => 'Organization Module', // Static value
    //         'Time_Stamp' => time(), // Current timestamp
    //         'Created_By' => null, // ID of the authenticated user
    //         'Updated_By' => null, // No update on creation, so leave null
    //         'Action_Type' => 'Insert', // Static value
    //         'IP_Address' => $request->ip(), // Get IP address from request
    //     ]);

    //     // Redirect with a success message
    //     return redirect()->route('admin.faculty.index')->with('success', 'Faculty member added successfully.');
    // }


    public function facultyStore(Request $request)
    {
        // Validate input fields
        $validated = $request->validate([
            'language' => 'required|in:1,2',
            'category' => 'required|in:0,1',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:faculty_members,email',
            'designation' => 'required|string|max:255',
            'page_status' => 'required|in:0,1',

            'phone_internal_office' => 'nullable|string|max:10',
            'phone_internal_residence' => 'nullable|string|max:10',
            'phone_pt_office' => 'nullable|string|max:10',
            'phone_pt_residence' => 'nullable|string|max:10',
            'mobile' => 'nullable|string|max:10',
            
        ]);
    
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('faculty_images/'), $imageName);
            $imagePath = 'faculty_images/' . $imageName;
        }
    // dd($validated);
        // Insert data into the database using Query Builder
        DB::table('faculty_members')->insert([
            'language' => $request->language,
            'category' => $request->category,
            'name' => $request->name,
            'name_in_hindi' => $request->name_in_hindi,
            'email' => $request->email,
            'image' => $imagePath,
            'description' => $request->description,
            'description_in_hindi' => $request->description_in_hindi,
            'designation' => $request->designation,
            'designation_in_hindi' => $request->designation_in_hindi,
            'cadre' => $request->cadre,
            'batch' => $request->batch,
            'service' => $request->service,
            'country_code' => $request->country_code,
            'std_code' => $request->std_code,
            'phone_internal_office' => $request->phone_internal_office,
            'phone_internal_residence' => $request->phone_internal_residence,
            'phone_pt_office' => $request->phone_pt_office,
            'phone_pt_residence' => $request->phone_pt_residence,
            'mobile' => $request->mobile,
            'abbreviation' => $request->abbreviation,
            'rank' => $request->rank,
            'present_at_station' => $request->present_at_station,
            'page_status' => $request->page_status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Redirect with success message
        return redirect()->route('admin.faculty.index')->with('success', 'Faculty member added successfully.');
    }
    



    // Show form to edit faculty member
    public function facultyEdit($id)
    {
        $startYear = 2000;
        $currentYear = now()->year; // Get the current year
        $years = range($startYear, $currentYear); // Create an array of years

        // Find the faculty member by ID
        $faculty = FacultyMember::findOrFail($id);
        $cadres = DB::table('manage_cadres')->get();
        // Return the edit view with the faculty data
        return view('admin.faculty_members.edit', compact('faculty','cadres','years'));
    }

    // Update faculty member
    public function facultyUpdate(Request $request, $id)
    {
        $facultyMember = FacultyMember::findOrFail($id);

        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:faculty_members,email,' . $facultyMember->id,
            'designation' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'phone_internal_office' => 'nullable|digits:10',
            'phone_internal_residence' => 'nullable|digits:10',
            'phone_pt_office' => 'nullable|digits:10',
            'phone_pt_residence' => 'nullable|digits:10',
            'mobile' => 'nullable|digits:10',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if (isset($facultyMember->image) && file_exists(public_path($facultyMember->image))) {
                try {
                    // Attempt to delete the old image
                    unlink(public_path($facultyMember->image));
                } catch (\Exception $e) {
                    // Log the error if unlink fails
                    \Log::error('Error deleting image: ' . $e->getMessage());
                }
            }
        
            // Upload new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('faculty-images'), $imageName);
        
            $data['image'] = 'faculty-images/' . $imageName;
        }
        $facultyMember->update($data);

        ManageAudit::create([
            'Module_Name' => 'Organization Module', // Static value
            'Time_Stamp' => time(), // Current timestamp
            'Created_By' => null, // ID of the authenticated user
            'Updated_By' => null, // No update on creation, so leave null
            'Action_Type' => 'Update', // Static value
            'IP_Address' => $request->ip(), // Get IP address from request
        ]);

        return redirect()->route('admin.faculty.index')->with('success', 'Faculty member updated successfully.');
    }

    // Delete faculty member
    public function facultyDestroy($id)
    {
        // Find the faculty member by ID
        $facultyMember = FacultyMember::findOrFail($id);
        // Check if the faculty member is already inactive (status = 1 or 0), and prevent deletion if necessary
        if ($facultyMember->page_status == 1) {
            return redirect()->route('admin.faculty.index')->with('error', 'Inactive faculty members cannot be deleted.');
        }
        // Permanently delete the faculty member from the database
        $facultyMember->delete();
        // Redirect back with a success message
        return redirect()->route('admin.faculty.index')->with('success', 'Faculty member deleted successfully.');
    }



    public function staffIndex()
    {
        $staffMembers = StaffMember::all();
        return view('admin.staff_members.index', compact('staffMembers'));
    }

    // Staff Create
    public function staffCreate()
    {
        return view('admin.staff_members.create');
    }


    // Staff Store
    public function staffStore(Request $request)
    {
        // Validate input fields
        $validated = $request->validate([
            'language' => 'required|string|in:1,2', // Replace with your dropdown options
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:staff_members,email', // Ensure unique email
            'designation' => 'required|string|max:255',
            'mobile' => 'required|digits:10|unique:staff_members,mobile', // Ensure valid 10-digit mobile number

            // Optional fields with uniqueness and format validation
            'phone_internal_office' => 'nullable|digits:10',
            'phone_pt_office' => 'nullable|digits:10',
            'phone_pt_residence' => 'nullable|digits:10',
            'phone_internal_residence' => 'nullable|digits:10',
        

            'page_status' => 'required|in:1,0', // Replace with your dropdown options
            'present_at_station' => 'required|in:1,0', // Replace with your dropdown options
            'acm_member' => 'required|in:1,0', // Replace with your dropdown options
            'co_opted_member' => 'required|in:1,0', // Replace with your dropdown options
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image upload with size and format constraints
        ]);

        // Handling image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('staff_images'), $imageName);
            $validated['image'] = 'staff_images/' . $imageName;
        }

        // Save the validated data into the database
        $staff = StaffMember::create($validated);

        // Audit log creation
        ManageAudit::create([
            'Module_Name' => 'Staff Module',
            'Time_Stamp' => time(),
            'Created_By' => null,
            'Updated_By' => null,
            'Action_Type' => 'Insert',
            'IP_Address' => $request->ip(),
        ]);

        return redirect()->route('admin.staff.index')->with('success', 'Staff member created successfully!');
    }


    // Staff Edit
    public function staffEdit($id)
    {
        $staff = StaffMember::findOrFail($id);
        return view('admin.staff_members.edit', compact('staff'));
    }

    // Staff Update
    public function staffUpdate(Request $request, $id)
    {
        $staff = StaffMember::findOrFail($id);

        // Validate input fields
        $validated = $request->validate([
            'language' => 'required|string|in:1,2', // Replace with your dropdown options
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:staff_members,email,' . $id, // Exclude current staff email
            'designation' => 'required|string|max:255',
            'mobile' => 'required|digits:10|unique:staff_members,mobile,' . $id, // Exclude current mobile number
            
            // Optional fields without uniqueness checks
            'phone_internal_office' => 'nullable|digits:10',
            'phone_pt_office' => 'nullable|digits:10',
            'phone_pt_residence' => 'nullable|digits:10',
            'phone_internal_residence' => 'nullable|digits:10',

            'page_status' => 'required|in:1,0', // Replace with your dropdown options
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional image upload with size and format constraints
        ]);


        $staffData = $request->all();

        // Handling image update
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($staff->image && file_exists(public_path($staff->image))) {
                unlink(public_path($staff->image));
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('staff_images'), $imageName);
            $staffData['image'] = 'staff_images/' . $imageName;
        }

        $staff->update($staffData);

        ManageAudit::create([
            'Module_Name' => 'Staff Module', // Static value
            'Time_Stamp' => time(), // Current timestamp
            'Created_By' => null, // ID of the authenticated user
            'Updated_By' => null, // No update on creation, so leave null
            'Action_Type' => 'Update', // Static value
            'IP_Address' => $request->ip(), // Get IP address from request
        ]);

        return redirect()->route('admin.staff.index')->with('success', 'Staff member updated successfully!');
    }

    public function staffDestroy($id)
    {
        // Fetch the staff member by ID
        $staff = DB::table('staff_members')->where('id', $id)->first();
    
        // Check if the staff member exists
        if (!$staff) {
            return redirect()->route('admin.staff.index')->with('error', 'Staff member not found.');
        }
    
        // Check if the status is 1 (Inactive), and if so, prevent deletion
        if ($staff->page_status == 1) {
            return redirect()->route('admin.staff.index')->with('error', 'Inactive staff members cannot be deleted.');
        }
    
        // Delete staff image if it exists
        if ($staff->image && file_exists(public_path($staff->image))) {
            unlink(public_path($staff->image));
        }
    
        // Delete the staff record from the database
        DB::table('staff_members')->where('id', $id)->delete();
    
        return redirect()->route('admin.staff.index')->with('success', 'Staff member deleted successfully!');
    }
    



    public function sectionIndex()
    {
        $sections = Section::all();
        return view('admin.sections.index', compact('sections'));
    }
 
    // Section create method to show the create form
    public function sectionCreate()
    {
        return view('admin.sections.create');
    }

    // Section store method to handle form submission for creating new section
    public function sectionStore(Request $request)
    {

        // Validate the input data
        $request->validate(
            [
                'language' => 'required|in:1,2', // Adjust the 'in' values to your available language options
                'title' => 'required|string|max:255', // Title is required, must be a string, and max length is 255
                'status' => 'required|in:1,0', // Status must be one of these options
            ],
            [
                'language.required' => 'Please select a language.', // Custom message for language
                'language.in' => 'Invalid language selected.', // Invalid language option message
                'title.required' => 'Please enter a title.', // Custom message for title
                'title.max' => 'Title must not exceed 255 characters.', // Custom message for max length
                'status.required' => 'Please select a status.', // Custom message for status
                'status.in' => 'Invalid status selected.', // Invalid status option message
            ]
        );
        
        $sectionData = $request->all(); // No validation

        Section::create($sectionData);

        return redirect()->route('sections.index')->with('success', 'Section added successfully');
    }

    // Section edit method to show the edit form for a specific section
    public function sectionEdit($id)
    {
        $section = Section::findOrFail($id);
        return view('admin.sections.edit', compact('section'));
    }

    // Section update method to handle form submission for updating section details
    public function sectionUpdate(Request $request, $id)
    {
        $section = Section::findOrFail($id);
        $sectionData = $request->all(); // No validation

        $section->update($sectionData);

        return redirect()->route('sections.index')->with('success', 'Section updated successfully');
    }

    // Section destroy method to delete a section
    public function sectionDestroy($id)
    {
        $section = Section::findOrFail($id);
        // Check if the status is 1 (Inactive), and if so, prevent deletion
        if ($section->status == 1) {
            return redirect()->route('sections.index')->with('error', 'Inactive section cannot be deleted.');
        }

        $section->delete();

        return redirect()->route('sections.index')->with('success', 'Section deleted successfully');
    }
    public function indexSectionCategory(REQUEST $request)
    {
        // dd('hi');
        // Fetch sections using query builder
        $id = $request->catid;
        // $sections = DB::table('sections')->select('name','description','status','id')->from('sections')->get();
        $sections = DB::table('section_category')->select('name','description','officer_Incharge','status','id')->where('section_id',$id)->get();


        // $sections =  DB::table('section_category')->select('name','description','officer_Incharge','status','id')->from('section_category')->get();
        // print_r($data);die;
        return view('admin.sections.section_category.index', compact('sections','id'));
    }
    public function createSectionCategory(REQUEST $request)
    {
        // Fetch sections using query builder
        $id = $request->catid;
        return view('admin.sections.section_category.create', compact('id'));
    }
    
    public function storeSectionCategory(Request $request)
    {
        // print_r($_POST)
      
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'officer_Incharge' => 'nullable|string',
            'email' => 'nullable|email',
            'status' => 'required|boolean',
        ]);
    
        // Insert data using query builder
        DB::table('section_category')->insert([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'officer_Incharge' => $validatedData['officer_Incharge'],
            'alternative_Incharge_1st' => $request->alternative_incharge_1st,
            'alternative_Incharge_2st' => $request->alternative_incharge_2st,
            'alternative_Incharge_3st' => $request->alternative_incharge_3st,
            'alternative_Incharge_4st' => $request->alternative_incharge_4st,
            'alternative_Incharge_5st' => $request->alternative_incharge_5st,
            'section_head' => $request->section_head,
            'phone_internal_office' => $request->phone_internal_office,
            'phone_internal_residence' => $request->phone_internal_residence,
            'phone_p_t_office' => $request->phone_p_t_office,
            'phone_p_t_residence' => $request->phone_p_t_residence,
            'fax' => $request->fax,
            'email' => $validatedData['email'],
            'status' => $validatedData['status'],
            'section_id' => $request->section_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        ManageAudit::create([
            'Module_Name' => 'Section Category', // Static value
            'Time_Stamp' => time(), // Current timestamp
            'Created_By' => null, // ID of the authenticated user
            'Updated_By' => null, // No update on creation, so leave null
            'Action_Type' => 'Insert', // Static value
            'IP_Address' => $request->ip(), // Get IP address from request
        ]);

        return redirect()->route('admin.section_category.index', ['catid' => $request->section_id])->with('success', 'Section Category created successfully');
}
    public function editSectionCategory($id)
{
    // Fetch section category and sections using query builder
    $sectionCategory = DB::table('section_category')->where('id', $id)->first();
   
    
    return view('admin.sections.section_category.edit', compact('sectionCategory'));
}

public function updateSectionCategory(Request $request, $id)
{
    // print_r($_POST);die;
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'officer_Incharge' => 'nullable|string',
        'email' => 'nullable|email',
        'status' => 'required|boolean',
    ]);

    // Update data using query builder
    DB::table('section_category')->where('id', $id)->update([
        'name' => $validatedData['name'],
        'description' => $validatedData['description'],
        'officer_Incharge' => $validatedData['officer_Incharge'],
        'alternative_Incharge_1st' => $request->alternative_Incharge_1st,
        'alternative_Incharge_2st' => $request->alternative_Incharge_2st,
        'alternative_Incharge_3st' => $request->alternative_Incharge_3st,
        'alternative_Incharge_4st' => $request->alternative_Incharge_4st,
        'alternative_Incharge_5st' => $request->alternative_Incharge_5st,
        'section_head' => $request->section_head,
        'phone_internal_office' => $request->phone_internal_office,
        'phone_internal_residence' => $request->phone_internal_residence,
        'phone_p_t_office' => $request->phone_p_t_office,
        'phone_p_t_residence' => $request->phone_p_t_residence,
        'fax' => $request->fax,
        'email' => $validatedData['email'],
        'status' => $validatedData['status'],
        'updated_at' => now(), 
    ]);
    return redirect()->route('admin.section_category.index', ['catid' => $request->section_id])->with('success', 'Section Category updated successfully');

   }
public function destroySectionCategory($id)
{
    // Delete using query builder
    $sectionCategory = DB::table('section_category')->select('section_id')->where('id', $id)->first();
    
    DB::table('section_category')->where('id', $id)->delete();

    return redirect()->route('admin.section_category.index',$sectionCategory->section_id)->with('success', 'Section Category deleted successfully');
}

    // public function getYears()
    // {
    //     $startYear = 2000;
    //     $currentYear = now()->year; // Get the current year
    //     $years = range($startYear, $currentYear); // Create an array of years

    //     return view('admin.faculty', compact('years'));
    // }


    
}
