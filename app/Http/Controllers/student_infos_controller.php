<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/3/16
 * Time: 8:38 PM
 */
namespace App\Http\Controllers;

use App\student_infos;

use Illuminate\Http\Request;

class student_infos_controller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = student_infos::orderBy('row_id','DESC')->paginate(5);
        return view('std_info.index',compact('student_infos'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('std_info.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',
            'Id' => 'required',
        ]);

        student_infos::create($request->all());
        return redirect()->route('std_info.index')
            ->with('success','Data Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = student_infos::find($id);
        return view('std_info.show',compact('student_infos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = std_info::find($id);
        return view('std_info.edit',compact('student_infos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Name' => 'required',
            'Id' => 'required',
        ]);

        std_info::find($id)->update($request->all());
        return redirect()->route('std_info.index')
            ->with('success','Student Information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        std_info::find($id)->delete();
        return redirect()->route('std_info.index')
            ->with('success','Student deleted successfully');
    }
}