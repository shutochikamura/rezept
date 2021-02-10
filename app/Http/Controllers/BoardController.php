<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Http\Requests\BoardRequest;
use App\Models\Material;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

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
	if($request->file('file') != null){
	//S3へのファイルアップロード処理の時の情報を変数$upload_infoに格納する
		//            $upload_info = Storage::disk('s3')->putFile('/test', $request->file('file'), 'public');
		//                        //S3へのファイルアップロード処理の時の情報が格納された変数$upload_infoを用いてアップロードされた画像へのリンクURLを変数$pathに格納する
		//                                    $path = Storage::disk('s3')->url($upload_info);
		//                                                //現在ログイン中のユーザIDを変数$user_idに格納する
		//                                                            $user_id = Auth::id();
		//                                                                        //モデルファイルのクラスからインスタンスを作成し、オブジェクト変数$new_image_dataに格納する
		//                                                                                    $new_image_data = new Image();
		//                                                                                                //プロパティ(静的メソッド)user_idに変数$user_idに格納されている内容を格納する
		//                                                                                                            $new_image_data->user_id = $user_id;
		//                                                                                                                        //プロパティ(静的メソッド)に変数$pathに格納されている内容を格納する
		//                                                                                                                                    $new_image_data->path = $path;
		//                                                                                                                                                //インスタンスの内容をDBのテーブルに格納する
		//                                                                                                                                                            $new_image_data->save();
	
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
        return redirect('/board');
    }

    public function show($id)
    {
	    $items = Board::find($id);
	    $user_images = Image::where('board_id',$id)->get();
        return view('board.show', compact('items','user_images'));
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
        return redirect('/board');
    }

    public function destroy($id)
    {
        $post = Board::find($id);
        $post->delete();
        return redirect('/board');
    }
}
