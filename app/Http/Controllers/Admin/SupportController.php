<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();
        return view('admin/supports/index', compact('supports'));
    }

    public function show($id, Support $support){
        if(!$support = $support->find($id)){
            return back();
        }
        
        return view('admin/supports/show', compact('support'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {
        $data = $request->validate();
        $data['status'] = 'a';

        $support->create($data);
        
        return redirect()->route('supports.index');
    }

    public function edit(Support $support, $id)
    {
        if(!$support = $support->where('id', $id)->first()){
            return back();
        }

        return view('admin/supports/edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, $id)
    {
        if(!$support = $support->find($id)){
            return back();
        }

        $support->update($request->validate());


        return redirect()->route('supports.index');
    }

    public function destroy($id, Support $support)
    {
        if(!$support = $support->find($id)){
            return back();
        }

        $support->delete();

        return redirect()->route('supports.index');
    }
}
