<?php

namespace App\Http\Controllers\Admin\Micro;

use App\Http\Controllers\Controller;
use App\Models\Admin\Micro\micromenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use App\Models\Admin\Micro\MicroManageAudit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MicroMenuController extends Controller
{
    public function index() 
    {
        $menus = micromenu::where('is_deleted', 0)->get();
        $menuTree = $this->buildMenuTree($menus);

        return view('admin.micro.manage_micromenus.index', compact('menuTree'));
    }

    private function buildMenuTree($menus, $parentId = null)
    {
        $branch = [];

        foreach ($menus as $menu) {
            if ($menu->parent_id == $parentId) {
                $children = $this->buildMenuTree($menus, $menu->id);
                if ($children) {
                    $menu->children = $children;
                }
                $branch[] = $menu;
            }
        }

        return $branch;
    }

    protected function getMenuType($type)
    {
        switch ($type) {
            case 1:
                return 'Content';
            case 2:
                return 'PDF File Upload';
            case 3:
                return 'Website URL';
            default:
                return 'Unknown';
        }
    }

    protected function getContentPosition($position)
    {
        switch ($position) {
            case 1:
                return 'Header Menu';
            case 2:
                return 'Bottom Menu';
            case 3:
                return 'Footer Menu';
            case 4:
                return 'Director Message Menu';
            case 5:
                return 'Life Academy Menu';
            case 6:
                return 'Other Pages';
            case 7:
                return 'Latest Updates';
            default:
                return 'Unknown';
        }
    }

    public function create()
    {
        // Filter research centres where state equals 1
        $researchCentres = DB::table('research_centres')
                            ->where('status', 1)
                            ->pluck('research_centre_name', 'id'); // Replace 'name' and 'id' with your actual column names.

        // Build menu options
        $menuOptions = $this->buildMenuOptions();

        // Return view with filtered research centres and menu options
        return view('admin.micro.manage_micromenus.create', compact('menuOptions', 'researchCentres'));
    }


    private function buildMenuOptions($parentId = null, $spacing = '')
    {
        $parentId = $parentId ?? 0;
        $menus = micromenu::where('parent_id', $parentId)
            ->whereIn('txtpostion', [1, 2])
            ->where('is_deleted', 0)
            ->get();
        $options = '';

        foreach ($menus as $menu) {
            $options .= '<option value="' . $menu->id . '">' . $spacing . $menu->menutitle . '</option>';
            $options .= $this->buildMenuOptions($menu->id, $spacing . '--- ');
        }

        return $options;
    }

    public function store(Request $request)
    {
        // dd($request);
        // Validate the incoming request data
        $validatedData = $request->validate([
            'language' => 'required',
            'research_centre' => 'required',
            'menutitle' => 'required|string|max:255',
            'texttype' => 'required',
            'menucategory' => 'required',
            'txtpostion' => 'required',            
            'menu_status' => 'required|in:1,0',
            
        ]);
        // dd($request->all());
        // Check if 'web_site_target' has a valid integer value, or redirect back if invalid
        if ($request->input('web_site_target') == 'Select') {
            return redirect()->back()->with('error', 'Please select a valid website target.');
        }

        // Create new menu entry
        $menu = new micromenu();
        $menu->language = $request->language;
        $menu->research_centreid = $request->research_centre;
        $menu->menutitle = $request->menutitle;
        $menu->menu_slug = Str::slug($request->menutitle, '-');
        $menu->texttype = $request->texttype;
        $menu->menucategory = $request->menucategory;
        $menu->parent_id = $request->menucategory;
        $menu->txtpostion = $request->txtpostion;
        $menu->meta_title = $request->input('meta_title');
        $menu->meta_keyword = $request->input('meta_keyword');
        $menu->meta_description = $request->input('meta_description');
        $menu->web_site_target = $request->input('web_site_target'); // Store web_site_target as integer
        $menu->menu_status = $request->menu_status;

        // Handle file upload
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('pdfs');
            $file->move($destinationPath, $filename);
            $menu->pdf_file = 'pdfs/' . $filename;
        }

        // Handle content based on texttype
        if ($request->texttype == 1) {
            $menu->content = $request->content;
        } elseif ($request->texttype == 3) {
            $menu->website_url = $request->website_url;
        }
       
        // Save the menu to the database
        $menu->save();

        // Audit logging
        MicroManageAudit::create([
            'Module_Name' => 'Menu',
            'Time_Stamp' => time(),
            'Created_By' => null,
            'Updated_By' => null,
            'Action_Type' => 'Insert',
            'IP_Address' => $request->ip(),
        ]);

        // Redirect with success message
        return redirect()->route('micromenus.index')->with('success', 'Menu created successfully.');
    }


    public function edit($id)
    {
        $menu = micromenu::find($id);
        $menus = micromenu::all();
        $menuOptions = $this->getMenuOptions($menus, $menu->menucategory);
        $researchCentres = DB::table('research_centres')
        ->select('id', 'research_centre_name')
        ->pluck('research_centre_name', 'id')
        ->toArray();

        return view('admin.micro.manage_micromenus.edit', compact('menu', 'menuOptions','researchCentres'));
    }

    private function getMenuOptions($menus, $selectedCategoryId, $parentId = 0, $indent = '')
    {
        $options = '';
        foreach ($menus as $m) {
            if ($m->parent_id == $parentId) {
                $selected = ($selectedCategoryId == $m->id) ? 'selected' : '';
                $options .= '<option value="' . $m->id . '" ' . $selected . '>' . htmlspecialchars($indent . $m->menutitle) . '</option>';
                $options .= $this->getMenuOptions($menus, $selectedCategoryId, $m->id, $indent . '--- ');
            }
        }
        return $options;
    }

    public function update(Request $request, $id)
    {
        $menu = micromenu::findOrFail($id);
        $menu->language = $request->txtlanguage;
        $menu->research_centreid = $request->research_centre;
        $menu->menutitle = $request->menutitle;
        $menu->menu_slug = Str::slug($request->menutitle, '-');
        $menu->texttype = $request->texttype;
        $menu->menucategory = $request->menucategory;
        $menu->parent_id = $request->menucategory;
        $menu->txtpostion = $request->txtpostion;
        $menu->meta_title = $request->input('meta_title');
        $menu->meta_keyword = $request->input('meta_keyword');
        $menu->meta_description = $request->input('meta_description');
        $menu->content = $request->input('content', null);
        $menu->website_url = $request->input('website_url', null);
        $menu->menu_status = $request->input('menu_status', 0);
        $menu->start_date = $request->input('start_date');
        $menu->termination_date = $request->input('termination_date');

        if ($request->hasFile('pdf_file')) {
            if (File::exists(public_path($menu->pdf_file))) {
                File::delete(public_path($menu->pdf_file));
            }

            $file = $request->file('pdf_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/menus/'), $fileName);
            $menu->pdf_file = 'uploads/menus/' . $fileName;
        }

        $menu->save();

        MicroManageAudit::create([
            'Module_Name' => 'Menu', // Static value
            'Time_Stamp' => time(), // Current timestamp
            'Created_By' => null, // ID of the authenticated user
            'Updated_By' => null, // No update on creation, so leave null
            'Action_Type' => 'Update', // Static value
            'IP_Address' => $request->ip(), // Get IP address from request
        ]);

        return redirect()->route('micromenus.index')->with('success', 'Menu updated successfully.');
    }

    public function delete($id)
    {
        // Retrieve the menu from the database
        $menu = micromenu::findOrFail($id);
        // Check if the menu's status is 1 (Inactive)
        if ($menu->menu_status == 1) {
            // If the status is inactive, prevent deletion and show an error message
            return redirect()->route('micromenus.index')->with('error', 'Active menus cannot be deleted.');
        }
        // If the menu is not inactive, mark it as deleted (soft delete)
        $menu->is_deleted = 1;
        $menu->save();
        // Redirect with a success message
        return redirect()->route('micromenus.index')->with('success', 'Menu marked as deleted successfully.');
    }


    public function toggleStatus(Request $request, $id)
    {
        
        $menu = micromenu::findOrFail($id);
        $menu->menu_status = !$menu->menu_status;
        $menu->save();

        return response()->json(['status' => $menu->menu_status]);
    }
}
