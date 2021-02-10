<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BoardRequest;
use App\Http\Requests\GuestRequest;
use App\Models\Board;
use App\Models\Material;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $items = $request->items;
        $host = $request->host;
        if ($request->guest_password === $request->host->guest_password) {
            return view('guest.board', compact('items', 'host'));
        } else if ($request->guest_password != $request->host->guest_password) {
            $home_form = 'パスワードを再入力して下さい';
            return view('home', compact('home_form'));
        }
    }

    public function search(Request $request)
    {

        $items = $request->items;
        $host = $request->host;
        if ($request->guest_password === $request->host->guest_password) {
            $guestSearch = $request->input('guestSearch');
            if (empty($guestSearch)) {

                return redirect('/guest');
            } else {
                $_q = str_replace('　', ' ', $guestSearch);  //全角スペースを半角に変換
                $_q = preg_replace('/\s(?=\s)/', '', $_q); //連続する半角スペースは削除
                $_q = trim($_q); //文字列の先頭と末尾にあるホワイトスペースを削除
                $_q = str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $_q); //円マーク、パーセント、アンダーバーはエスケープ処理
                $keywords = array_unique(explode(' ', $_q)); //キーワードを半角スペースで配列に変換し、重複する値を削除
                $query = Board::query();
                foreach ($keywords as $keyword) {

                    $query->where(function ($_query) use ($keyword) {
                        $_query->where('title', 'LIKE', '%' . $keyword . '%')
                            ->orwhere('recipe', 'LIKE', '%' . $keyword . '%');
                    });
                }
                $items = $query->get();
            }
            return view('guest.board', compact('items', 'host'));
        } else if ($request->guest_password != $request->host->guest_password) {
            $home_form = 'パスワードを再入力して下さい';
            return view('home', compact('home_form'));
        }
    }

    public function create(Request $request)
    {
        $items = $request->items;
        $host = $request->host;
        if ($request->guest_password === $request->host->guest_password) {
            return view('guest.add');
        } else if ($request->guest_password != $request->host->guest_password) {
            $home_form = 'パスワードを再入力して下さい';
            return view('home', compact('home_form'));
        }
    }

    public function store(GuestRequest $request)
    {
        $items = $request->items;
        $host = $request->host;
        if ($request->guest_password === $request->host->guest_password) {
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
        } else if ($request->guest_password != $request->host->guest_password) {
            $home_form = 'パスワードを再入力して下さい';
            return view('home', compact('home_form'));
        }
    }

    public function show(Request $request, $id)
    {

        $items = $request->items;
        $host = $request->host;
        if ($request->guest_password === $request->host->guest_password) {
            $items = Board::find($id);
            return view('guest.show', compact('items'));
        } else if ($request->guest_password != $request->host->guest_password) {
            $home_form = 'パスワードを再入力して下さい';
            return view('home', compact('home_form'));
        }
    }

    public function edit(Request $request, $id)
    {
        $items = $request->items;
        $host = $request->host;
        if ($request->guest_password === $request->host->guest_password) {
            $form = Board::find($id);
            return view('guest.edit', compact('form'));
        } else if ($request->guest_password != $request->host->guest_password) {
            $home_form = 'パスワードを再入力して下さい';
            return view('home', compact('home_form'));
        }
    }

    public function update(GuestRequest $request, $id)
    {
        $items = $request->items;
        $host = $request->host;
        if ($request->guest_password === $request->host->guest_password) {
            $post = Board::find($id);
            $form = $request->all();
            unset($form['_token']);
            $post->fill($form)->save();
            $postId = $post->id;
            foreach ($form as $key => $val) {
                if ($val == null) {
                    break;
                }
                if (preg_match("/digit/", $key)) {
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
                    if ($val === '0') {
                        $material->delete();
                    }
                }
            }
            return redirect('/guest_home');
        } else if ($request->guest_password != $request->host->guest_password) {
            $home_form = 'パスワードを再入力して下さい';
            return view('home', compact('home_form'));
        }
    }
}
