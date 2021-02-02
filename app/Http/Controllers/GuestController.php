<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BoardRequest;
use App\Models\Board;
use App\Models\Material;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $host = User::where('id', '=', Auth::user()->guest_id)->first();
        $items = Board::where('user_id', '=', Auth::user()->guest_id)->get();
        return view('guest.board', compact('items', 'host'));
    }

    public function create()
    {
        return view('guest.add');
    }

    public function store(BoardRequest $request)
    {
        $post = new Board;
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        $postId = $post->id;
        foreach ($form as $key => $val) {
            if ($val == null) {
                break;
            }
            if (preg_match("/material/", $key)) {
                $material = new Material;
                $material->board_id = $postId;
                $material->material = $val;
            }
            if (preg_match("/volume/", $key)) {
                $material->volume = $val;
            }
            if (preg_match("/unit/", $key)) {
                $material->unit = $val;
                $material->save();
            }
        }
        return redirect('/guest_home');
    }

    public function show($id)
    {
        $items = Board::find($id);
        return view('guest.show', compact('items'));
    }

    public function edit($id)
    {
        $form = Board::find($id);
        return view('guest.edit', compact('form'));
    }

    public function update(Request $request, $id)
    {
        $post = Board::find($id);
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        $postId = $post->id;

        foreach ($form as $key => $val) {
            if($val == null){
                break;
            }
            if (preg_match("/digit/", $key)){
                $material = new Material;
                $material->board_id = $postId;
                $material->material = $val;
            } else if (preg_match("/num/", $key)) {
                $material = Material::find($val);
            }
            if (preg_match("/material/", $key)) {
                $material->material = $val;
            } else if (preg_match("/volume/", $key)) {
                $material->volume = $val;
            } else if (preg_match("/unit/", $key)) {
                $material->unit = $val;
                $material->save();
                if($val === '0'){
                    $material->delete();
                }
            }
        }
        return redirect('/guest_home');
    }

}
