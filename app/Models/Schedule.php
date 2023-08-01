<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Schedule extends Model
{
  use HasFactory;


  /*
  *スケジュール登録
  */
  public function registerSchedule($inputs){

    $schedule = new Schedule();
    $schedule->schedule_date = $inputs['date_add'];
    $schedule->hairstylist_id = $inputs['stylist_id'];

    //時間のデフォルト値は0
    //時間が選択されたら1にする
    for($i = 6; $i <= 21; $i++){
      $time = 'time'.$i;
      $schedule_time = 'schedule_'.$i;
      if(isset($inputs[$time])){
        $schedule->$schedule_time = 1;
      }
    }
    $schedule->save();
  }

  /*
  *スケジュール登録　同じ日付があれば追加する
  */
  public function addSchedule($inputs){
    $cond = ['schedule_date' => $inputs['date_add']];
    $cond_id = ['hairstylist_id' => $inputs['stylist_id']];
    //schedule_flgが0になっていたら1にする
    $cond_flg = ['schedule_flg' => '0'];

    Schedule::where($cond_id)->where($cond)->where($cond_flg)->update([
      'schedule_flg' =>'1'
    ]);

    //0だった場合は1にする　すでに1または2の場合はそのまま
    for($i = 6; $i <= 21; $i++){
      $time = 'time'.$i;
      $schedule_time = 'schedule_'.$i;

      if(isset($inputs[$time])){
        Schedule::where($cond_id)->where($cond)->where($schedule_time,'=','0')->update([
          $schedule_time =>'1'
        ]);
      }
    }
  }

  /*
  *同じ日付・同じIDのデータが存在するかチェック
  */
  public function checkScheduleMatches($inputs){
    $cond = ['schedule_date' => $inputs['date_add']];
    $cond_id = ['hairstylist_id' => $inputs['stylist_id']];

    //DBに同じIDかつ同じ日付があれば取得
    $anser = Schedule::where($cond_id)->where($cond)->get();

    //DBに同じIDかつ同じ日付があればtrue
    if($anser->isNotEmpty()){
      return 'true';
    }else{
      return 'false';
    }
  }

  /*
  *予約が入ったらスケジュールの予約時間の値を2にする
  */
  public function changeScheduleToReserved($inputs){
    //inputs二つの値とDBの値が一致したらデータを2に変える
    $colum;

    switch ($inputs['予約時間']) {
      case '6:00':
      $colum = 'schedule_6';
      break;

      case '7:00':
      $colum = 'schedule_7';
      break;

      case '8:00':
      $colum = 'schedule_8';
      break;

      case '9:00':
      $colum = 'schedule_9';
      break;

      case '10:00':
      $colum = 'schedule_10';
      break;

      case '11:00':
      $colum = 'schedule_11';
      break;

      case '12:00':
      $colum = 'schedule_12';
      break;

      case '13:00':
      $colum = 'schedule_13';
      break;

      case '14:00':
      $colum = 'schedule_14';
      break;

      case '15:00':
      $colum = 'schedule_15';
      break;

      case '16:00':
      $colum = 'schedule_16';
      break;

      case '17:00':
      $colum = 'schedule_17';
      break;

      case '18:00':
      $colum = 'schedule_18';
      break;

      case '19:00':
      $colum = 'schedule_19';
      break;

      case '20:00':
      $colum = 'schedule_20';
      break;

      case '21:00':
      $colum = 'schedule_21';
      break;

      default:
      break;
    }
    //日付が一致するかつIDが一致するデータ
    $cond_id = ['hairstylist_id' => $inputs['stylist']];
    $cond = ['schedule_date' => $inputs['予約日']];
    Schedule::where($cond)->where($cond_id)->update([
      $colum=>'2'
    ]);
  }

  /*
  *予約登録前にスケジュールに空きがあるか確認
  */
  public function scheduleAvailabilityCheck($inputs){
    $anser = $inputs['予約日'];
    $cond_id = ['hairstylist_id' => $inputs['stylist']];
    $cond = ['schedule_date' => $inputs['予約日']];
    $cond_flg = ['schedule_flg' => '1'];

    $colum;
    for($i = 6; $i <= 21; $i++){
      $time = $i.':00';
      $schedule_time ='schedule_'.$i;

      switch ($inputs['予約時間']) {
        case $time:
        $colum = $schedule_time;
        break;
      }
    }
    //選択された日付の時間が1になっているかチェック＆flgが1かどうか
    $result = Schedule::where($cond_id)->where($cond)->where($cond_flg)->where($colum,'=','1')->get();
    if($result->isNotEmpty()){
      return 'true';
    }else{
      return 'false';
    }
  }

  /*
  *予約キャンセルされたら予約時間の数字を1に戻す（stylistの方からのキャンセル操作時）
  */
  public function cancelSchedule($inputs){
    //キャンセルボタンが押された予約IDに紐づく予約情報を取得
    $results = $inputs->all();
    $time;
    $cond_id;
    $cond;
    foreach($results as $result){
      //予約の時間
      $time = $result['reservation_time'];
      //Reservationの中の美容師idとScheduleの中の美容師idが一致するか
      $cond_id = ['hairstylist_id' => $result['hairstylist_id']];
      //予約日とスケジュールの日付が一致するか
      $cond = ['schedule_date' => $result['reservation_date']];
    }

    //スケジュール内でcondとcond_idが一致したら
    //時間を一つ一つ比べていき、一致する時間を１に戻す
    for($i = 6; $i <= 21; $i++){
      if($i <= 9){
        $time_case = '0'.$i.':00:00';
      }else{
        $time_case = $i.':00:00';
      }
      $schedule_time ='schedule_'.$i;

      if ($time == $time_case) {
        Schedule::where($cond_id)->where($cond)->update([
          $schedule_time =>'1'
        ]);
      }
    }
    return $results;
  }

  /*
  *現在登録中のスケジュールを取得する
  */
  public function getSchedule($stylist_id){
    $cond_id = ['hairstylist_id' => $stylist_id];
    $cond_flg = ['schedule_flg' => '1'];
    //現在の年月日
    $now = date("Y-m-d");

    $schedule = Schedule::orderBy('schedule_date','asc')->where($cond_flg)->where($cond_id)->where('schedule_date', '>=', $now)->SimplePaginate(5);
    return $schedule;
  }

  /*
  *スケジュール論理削除
  */
  public function removeScheduleLogical($inputs){
    //予約の時間
    $time = $inputs['予約時間'];
    //受け取った美容師idとScheduleの中の美容師idが一致するか
    $cond_id = ['hairstylist_id' => $inputs['stylist']];
    //受けった予約日とスケジュールの日付が一致するか
    $cond = ['schedule_date' => $inputs['予約日']];

    //0（登録なし）か2（予約あり）だとfalseになるので変更しない
    $anser = $this->scheduleAvailabilityCheck($inputs);

    //登録スケジュールの有無をカウントする用
    $count = 0;

    if($anser =='true'){

      for($i = 6; $i <= 21; $i++){
        $time_case = $i.':00';
        $schedule_time ='schedule_'.$i;
        //時間を一つ一つ比べていき、一致する時間を0に戻す
        if($time == $time_case) {
          Schedule::where($cond_id)->where($cond)->update([
            $schedule_time =>'0'
          ]);
        }
      }

      //該当の日付で登録スケジュールが一つでもあるか確認
      $values = Schedule::where($cond_id)->where($cond)->get();
      foreach($values as $value){
        for($i = 6; $i <= 21; $i++){
          $schedule_time = 'schedule_'.$i;
          if($value[$schedule_time] == '0'){
            $count++;
          }
        }
      }

      //登録スケジュールが1つもない日付は、flgを0にする
      if($count == 16){
        Schedule::where($cond_id)->where($cond)->update([
          'schedule_flg' =>'0'
        ]);
      }
      return $anser;
    }else{
      return $anser;
    }
  }

}//クラス
