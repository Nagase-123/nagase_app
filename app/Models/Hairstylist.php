<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Hairstylist extends Model
{
  use HasFactory;

  /*
  *美容師　会員登録
  */
  public function stylistRegister($inputs){
    $stylist = new Hairstylist();

    $pass = $inputs['password'];

    $stylist->hairstylist_name = $inputs['名前'];
    $stylist->hairstylist_kana = $inputs['フリガナ'];
    $stylist->hairstylist_tel = $inputs['電話番号'];
    $stylist->hairstylist_mail = $inputs['メール'];
    $stylist->hairstylist_address = $inputs['住所'];
    $stylist->hairstylist_pass = Hash::make($pass);
    $stylist->hairstylist_advantage =$inputs['得意スタイル'];
    $stylist->hairstylist_profile =$inputs['自己紹介'];

    $stylist->save();
  }

  /*
  *ログイン　会員登録有無　チェック　
  */
  public function searchStylist($mail,$pass){
    $db_pass = null;
    $db_flg = 3;
    //1ならスタイリスト
    $result = 3;

    //送信されたメールと一致する情報を取得
    $users = Hairstylist::where('hairstylist_mail', $mail)->get();

    //メールが存在していた場合は、
    //送信されたパスワードと一致するか確認
    if($users != null){
      foreach($users as $user){
        //user_passはカラム名
        $db_pass = $user->hairstylist_pass;
        $db_flg = $user->hairstylist_flg;
      }
    }

    //passとメアドが一致するかつflgが1ならresultも1
    //(会員削除された場合はフラグが10になっている)
    if(password_verify($pass,$db_pass) && $db_flg == 1){
      $result = 1;
    }else{
      $result = 3;
    }
    //1なら美容師ホーム画面へ
    return $result;
  }

  /*
  *メールが一致する美容師情報を取得
  */
  public function getStylistMatchedMail($mail){
    $stylist = Hairstylist::where('hairstylist_mail', $mail)->get();
    return $stylist;
  }

  /*
  *IDに紐づく美容師情報を取得
  */
  public function getStylistMatchedId($stylist_id){
    $stylist = Hairstylist::where('hairstylist_id', $stylist_id)->get();
    return $stylist;
  }

  /*
  *美容師情報を変更
  */
  public function updateStylistProfile($inputs){
    $cond_id = ['hairstylist_id' => $inputs['stylist_id']];
    $cond_mail = ['hairstylist_mail' => $inputs['メール']];
    //変更者のメールアドレスがDBに存在するならstylistsに値が入る
    $stylists = Hairstylist::where($cond_mail)->get();

    //コレクション等にisset()は使えないので注意
    if($stylists->isNotEmpty()){
      foreach($stylists as $stylist){
        if($stylist->hairstylist_id == $inputs['stylist_id']){
          Hairstylist::where($cond_id)->update([
            'hairstylist_name'=>$inputs['名前'],
            'hairstylist_kana'=>$inputs['フリガナ'],
            'hairstylist_tel'=>$inputs['電話番号'],
            'hairstylist_mail'=>$inputs['メール'],
            'hairstylist_address'=>$inputs['住所'],
            'hairstylist_advantage'=>$inputs['得意スタイル'],
            'hairstylist_profile'=>$inputs['自己紹介'],
          ]);
          return true;
        }else{
          return false;
        }
      }
    }else{
      Hairstylist::where($cond_id)->update([
        'hairstylist_name'=>$inputs['名前'],
        'hairstylist_kana'=>$inputs['フリガナ'],
        'hairstylist_tel'=>$inputs['電話番号'],
        'hairstylist_mail'=>$inputs['メール'],
        'hairstylist_address'=>$inputs['住所'],
        'hairstylist_advantage'=>$inputs['得意スタイル'],
        'hairstylist_profile'=>$inputs['自己紹介'],
      ]);
      return true;
    }
  }

  /*
  *会員論理削除  フラグを1以外にして論理削除とする
  */
  public function removeStylistLogical($inputs){
    $cond_id = ['hairstylist_id' => $inputs];

    Hairstylist::where($cond_id)->update([
      'hairstylist_flg'=>'2',
      'hairstylist_name'=>'退会美容師',
      'hairstylist_kana'=>'タイカイビヨウシ',
      'hairstylist_tel'=>'00000000000',
      'hairstylist_mail'=>'x@x',
      'hairstylist_address'=>'退会美容師',
      'hairstylist_advantage'=>'退会済み',
      'hairstylist_profile'=>'退会済み',
    ]);
  }

  /*
  *パスワード再設定時　会員が存在するかチェック
  */
  public function stylistMemberCheck($mail,$name){
    // メールアドレスとパスが入力されたらDBに存在するかチェック
    $db_name = null;
    $db_id = null;
    $cond = ['hairstylist_flg' => '1'];
    $cond_mail = ['hairstylist_mail' => $mail];

    //メアドと一致する情報を取得
    $stylists = HairStylist::where($cond_mail)->where($cond)->get();

    //メールが存在していた場合
    if($stylists != null){
      foreach($stylists as $stylist){
        //メアドに紐づくDBの名前を取得
        $db_name = $stylist->hairstylist_name;
      }
      //メアドと名前が一致したらidを$db_idに代入
      if($name == $db_name){
        foreach($stylists as $stylist){
          $db_id = $stylist->hairstylist_id;
        }
        return $db_id;
      }else{
        return $db_id;
      }
    }else{
      return $db_id;
    }
  }

  /*
  *パスワード変更
  */
  public function updateStylistPassword($inputs){
    $cond_id = ['hairstylist_id' => $inputs['stylist_id']];
    $pass = $inputs['password'];
    HairStylist::where($cond_id)->update([
      'hairstylist_pass'=>Hash::make($pass),
    ]);
  }

}//クラス
