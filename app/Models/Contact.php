<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  use HasFactory;

  /*
  *問い合わせ内容をDBに追加
  */
  public function registerInquiry($request){

    $inputs = $request->all();
    $contact = new Contact();
    $tel = 'なし';
    if(isset($inputs['電話番号'])){
      $tel = $inputs['電話番号'];
    }

    $contact->user_name = $inputs['名前'];
    $contact->user_kana = $inputs['フリガナ'];
    $contact->user_mail = $inputs['メール'];
    $contact->user_tel = $tel;
    $contact->contact_text = $inputs['本文'];

    $contact->save();
  }

  /*
  *問い合わせ内容を取得
  */
  public function getInquiry($request){
    $cond_id = ['contact_id' => $request['contact_id']];
    $contact = Contact::orderBy('created_at','desc')->where($cond_id)->get();
    return $contact;
  }

  /*
  *返信完了後フラグの値を変更
  */
  public function changeInquiryFlag($id){
    $cond_id = ['contact_id' => $id];

    Contact::where($cond_id)->update([
      'contact_flg' =>'1',
    ]);
  }

}//クラス
