<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Http\Requests\BoardRequest;
use App\Models\Material;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

use function PHPUnit\Framework\countOf;

class BoardController extends Controller
{

    public function index()
    {
        $items = Board::all();

        return view('board.index', compact('items'));
    }
    public function search(Request $request)
    {
        $hostSearch = $request->input('hostSearch');
        if (empty($hostSearch)) {
            return redirect('/board');
        } else {
            $_q = str_replace('　', ' ', $hostSearch);  //全角スペースを半角に変換
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

        return redirect('/board');
    }

    public function show($id)
    {
        $items = Board::find($id);
        $user_images = Image::where('board_id', $id)->get();
        return view('board.show', compact('items', 'user_images'));
    }

    public function edit($id)
    {
        $form = Board::find($id);
        $user_images = Image::where('board_id', $id)->get();
        return view('board.edit', compact('form', 'user_images'));
    }


    public function update(BoardRequest $request, $id)
    {
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
                if ($val === '1') {
                    $image = Image::where('board_id', '=',  $postId)->first();
                    $str = str_replace('https://rezept-s3.s3.ap-northeast-1.amazonaws.com/', '', $image->path);
                    Storage::disk('s3')->delete($str);
                    $image->delete();
                } else if ($val === '2') {
                    $image = Image::where('board_id', '=',  $postId)->first();
                    $str = str_replace('https://rezept-s3.s3.ap-northeast-1.amazonaws.com/', '', $image->path);
                    Storage::disk('s3')->delete($str);
                    // $image->delete();
                    $path = Storage::disk('s3')->putFile('rezept', $request->file('file'), 'public');
                    $image->path = Storage::disk('s3')->url($path);
                    $image->board_id = $postId;
                    $image->save();
                }
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

    public function image()
    {
        return view('images.image');
    }

    public function storeImage(Request $request)
    {

        if ($request->file('file')) {
            $this->validate($request, [
                'file' => [
                    // アップロードされたファイルであること
                    'file',
                    // 画像ファイルであること
                    'image',
                    // MIMEタイプを指定
                    'mimes:jpeg,png',
                ]
            ]);
            if ($request->file('file')->isValid([])) {

                $post = new Image;

                $path = Storage::disk('s3')->putFile('rezept', $request->file('file'), 'public');
                $post->path = Storage::disk('s3')->url($path);
                $post->board_id = 1;


                $post->save();
            } else {
                dd($request);
                return view('images.show');
            }
        }
        return view('rezept');
    }

    public function showImage()
    {
        //現在ログイン中のユーザIDを変数$user_idに格納する
        $user_id = 1;
        //imagesテーブルからuser_idカラムが変数$user_idと一致するレコード情報を取得し変数$user_imagesに格納する
        $user_images = Image::whereBoard_id($user_id)->get();
        return view('images.show', ['user_images' => $user_images]);
    }
}
