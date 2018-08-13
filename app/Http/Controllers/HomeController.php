<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function show()
    {

       $user = auth()->user();
       $name = $user->name;
       $email = $user->email;
       $path = $user->avatar_filename;
       $url = Storage::disk('s3')->url($path);

       return view('users.home', ['user' => $user, 'url' => $url]);
    }
    
    


    /**
     * ファイルアップロード処理
     */
    public function upload(Request $request)
    {
        $this->validate($request, [
            'myfile' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 最小縦横120px 最大縦横400px
                'dimensions:min_width=120,min_height=120,max_width=400,max_height=400',
            ]
        ]);
        
        if ($request->file('myfile')->isValid([])) {
            
            $image = $request->file('myfile');

         /**
         * 自動生成されたファイル名が付与されてS3に保存される。
         * 第三引数に'public'を付与しないと外部からアクセスできないので注意。
         * 同時にファイルパスをDB(avatar_filename)に保存
         */
            $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
            $user = User::find(auth()->id());
            $user->avatar_filename = $path;
            $user->save();
            
         /* ファイルパスから参照するURLを生成する */
            $url = Storage::disk('s3')->url($path);
            
        /* $urlをpicture.bladeに返す */
            return view('users.home', ['user' => $user, 'url' => $url]);

        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['myfile' => '画像がアップロードされていないか不正なデータです。']);
        }
    }
}
