<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
  * The attributes that are mass assignable.
  *
  * @var array<int, string>
  */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
  * The attributes that should be hidden for serialization.
  *
  * @var array<int, string>
  */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
  * The attributes that should be cast.
  *
  * @var array<string, string>
  */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
  /*上記は最初からあったもの*/


  /*
  *ユーザー会員登録
  */
  public function userRegister($inputs){
    $user = new User();
    $tel;
    $pass = $inputs['password'];
    if(isset($inputs['tel'])){
      $tel = $inputs['tel'];
    }else{
      $tel = '00000000000';
    }

    $user->user_name = $inputs['name'];
    $user->user_kana = $inputs['kana'];
    $user->user_tel = $tel;
    $user->user_mail = $inputs['mail'];
    $user->user_address = $inputs['address'];
    $user->password = Hash::make($pass);
    $user->user_memo ='なし';

    $user->save();
  }


  /*
  *ログイン認証関係
  *usersテーブルのメールアドレスに紐づくpassを取得する
  */
/*  public function return_pass($mail){
    $sql = "SELECT password FROM users WHERE mail='$mail'";
    $user = new User();
    $pass = $user->select($sql);
    return $pass;
  }
*/
  /*
  *メールアドレスとパスが入力されたらusersに存在するかチェック
  *メールとパスが一緒の列に存在していないとログイン不可の仕組み
  */
  public function searchUser($mail,$pass){
    $db_pass = null;
    $db_flg = 3;
    //0ならユーザー
    $result = 3;

    //送信されたメールと一致する情報を取得
    $users = User::where('user_mail', $mail)->get();

    //メールが存在していた場合は、
    //送信されたパスワードと一致するか確認
    if($users != null){
      foreach($users as $user){
        //passwordはカラム名
        $db_pass = $user->password;
        $db_flg = $user->user_flg;
      }
    }

    //passとメアドが一致するかつflgが0ならresultも0
    if(password_verify($pass,$db_pass) && $db_flg == 0){
      $result = 0;
    }else if(password_verify($pass,$db_pass) && $db_flg == 10){
      $result = 10;
    }else{
      $result = 1;
    }

    return $result;
  }

  /*
  *メールに紐づくユーザー情報を取得
  */
  public function getUserMatchedMail($mail){
    $users = User::where('user_mail', $mail)->get();
    return $users;
  }

  /*
  *顧客メモを更新
  */
  public function updateMemo($inputs){

    $cond_id = ['user_id' => $inputs['user_id']];

    if(isset($inputs['memo'])){
      User::where($cond_id)->update([
        'user_memo' =>$inputs['memo'],
      ]);
    }else{
      User::where($cond_id)->update([
        'user_memo' =>'なし',
      ]);
    }
  }

  /*
  *IDに一致するユーザー情報を取得
  */
  public function getUserMatchedId($id){
    $cond_id = ['user_id' => $id];
    $users = User::where($cond_id)->get();
    return $users;
  }

  /*
  *ユーザー会員情報変更
  */
  public function updateUserProfile($inputs){
    $cond_id = ['user_id' => $inputs['user_id']];
    $cond_mail = ['user_mail' => $inputs['メール']];

    //変更者のメールアドレスがDBに存在するならusersに値が入る
    $users = User::where($cond_mail)->get();

    $tel;
    if(isset($inputs['電話番号'])){
      $tel = $inputs['電話番号'];
    }else{
      $tel = '00000000000';
    }
    //コレクションなどの判定にはisset()使えない
    if($users->isNotEmpty()){
      foreach($users as $user){

        if($user->user_id == $inputs['user_id']){
          User::where($cond_id)->update([
            'user_name'=>$inputs['名前'],
            'user_kana'=>$inputs['フリガナ'],
            'user_mail'=>$inputs['メール'],
            'user_tel'=>$tel,
            'user_address'=>$inputs['住所'],
          ]);
          return true;
        }else{
          return false;
        }
      }
    }else{
      User::where($cond_id)->update([
        'user_name'=>$inputs['名前'],
        'user_kana'=>$inputs['フリガナ'],
        'user_mail'=>$inputs['メール'],
        'user_tel'=>$tel,
        'user_address'=>$inputs['住所'],
      ]);
      return true;
    }
  }

  /*
  *管理者から会員削除を押された時
  *フラグを0、10以外にして論理削除とする
  */
  public function removeUserLogical($inputs){
    $cond_id = ['user_id' => $inputs];

    User::where($cond_id)->update([
      'user_name'=>'退会ユーザー',
      'user_kana'=>'タイカイユーザー',
      'user_tel'=>'00000000000',
      'user_mail'=>'x@x',
      'user_address'=>'退会ユーザー',
      'user_flg'=>'2',
      'user_memo'=>'退会済み',
    ]);
  }

  /*
  *パスワード再設定　メールと名前が存在するかチェック
  */
/*  public function check_register_user($mail,$name){
    $db_name = null;
    $db_id = null;

    $cond = ['user_flg' => '0'];
    $cond_mail = ['user_mail' => $mail];

    //メアドと一致する情報を取得
    $users = User::where($cond_mail)->where($cond)->get();

    //メールが存在していた場合
    if($users != null){
      foreach($users as $user){
        //メアドに紐づくDBの名前を取得
        $db_name = $user->user_name;
      }
      //メアドと名前が一致したらDBのuser_idを$db_idに代入
      if($name == $db_name){
        foreach($users as $user){
          $db_id = $user->user_id;
        }
        return $db_id;
      }else{
        return $db_id;
      }
    }else{
      return $db_id;
    }
  }
*/
  /*
  *パスワード再設定
  */
  public function updateUserPassword($inputs){
    $cond_id = ['user_id' => $inputs['user_id']];
    $pass = $inputs['password'];
    User::where($cond_id)->update([
      'password'=>Hash::make($pass),
    ]);
  }


}//クラス
