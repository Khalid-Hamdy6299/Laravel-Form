<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function all()
    {
        $employees = Employee::paginate(3);
        return view('Emp.All', compact('employees'));
    }

    public function show($id)
    {
        $employee = Employee::findorfail($id);
        return view('Emp.show', compact('employee'));
    }


    public function add()
    {
        $departments = Department::get();
        return view('Emp.add', compact('departments'));
    }

    public function store(Request $request)
    {
        //Validation
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'National_ID' => 'required|numeric|unique:employees,National_ID',
            'department_id' => 'required|exists:departments,id',
            'salary' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg, png, jpg,jifi'
        ]);


        //Store Image
        $data['image'] = Storage::putFile('Emp', $data['image']);
        //Store Data
        Employee::create($data);
        session()->flash('success', 'Data Inserted Successfuly');
        return redirect(route('All_Emp'));
    }

    public function edit($id)
    {
        $employee = Employee::findorfail($id);
        $departments = Department::get();
        return view('Emp.edit', compact('employee', 'departments'));
    }

    public function update($id, Request $request)
    {
        $employee = Employee::findorfail($id);
        //Validation
        $data = $request->validate([
            'name' => 'string|max:100',
            'National_ID' => 'numeric',
            'department_id' => 'exists:departments,id',
            'salary' => 'numeric',
            'image' => 'nullable|image|mimes:jpeg, png, jpg,jifi'
        ]);

        //Check if have photo
        if ($request->has('image')) {
            //Delete old One
            Storage::delete($employee->image);
            //Store New One
            $data['image'] = Storage::putFile('Emp', $data['image']);
        }

        //Update Data
        $employee->update($data);
        session()->flash('success', 'Data Updata Successfuly');
        return view('Emp.show', compact('employee'));
    }

    public function delete($id)
    {
        $employee = Employee::findorfail($id);
        Storage::delete($employee->image);
        $employee->delete();
        session()->flash('success', 'Data Deleted Successfuly');
        return redirect(route('All_Emp'));
    }

    public function search_emp(Request $request)
    {
        $key = $request->key;
        $employees = Employee::where('name', 'like', "%$key%")->paginate(3);
        return view('Emp.All', compact('employees'));
    }
}
