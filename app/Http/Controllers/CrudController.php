<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CrudController extends Controller
{
    public function showData()
    {
        $data = Crud::paginate(3);
       return view('show', compact('data'));
    }
    public function addData()
    {
        return view('addData');
    }

    /**
     * Data Stored into DB
     */

    public function storeData(Request $request)
    {
        $rules = [
            'name'=>'required | max:10',
            'email' => 'required|email'
        ]; 
        $this->validate($request, $rules);

        $val = new Crud();
        $val->name = $request->name;
        $val->email = $request->email;
        $val->save();
        Session::flash('msg', 'Data saved successfully'); 

        return redirect('/');
    }
    /**
     * Edit Data
     */
    public function editData($id = null)
    {
        $data = Crud::find($id);
        return view('editData', compact('data'));
    }

    /**
     * Update Data
     */
    public function updateData(Request $request, $id)
    {
        $rules = [
            'name'=>'required | max:10',
            'email' => 'required|email'
        ]; 
        $this->validate($request, $rules);

        $val = Crud::find($id);
        $val->name = $request->name;
        $val->email = $request->email;
        $val->save();
        Session::flash('msg', 'Data updated successfully'); 

        return redirect('/');
    }

    public function deleteData($id = null)
    {
        $data = Crud::find($id);
        $data->delete();
        Session::flash('msg', 'Data deleted successfully');
        return redirect('/');
    }
}
