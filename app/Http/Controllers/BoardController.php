<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'access_id' => 'required',
            'color' => 'required'
        ]);
        Board::create([
            'name' => $request->name,
            'access_id' => $request->access_id,
            'color' => $request->color,
            'user_id' => auth()->user()->id
        ]);
        toastr()->success('add successfully');
        return back();
    }

    public function update(Request $request, Board $board)
    {

        $board->update([
            'name' => $request->name,
            'access_id' => $request->access_id,
            'color' => $request->color,
            'user_id' => auth()->user()->id
        ]);
        toastr()->success('Update successfully');
        return back();
    }
    public function delete(Board $board)
    {
        $board->delete();
        toastr()->success('Deleted successfully');
        return back();
    }
}
