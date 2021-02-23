<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BoardRequest;
use App\Http\Requests\GuestRequest;
use App\Models\Board;
use App\Models\Material;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

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
                $items = $query->paginate(20);
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
            return view('guest.add', compact('host'));
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
            if ($request->file('file')) {

                $this->validate($request, [
                    'file' => [
                        'file',
                        'image',
                        'mimes:jpeg,png',
                    ]
                ]);
                if ($request->file('file')->isValid([])) {
                    $disk = new Image;
                    $path = Storage::disk('s3')->putFile('rezept', $request->file('file'), 'public');
                    $disk->path = Storage::disk('s3')->url($path);
                    $disk->board_id = $postId;
                    $disk->save();
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
            $host_image = Image::where('board_id', $id)->first();
            return view('guest.show', compact('items', 'host_image', 'host'));
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
            $host_image = Image::where('board_id', $id)->first();
            return view('guest.edit', compact('form', 'host_image', 'host'));
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
            if ($request->file('file')) {
                $this->validate($request, [
                    'file' => [
                        'file',
                        'image',
                        'mimes:jpeg,png',
                    ]
                ]);
            }
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

                if (preg_match("/image/", $key)) {
                    if ($val === '2') {
                        $image = Image::where('board_id', '=',  $postId)->first();
                        $str = str_replace('https://rezept-s3.s3.ap-northeast-1.amazonaws.com/', '', $image->path);
                        Storage::disk('s3')->delete($str);
                        $image->delete();
                    } else if ($val === '1') {
                        if($request->file('file') == null){
                            break;
                        }
                        $image = Image::where('board_id', '=',  $postId)->first();
                        $str = str_replace('https://rezept-s3.s3.ap-northeast-1.amazonaws.com/', '', $image->path);
                        Storage::disk('s3')->delete($str);

                        $path = Storage::disk('s3')->putFile('rezept', $request->file('file'), 'public');
                        $image->path = Storage::disk('s3')->url($path);
                        $image->board_id = $postId;
                        $image->save();
                    } else if ($val === '3') {
                        if($request->file('file') == null){
                            break;
                        }
                        $disk = new Image;
                        $path = Storage::disk('s3')->putFile('rezept', $request->file('file'), 'public');
                        $disk->path = Storage::disk('s3')->url($path);
                        $disk->board_id = $postId;
                        $disk->save();
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
