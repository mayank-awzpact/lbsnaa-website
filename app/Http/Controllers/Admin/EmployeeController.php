<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    // Display form

    public function organisation_chartIndex()
    {

        $records = DB::table('organisation_chart')->where('category', 0)->get();
        return view('admin.manage_organisationchart.index', compact('records'));
    }

    // Category create method to show the create form
    public function organisation_chartCreate(Request $request)
    {
        $parent_id = !empty($request->query('parent_id')) ? $request->query('parent_id') : '';
        $records = DB::table('faculty_members')->get();
        return view('admin.manage_organisationchart.create', compact('records', 'parent_id'));
    }

    // Category store method to handle form submission for creating new section
    public function organisation_chartStore(Request $request)
    {
        $request->validate([
            'txtlanguage' => 'required',
            'parentcategory' => 'required',
            'employee_name' => 'required',
            'description' => 'nullable|string',
            'category' => 'nullable',
            'status' => 'required',
        ]);



        DB::table('organisation_chart')->insert([
            'language' => $request->input('txtlanguage'),
            'faculty_id' => $request->input('parentcategory'),
            'parent_id' => $request->input('parent_id'),
            'employee_name' => $request->input('employee_name'),
            'description' => $request->input('description'),
            'category' => isset($request->category) ? $request->category : 1,
            'status' => $request->input('status'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect back to the same URL
        return redirect()->route('organisation_chart.sub_org', ['parent_id' => $request->input('parent_id')])
            ->with('success', 'Employee added successfully');
    }

    // Category edit method to show the edit form for a specific section
    public function organisation_chartEdit($id)
    {

        $record = DB::table('organisation_chart')->where('id', $id)->first();
        $faculty = DB::table('faculty_members')->get();

        return view('admin.manage_organisationchart.edit', compact('record', 'faculty'));
    }

    // Category update method to handle form submission for updating section details
    public function organisation_chartUpdate(Request $request, $id)
    {
        $request->validate([
            'txtlanguage' => 'required',
            'parentcategory' => 'required',
            'employee_name' => 'required',
            'description' => 'nullable|string',
            'category' => 'nullable',
            'status' => 'required',

        ]);
        $data = [
            'language' => $request->txtlanguage,
            'faculty_id' => $request->parentcategory,
            'employee_name' => $request->employee_name,
            'description' => $request->description,
            'category' => 1,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        // Update the record using the query builder
        DB::table('organisation_chart')->where('id', $id)->update($data);
        return redirect()->route('organisation_chart.index')->with('success', 'updated successfully');
    }

    // Category destroy method to delete a section
    public function organisation_chartDestroy($id)
    {
        DB::table('organisation_chart')->where('id', $id)->delete();
        return redirect()->route('organisation_chart.index')->with('success', 'deleted successfully');
    }

    public function autocompleteEmployees(Request $request)
    {
        $term = $request->get('term');
        $employees = DB::table('faculty_members') // Replace 'employees' with your actual table name
            ->where('name', 'LIKE', '%' . $term . '%')
            ->pluck('name'); // Adjust the column name if it's not `name`

        return response()->json($employees);
    }

    public function showSubOrg($parent_id)
    {
        // Fetch records based on the parent_id
        $records = DB::table('organisation_chart')
            ->where('parent_id', $parent_id)
            ->get();
        $employeeNames = DB::table('organisation_chart')
            ->where('id', $parent_id)
            ->value('employee_name');
        return view('admin.manage_organisationchart.sub_org', compact('records', 'parent_id', 'employeeNames'));
    }
}
