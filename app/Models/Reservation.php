<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Reservation extends Model
{
  use HasFactory;


  /*
  *予約登録
  */
  public function registerReservation($inputs){
    $res = new Reservation;
    $fee = 5000;

    $res->reservation_date = $inputs['予約日'];
    $res->reservation_time = $inputs['予約時間'];
    $res->user_id = $inputs['user_id'];
    $res->hairstylist_id = $inputs['stylist'];

    if(isset($inputs['request1'])){
      $res->reservation_request1 = $inputs['request1'];
    }else{
      $res->reservation_request1 = 'なし';
    }

    if(isset($inputs['request2'])){
      $res->reservation_request2 = $inputs['request2'];
    }else{
      $res->reservation_request2 = 'なし';
    }

    if(isset($inputs['request3'])){
      $res->reservation_request3 = $inputs['request3'];
      $fee = $fee + 3000;
      $res->reservation_fee = $fee;
    }else{
      $res->reservation_request3 = 'なし';
    }

    if(isset($inputs['request4'])){
      $res->reservation_request4 = $inputs['request4'];
      $fee = $fee+1000;
      $res->reservation_fee = $fee;
    }else{
      $res->reservation_request4 = 'なし';
    }

    if(isset($inputs['request5'])){
      $res->reservation_request5 = $inputs['request5'];
      $fee = $fee+1000;
      $res->reservation_fee = $fee;
    }else{
      $res->reservation_request5 = 'なし';
    }

    if(isset($inputs['msg'])){
      $res->reservation_comment = $inputs['msg'];
    }else{
      $res->reservation_comment = 'なし';
    }

    $res->save();
  }

  /*
  *美容師毎の予約を取得する
  */
  public function getReservationEveryStylist($stylist_id){
    $cond_id = ['hairstylist_id' => $stylist_id];
    $flg_check = ['reservation_flg' => 0];
    $reservation = Reservation::orderBy('reservation_date','desc')->orderBy('reservation_time','desc')->where($cond_id)->where($flg_check)->SimplePaginate(5);
    return $reservation;
  }

  /*
  *キャンセルされたら　キャンセル理由を更新
  */
  public function cancelReservation($inputs){
    $cond_id = ['reservation_id' => $inputs['res_id']];
    if($inputs['comp_kinds'] == 'reservation_cancel_user_comp'){
      //ユーザー
      $cancel_msg = 'ユーザー側からのキャンセル';
    }else{
      //管理者・美容師
      $cancel_msg = $inputs['cancel_msg'];
    }
    Reservation::where($cond_id)->update([
      'cancel_message'=>$cancel_msg,
      'reservation_flg'=>'1',
    ]);
  }

  /*
  *予約IDに紐づく情報を取得
  */
  public function getReservationEveryResid($inputs){
    $anser = Reservation::where('reservation_id',$inputs['res_id'])->get();
    return $anser;
  }

  /*
  *ユーザーIDに紐づく予約情報を取得
  */
  public function getReservationEveryUser($input){
    $anser = Reservation::orderBy('reservation_date','desc')->orderBy('reservation_time','desc')->where('user_id',$input)->SimplePaginate(5);
    return $anser;
  }

  /*
  *コメント変更
  */
  public function changeComment($inputs){
    $cond_id = ['reservation_id' => $inputs['res_id']];
    $comment;
    if(isset($inputs['comment'])){
      $comment = $inputs['comment'];
    }else{
      $comment ='なし';
    }
    Reservation::where($cond_id)->update([
      'reservation_comment'=>$comment,
    ]);
  }

  /*
  *未来の予約情報を取得
  */
  public function getFutureReservation(){
    //日付が今日より古いものは取得しないようにする
    $today = date('Y-m-d');

    $reservations = Reservation::where('reservation_date','>',$today)->orderBy('reservation_date','desc')->orderBy('reservation_time','desc')->get();
    return $reservations;
  }

  /*
  *ユーザーIDに紐づく予約情報を取得（キャンセル除く）
  */
  public function getRegisteringReservation($input){
    $anser = Reservation::where('user_id',$input)->where('reservation_flg',0)->get();
    return $anser;
  }

  /*使わない*/
  /*美容師会員削除をされた場合、予約も全て強制キャンセルする*/
  public function reservationAllCancel($stylist_id){
    $cond_id = ['hairstylist_id' => $stylist_id];
    $today = date('Y-m-d'); //今日の日付を取得
    $cancel_msg = '会員削除の為キャンセル';

    Reservation::where('reservation_date','>',$today)->where($cond_id)->update([
      'cancel_message'=>$cancel_msg,
      'reservation_flg'=>'1',
    ]);
  }


}//クラス
