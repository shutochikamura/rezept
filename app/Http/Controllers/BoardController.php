<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Http\Requests\BoardRequest;
use App\Models\Material;

class BoardController extends Controller
{

    public function index()
    {
        $items = Board::all();
        return view('board.index', compact('items'));
    }

    public function create()
    {
        return view('board.add');
    }

    public function store(BoardRequest $request)
    {
        $post = new Board;
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        $postId = $post->id;
        foreach ($form as $key => $val) {
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
        return redirect('/board');
    }

    public function show($id)
    {
        $items = Board::find($id);
        return view('board.show', compact('items'));
    }

    public function edit($id)
    {
        $form = Board::find($id);
        return view('board.edit', compact('form'));
    }


    public function update(BoardRequest $request, $id)
    {
        $post = Board::find($id);
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        $postId = $post->id;
        $materialGet = Board::find($id)->materials()->get();



        foreach ($form as $key => $val) {
            if (preg_match("/digit/", $key)){
                $material = new Material;
                $material->board_id = $postId;
                $material->material = $val;
            }
            if (preg_match("/num/", $key)) {
                $material = Material::find($val);
            }
            if (preg_match("/material/", $key)) {
                $material->material = $val;
            }
            if (preg_match("/volume/", $key)) {

                $material->volume = $val;
            }

            if (preg_match("/unit/", $key) && $material != null) {
                $material->unit = $val;
                $material->save();
            }

        }
        return redirect('/board');
    }

    public function destroy($id)
    {
        $post = Board::find($id);
        $post->delete();
        return redirect('/board');
    }
}
