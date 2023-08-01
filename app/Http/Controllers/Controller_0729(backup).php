<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use App\Models\Hairstylist;
use App\Models\Schedule;
use App\Models\Reservation;

use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


  /*★★★★ここから★★★★*/

  /*
  *美容師 完了画面からGETでhomeに戻る時
  */
  public function stylist_home(Request $request){
    $stylist_id = $request->session()->get('stylist_id');

    $res = new Reservation();
    $reservations = $res->get_reservation($stylist_id);

    //セッションが存在する場合はログイン可能
    if($request->session()->get('mail') !== null){
      return view('stylist.stylist_home',[
        'stylist_id'=>$stylist_id,
        'reservations'=>$reservations,
      ]);
    }else{
      return view('login_logout.stylist_login',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *美容師　予約一覧
  */
  public function stylist_reservation_history(Request $request){
    if(isset($request['stylist_id'])){
      $stylist_id = $request['stylist_id'];
      $request->session()->put('stylist_id',$stylist_id);
    }else{
      //美容師idを取得
      $stylist_id = $request->session()->get('stylist_id');
    }
    $res = new Reservation();
    //美容師IDに紐づく予約を取得する
    $reservations = $res->get_reservation($stylist_id);
    //ページング用
    $sort  = $request->sort;

    //セッションが存在する場合はログイン可能
    if($request->session()->get('mail') !== null){
      return view('stylist.reservation_history',[
        'stylist_id'=>$request->session()->get('stylist_id'),
        'reservations'=>$reservations,
        'sort'=>$sort,
      ]);
    }else{
      return view('login_logout.stylist_login',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *美容師　プロフィール編集
  */
  public function profile_edit(Request $request){
    if(isset($request['stylist_id'])){
      $stylist_id = $request['stylist_id'];
    }else{
      $stylist_id = $request->session()->get('stylist_id');
    }

    $s = new Hairstylist();
    $stylists = $s->get_stylist($stylist_id);

    //セッションが存在する場合はログイン可能
    if($request->session()->get('mail') !== null){
      return view('stylist.profile_edit',[
        'stylist_id'=>$stylist_id,
        'stylists'=>$stylists,
      ]);
    }else{
      return view('login_logout.stylist_login',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *美容師　スケジュール追加
  */
  public function schedule_add(Request $request){

    //セッションが存在する場合はログイン可能
    if($request->session()->get('mail') !== null){
      return view('stylist.schedule_add',[
        'stylist_id'=>$request->session()->get('stylist_id'),
      ]);
    }else{
      return view('login_logout.stylist_login',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *美容師　ユーザーメモ編集
  */
  public function user_memo(Request $request){
    //フォームからの入力値を全て取得
    $inputs = $request->all();

    $users = User::where('user_id', $inputs['user'])->get();

    return view('stylist.user_memo',[
      'users'=>$users,
    ]);
  }

  /*
  *美容師　予約キャンセル（確認）
  */
  public function reservation_cancel(Request $request){
    $inputs = $request->all();
    $reservations = Reservation::where('reservation_id', $inputs['res_id'])->where('user_id', $inputs['user_id'])->get();
    return view('stylist.reservation_cancel',[
      'reservations'=>$reservations,
    ]);
  }

  /*
  *美容師　スケジュール一覧
  */
  public function schedule_list(Request $request){
    $inputs = $request->all();
    //管理者フラグかどうか判定用
    $flg = $request->session()->get('result');
    $stylist_id="";

    //管理者
    if($flg == 10){
      if(isset($inputs['stylist_id'])){
        $stylist_id = $inputs['stylist_id'];
        $request->session()->put('stylist_id',$stylist_id);
      }else{
        //ページング時
        $stylist_id = $request->session()->get('stylist_id');
      }
      //stylist
    }else{
      $stylist_id = $request->session()->get('stylist_id');
    }

    $schedule = new Schedule();
    $results = $schedule->get_schedule($stylist_id);
    //ページング用
    $sort  = $request->sort;

    //セッションが存在する場合はログイン可能
    if($request->session()->get('mail') !== null){
      return view('stylist.schedule_list',[
        'results'=>$results,
        'stylist_id'=>$stylist_id,
        'sort'=>$sort,
      ]);
    }else{
      return view('login_logout.stylist_login',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *美容師　comp一括管理　コンプ管理
  */
  public function stylist_comp(Request $request){

    $inputs = $request->all();
    $kinds = $inputs['comp_kinds'];
    //管理者フラグかどうか判定用
    $flg = $request->session()->get('result');

    $comp_title="";
    $comp_msg1="";
    $comp_msg2="";
    $url="";
    $link_name="";
    $test="";
    $anser="";

    $reservation = new Reservation();
    $schedule = new Schedule();
    $stylist = new Hairstylist();

    switch($kinds){
      /*
      *美容師　プロフィール編集完了
      */
      case 'profile_edit_comp':
      $request->validate([
        '名前'=>'required|max:10',
        'フリガナ'=>'required|max:10|regex:/^[ァ-ヶー]+$/u',
        '電話番号'=>'nullable|digits_between:8,11',
        'メール'=>'required|email',
        '住所'=>'required|max:50',
        '得意スタイル'=>'required|max:90',
        '自己紹介'=>'required|max:300',
      ]);
      $stylist->update_stylist_profile($inputs);
      $comp_title = "プロフィール編集完了";
      $comp_msg1=" プロフィール編集が完了しました";
      $url = "/stylist/profile_edit";
      $link_name = "プロフィールへ";
      $stylist_id = $inputs['stylist_id'];
      break;

      /*
      *美容師　予約キャンセル完了
      */
      case 'reservation_cancel_comp';
      $reservation->update_cancel_memo($inputs);
      //予約IDに紐づく情報を取得
      $anser = $reservation->get_res($inputs);
      //上記情報をスケジュールに渡す
      $test = $schedule->cancel_schedule_res($anser);
      $comp_title = "予約キャンセル完了";
      $comp_msg1=" 予約キャンセルが完了しました";
      break;

      /*
      *美容師　スケジュール登録完了
      */
      case 'schedule_comp';
      $request->validate([
        'date_add'=>'required|date|after:today',
      ]);

      $anser = $schedule->check_schedule($inputs);
      if($anser == 'true'){
        $schedule->update_schedule($inputs);
      }else if($anser == 'false'){
        $schedule->insert_schedule($inputs);
      }else{
        $anser ='trueでもfalseでもない';
      }
      $comp_title = "スケジュール登録完了";
      $comp_msg1="スケジュール登録が完了しました";
      $url = "/stylist/schedule_add";
      $link_name = "スケジュール登録へ";
      break;

      /*
      *美容師　スケジュール削除
      */
      case 'schedule_delete_comp';
      $request->validate([
        '予約日'=>'required',
        '予約時間'=>'required',
      ]);
      $anser = $schedule->delete_schedule($inputs);

      if($anser == 'true'){
        $comp_title = "スケジュール削除完了";
        $comp_msg1 = "スケジュールの削除が完了しました";
      }else{
        $comp_title = "スケジュール削除失敗";
        $comp_msg1 = "スケジュールの削除に失敗しました。";
        $comp_msg2 = "※予約が入っている場合はキャンセル後にスケジュール削除して下さい。";
      }
      $url = "/stylist/schedule_list";
      $link_name = "スケジュール一覧へ";
      $stylist_id = $inputs['stylist'];
      break;

      /*
      *美容師　ユーザーメモ　編集完了
      */
      case 'user_memo_comp':
      //user_idが一緒かを確かめた上でメモをupdateする
      $user = new User();
      $user->update_memo($inputs);
      $stylist_id = $request->session()->get('stylist_id');
      $comp_title ="顧客メモ更新完了";
      $comp_msg1 = "顧客メモの更新が完了しました";
      $url = "/stylist/reservation_history";
      $link_name = "予約履歴一覧へ";

      break;
    }
    //管理者
    if($flg == 10){
      return view('admin.admin_comp',[
        'inputs'=>$inputs,
        'comp_title'=>$comp_title,
        'comp_msg1'=>$comp_msg1,
        'comp_msg2'=>$comp_msg2,
        'url'=>$url,
        'link_name'=>$link_name,
        'test'=>$test,
        'anser'=>$anser,
        'stylist_id'=>$stylist_id,
      ]);
    }else{
      return view('stylist.stylist_comp',[
        'inputs'=>$inputs,
        'comp_title'=>$comp_title,
        'comp_msg1'=>$comp_msg1,
        'comp_msg2'=>$comp_msg2,
        'url'=>$url,
        'link_name'=>$link_name,
        'test'=>$test,
        'anser'=>$anser,
      ]);
    }
  }
  /*★★★★美容師ここまで★★★★*/

  /*★★★★管理者ここから★★★★*/

  /*
  *管理者　ホーム画面
  */
  public function admin_home(Request $request){
    $result = $request->session()->get('result');
    $res = new Reservation();
    //未来の予約を全て取得する
    $reservations = $res->get_future_reservation_all();

    //セッションが存在する場合はログイン可能
    if($request->session()->get('mail') !== null){
      return view('admin.admin_home',[
        'result'=>$result,
        'reservations'=>$reservations,
      ]);
    }else{
      return view('login_logout.login',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }

  /*
  *管理者　完了画面　コンプ
  */
  public function admin_comp(Request $request){
    $results = $request->all();
    $kinds = $results['comp_kinds'];
    $data = [ ];
    $contact = new Contact();
    $stylist = new Hairstylist();
    $reservation = new Reservation();
    $schedule = new Schedule();
    $user = new User();

    /*admin_comp画面関係*/
    $comp_title="";
    $comp_msg1="";
    $comp_msg2="";
    $url="";
    $link_name="";

    switch($kinds){
      /*
      *管理者　お問い合わせ　返信完了
      */
      case 'reply_comp':
      /* herokuでの処理
      $pax_name = $results['name']."様";
      require base_path('vendor/autoload.php');
      $email = new \SendGrid\Mail\Mail();
      $email->setFrom("nagase3@hotmail.com", "chouette運営事務局");
      $email->setSubject("お問い合わせの件について");
      $email->addTo($results['mail'], $pax_name);
      $email->addContent("text/plain",$results['textarea_box']);
      $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));

      $response = $sendgrid->send($email);
      */
      /*↓本来の処理*/
      /*  Mail::send('emails.contact_mailsend', $data, function($message)use($results){
      $text = $results['textarea_box'];
      session()->put('text',$text);
      $mail = $results['mail'];
      $message->to($mail, 'Test')
      ->from('XXXXX@XXXXX.co.jp','Reffect')
      ->subject('お問い合わせの件について');
    });*/
    /*↑ここまでが本来のメール処理　herokuではこの上の部分はコメントアウト*/

    //メール送信が完了したらフラグを変える
    $contact->update_flg($results['contact_id']);
    $comp_title = "返信完了";
    $comp_msg1 = "お問合せへの返信が完了しました";
    $url="/admin/contact_list";
    $link_name="お問合せ一覧";
    break;

    /*
    *美容師会員登録完了
    */
    case 'stylist_signup_comp':
    $stylist->insert_stylist($results);
    $comp_title = "会員登録完了";
    $comp_msg1 = "美容師新規会員登録が完了しました。";
    $comp_msg2 = "パスワードをリセットしてログインいただくようお伝えください。";
    $url="/login_logout/stylist_login";
    $link_name="美容師ログイン";
    break;

    /*
    *管理者　予約キャンセル(reservation_detailから)
    */
    case 'reservation_cancel_comp_admin':
    $reservation->cancel_reservation_admin($results);
    //予約IDに紐づく予約情報を取得
    $anser = $reservation->get_res($results);
    //上記情報をスケジュールに渡す
    $result = $schedule->cancel_schedule_res($anser);
    $comp_title = "予約キャンセル完了";
    $comp_msg1 = "予約キャンセルが完了しました。";
    break;

    /*
    *美容師会員削除　管理者
    */
    case 'stylist_delete_comp':
    $stylist_id = $results['stylist_id'];
    $stylist->delete_stylist($stylist_id);
    $comp_title = "会員削除完了";
    $comp_msg1 = "美容師会員の削除が完了しました。";
    $url="/admin/stylist_list";
    $link_name="美容師一覧";
    break;

    /*
    *ユーザー会員削除　管理者
    */
    case 'member_delete_comp':
    $user_id = $results['user_id'];
    //生きている予約がある場合は$user_reservationに代入
    $user_reservation = $reservation->check_reservation($user_id);

    if($user_reservation->isEmpty()){
      $user->delete_user($user_id);
      $comp_title = '会員削除完了';
      $comp_msg1 = 'ユーザー会員の削除が完了しました。';
    }else{
      $comp_title = '会員削除失敗';
      $comp_msg1 = '会員削除に失敗しました。';
      $comp_msg2 = '予約がある場合は予約をキャンセルする必要があります。';
    }
    $url="/admin/member_list";
    $link_name="会員一覧";
    break;
  }//switch

  return view('admin.admin_comp',[
    'results'=>$results,
    'comp_title'=>$comp_title,
    'comp_msg1'=>$comp_msg1,
    'comp_msg2'=>$comp_msg2,
    'url'=>$url,
    'link_name'=>$link_name,
  ]);
}

/*
*管理者　予約詳細（ユーザー・美容師・予約詳細全て見られる）
*/
public function reservation_detail(Request $request){
  $res = new Reservation();
  //予約IDに紐づく予約情報を取得
  $reservations = $res->get_res($request);
  $users;
  $stylists;

  foreach($reservations as $reservation){
    //予約に紐づく会員情報を取得
    $u = new User();
    $id = $reservation->user_id;
    $users = $u->get_user($id);

    //予約に紐づく美容師情報を取得
    $stylist_id = $reservation->hairstylist_id;
    $s = new Hairstylist();
    $stylists = $s->get_stylist($stylist_id);
  }

  if($request->session()->get('mail') !== null){
    return view('admin.reservation_detail',[
      'reservations'=>$reservations,
      'users'=>$users,
      'stylists'=>$stylists,
    ]);
  }else{
    return view('login_logout.login',[
      'msg'=>'再度ログインしてください',
    ]);
  }
}

/*
*管理者　美容師一覧
*/
public function stylist_list(Request $request){
  //フラグ＝1　登録中　フラグ＝2　論理削除
  $cond = ['hairstylist_flg' => '1'];

  //登録中の美容師情報を全て取得する
  $stylists = Hairstylist::where($cond)->SimplePaginate(5);

  //ページング用
  $sort  = $request->sort;

  //セッションがあればログイン可能
  if($request->session()->get('mail') !== null){
    return view('admin.stylist_list',[
      'stylists'=>$stylists,
      'sort'=>$sort,
    ]);
  }else{
    return view('login_logout.login',[
      'msg'=>'再度ログインしてください',
    ]);
  }
}

/*
*管理者　スケジュール一覧
*/
public function schedule_list_admin(Request $request){
  $stylist_id = $request['stylist_id'];
  $request->session()->put('stylist_id',$stylist_id);
  $schedule = new Schedule();
  $results = $schedule->get_schedule($stylist_id);

  //ページング用
  $sort  = $request->sort;

  return view('admin.schedule_list_admin',[
    'stylist_id'=>$stylist_id,
    'results'=>$results,
    'sort'=>$sort,
  ]);
}

/*
*管理者　ユーザー　一覧
*/
public function member_list(Request $request){
  //登録中の会員のみ
  $cond = ['user_flg' => '0'];

  $users = User::where($cond)->SimplePaginate(5);

  //ページング用
  $sort  = $request->sort;

  //セッションがあればログイン可能
  if($request->session()->get('mail') !== null){
    return view('admin.member_list',[
      'users'=>$users,
      'sort'=>$sort,
    ]);
  }else{
    return view('login_logout.login',[
      'msg'=>'再度ログインしてください',
    ]);
  }
}

/*
*管理者　ユーザー　プロフィール編集
*/
public function user_profile_edit_admin(Request $request){
  $u_id = $request['user_id'];
  $users = new User();
  $results = $users->get_user($u_id);
  //セッションがあればログイン可能
  if($request->session()->get('mail') !== null){
    return view('admin.user_profile_edit_admin',[
      'results'=>$results,
    ]);
  }else{
    return view('login_logout.login',[
      'msg'=>'再度ログインしてください',
    ]);
  }
}

/*
*管理者　お問い合わせ一覧
*/
public function contact_list(Request $request){
  //ページング用
  $sort  = $request->sort;

  $contacts = Contact::orderBy('created_at','desc')->SimplePaginate(5);
  return view('admin.contact_list',[
    'contacts'=>$contacts,
    'sort'=>$sort,
  ]);
}

/*
*管理者　お問い合わせ　詳細
*/
public function contact_detail(Request $request){
  $contact = new Contact();
  $results = $contact->get_contact($request);
  return view('admin.contact_detail',[
    'results'=>$results,
  ]);
}

/*
*管理者　お問い合わせ　返信内容確認
*/
public function reply_confirm(Request $request){
  $results = $request->all();
  return view('admin.reply_confirm',[
    'results'=>$results,
  ]);
}

/*
*管理者　お問い合わせ　返信完了
*/
public function reply_comp(Request $request){
  $results = $request->all();
  $data = [ ];
  /*↓herokuで利用する*/
  /*    $pax_name = $results['name']."様";
  require base_path('vendor/autoload.php');
  $email = new \SendGrid\Mail\Mail();
  $email->setFrom("nagase3@hotmail.com", "chouette運営事務局");
  $email->setSubject("お問い合わせの件について");
  $email->addTo($results['mail'], $pax_name);
  $email->addContent("text/plain",$results['textarea_box']);
  $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
  $response = $sendgrid->send($email);
  */

  /*↓本来の処理
  Mail::send('emails.contact_mailsend', $data, function($message)use($results){
  $text = $results['textarea_box'];
  session()->put('text',$text);
  $mail = $results['mail'];
  $message->to($mail, 'Test')
  ->from('XXXXX@XXXXX.co.jp','Reffect')
  ->subject('お問い合わせの件について');
});
*/
$contact = new Contact();
//メール送信が完了したらフラグを変える
$contact->update_flg($results['contact_id']);

return view('admin.reply_comp',[
  'results'=>$results,
]);
}

/*★★★★管理者ここまで★★★★*/

/*★★★★トップ　ここから★★★★*/

/*
*トップ　ユーザー 新規会員登録　確認
*/
public function signup_confirm(Request $request){
  //バリデーション
  $request->validate([
    '名前'=>'required|max:10',
    'フリガナ'=>'required|max:10|regex:/^[ァ-ヶー]+$/u',
    '電話番号'=>'nullable|numeric|digits_between:8,11',
    'メール'=>'required|email',
    '住所'=>'required|max:50',
    'password'=>'confirmed:password,required|min:10|max:20',
  ]);

  //フォームからの入力値を全て取得
  $inputs = $request->all();
  $users = new User();
  $mail = $inputs['メール'];
  //会員登録があればuserにはIDが入る
  $user = $users->get_user_id($mail);
  $anser;
  //anserがtrueなら新規会員登録できる
  if($user->isEmpty()){
    $anser = true;
  }else{
    //userに値が入っている場合は会員登録あり
    $anser = false;
  }

  //確認ページに表示
  //入力値を引数に渡す
  return view('top.signup_confirm',[
    'inputs'=>$inputs,
    'anser'=>$anser,
    'user'=>$user,
    'mail'=>$mail,
  ]);
}

/*
*トップ　美容師 新規会員登録　確認
*/
public function stylist_signup_confirm(Request $request){
  //バリデーション
  $request->validate([
    '名前'=>'required|max:10',
    'フリガナ'=>'required|max:10|regex:/^[ァ-ヶー]+$/u',
    '電話番号'=>'nullable|digits_between:8,11',
    'メール'=>'required|email',
    '住所'=>'required|max:50',
    'password'=>'confirmed:password,required|min:10|max:20',
    '得意スタイル'=>'required|max:90',
    '自己紹介'=>'required|max:300',
  ]);
  //フォームからの入力値を全て取得
  $inputs = $request->all();

  $stylists = new Hairstylist();
  $mail = $inputs['メール'];
  //会員登録があればstylistには美容師のデータが入る
  $stylist = $stylists->get_stylist_id($mail);
  $anser;
  //anserがtrueなら新規会員登録できる
  if($stylist->isEmpty()){
    $anser = true;
  }else{
    //stylistに値が入っている場合は会員登録あり
    $anser = false;
  }

  //確認ページに表示
  //入力値を引数に渡す
  return view('top.stylist_signup_confirm',[
    'inputs'=>$inputs,
    'anser'=>$anser,
    'stylist'=>$stylist,
    'mail'=>$mail,
  ]);
}

/*
*　トップ 美容師会員登録完了　
*/
public function stylist_signup_comp(Request $request){
  $inputs = $request->all();
  $stylist = new Hairstylist();
  $stylist->insert_stylist($inputs);

  return view('top.stylist_signup_comp',[
    'inputs'=>$inputs,
  ]);
}

/*
*　トップ 　ユーザー新規会員登録完了　
*/
public function signup_comp(Request $request){
  $inputs = $request->all();
  $user = new User();
  $anser;
  $heading;
  //メールアドレスの登録有無を調べる
  $id = $user->get_user_id($inputs['mail']);
  if($id->isNotEmpty()){
    $anser = '既に会員登録があります';
  }else{
    $user->insert($inputs);

    $anser = '会員登録が完了しました';
  }

  return view('top.signup_comp',[
    'inputs'=>$inputs,
    'anser'=>$anser,
  ]);

}

/*
*トップ　ユーザー新規会員登録
*/
public function signup(){
  return view('top.signup');
}

/*★★★★トップ　ここまで★★★★*/

/*★★★★ログイン関連　ここから★★★★*/

/*
*　ログイン関連 美容師新規会員登録　
*/
public function stylist_signup(Request $request){

  //セッションがあればログイン可能
  if($request->session()->get('mail') !== null){
    return view('top.stylist_signup');
  }else{
    return view('login_logout.login',[
      'msg'=>'再度ログインしてください',
    ]);
  }
}

/*
*　ログイン関連 ユーザーログイン　
*/
public function login_confirm(Request $request){
  $request->validate([
    'mail'=>'required',
    'pass'=>'required',
  ]);

  //DBに存在するかを確認する必要があり
  $mail = $request['mail'];
  $pass = $request['pass'];

  $user = new User();
  //resultには会員フラグが格納されている
  $result = $user->check_users($mail,$pass);

  //メールアドレスをセッションに入れる
  $request->session()->put('mail',$mail);

  //DBに会員が存在するか確かめたうえで、
  //flgが0ならユーザーホーム画面へ
  if($result == 0){
    $inputs = Schedule::orderBy('schedule_date','asc')->get();

    $cond = ['hairstylist_flg' => '1'];
    $stylists = Hairstylist::where($cond)->get();

    $users = $user->get_user_id($mail);
    foreach($users as $user){
      $u_id = $user->user_id;
      $request->session()->put('u_id',$u_id);
    }
    //セッションがあればログイン可能
    if($request->session()->get('mail') !== null){
      $request->session()->put('result',$result);

      return view('user.user_home',[
        'u_id'=>$request->session()->get('u_id'),
        'stylists'=>$stylists,
      ]);
    }else{
      return view('login_logout.login',[
        'msg'=>'再度ログインして下さい',
      ]);
    }

    //管理者情報でログインされた場合
  }else if($result == 10){
    $request->session()->put('result',$result);
    $res = new Reservation();
    //未来の予約を全て取得する
    $reservations = $res->get_future_reservation_all();
    //セッションがあればログイン可能
    if($request->session()->get('mail') !== null){
      return view('admin.admin_home',[
        'result'=>$result,
        'reservations'=>$reservations,
      ]);
    }else{
      return view('login_logout.login',[
        'msg'=>'再度ログインして下さい',
      ]);
    }

  }else{
    return view('login_logout.login',[
      'msg'=>'メールアドレスかパスワードが正しくありません',
    ]);
  }

}

/*
*　ログイン関連 パスワード再設定　
*/
public function pass_reset_confirm(Request $request){
  //urlの値を取得
  $token_url = $request['token'];
  $token = session()->get('token');
  $user_id = session()->get('user_id');
  $stylist_id = session()->get('stylist_id');
  $anser;
  $result;

  if($token_url == $token){
    $anser = '新しいパスワードを入力してください';
    $result = true;
  }else{
    $anser = '有効期限が切れています';
    $result = false;
  }

  return view('login_logout.pass_reset_confirm',[
    'anser'=>$anser,
    'result' => $result,
    'user_id'=>$user_id,
    'stylist_id'=>$stylist_id,
  ]);
}

/*
*　ログイン関連 パスワード再設定完了　
*/
public function pass_reset_comp(Request $request){
  //バリデーション
  $request->validate([
    'password'=>'confirmed:password,required|min:10|max:20',
  ]);

  $inputs = $request->all();
  $user_id = session()->get('user_id');
  $stylist_id = session()->get('stylist_id');

  if(isset($user_id)){
    $user = new User();
    $user->update_password($inputs);
    return view('login_logout.pass_reset_comp');

  }else if(isset($stylist_id)){
    $stylist = new Hairstylist();
    $stylist->update_password($inputs);
    return view('login_logout.pass_reset_comp');
  }
}

/*
*　ログイン関連 美容師ログイン（情報一致すればホーム画面へ）
*/
public function stylist_login_confirm(Request $request){
  $request->validate([
    'mail'=>'required',
    'pass'=>'required',
  ]);

  //DBに存在するかを確認する必要があり
  $mail = $request['mail'];
  $pass = $request['pass'];

  $request->session()->put('mail',$mail);

  $stylist = new Hairstylist();
  $res = new Reservation();
  $result = $stylist->check_stylist($mail,$pass);

  if($result == 1){
    $sid =$stylist->get_stylist_id($mail);
    $stylist_id;
    foreach($sid as $id){
      $stylist_id = $id->hairstylist_id;
    }
    //美容師IDに紐づく予約を取得
    $reservations = $res->get_reservation($stylist_id);
    $request->session()->put('stylist_id',$stylist_id);

    //ページング用
    $sort  = $request->sort;

    //セッションが存在する場合はログイン可能
    if($request->session()->get('mail') !== null){
      return view('stylist.stylist_home',[
        'stylist_id'=>$request->session()->get('stylist_id'),
        //  'sid'=>$sid,
        'reservations'=>$reservations,
      ]);
    }else{
      return view('login_logout.stylist_login',[
        'msg'=>'再度ログインしてください',
      ]);
    }
  }else{
    return view('login_logout.stylist_login',[
      'msg'=>'メールアドレスかパスワードが正しくありません',
    ]);
  }
}

/*
*ログイン関連　ログアウト完了
*/
public function logout_comp(Request $request){
  $request->session()->flush();
  return view('login_logout.logout_comp');
}


/*★★★★ログインログアウトここまで★★★★*/

/*★★★★コンタクト　ここから★★★★*/

/*
*コンタクト　お問い合わせ確認
*/
public function confirm(Request $request){

  $request->validate([
    '名前'=>'required|max:10',
    'フリガナ'=>'required|max:10|regex:/^[ァ-ヶー]+$/u',
    '電話番号'=>'nullable|digits_between:8,11',
    'メール'=>'required|email',
    '本文'=>'required',
  ]);
  return view('contact.confirm',[
    'request'=>$request,
  ]);
}

/*
*コンタクト　お問い合わせ完了
*/
public function complete(Request $request){
  $contact = new Contact();
  $contact->insert_contact($request);
  return view('contact.complete');
}

/*★★★★コンタクト　ここまで★★★★*/

/*★★★★ユーザー　ここから★★★★*/

/*
*ユーザー　ホーム画面　完了画面等からGETされた場合
*/
public function user_home(Request $request){
  $stylists = Hairstylist::all();

  //セッションが存在する場合はログイン可能
  if($request->session()->get('mail') !== null){
    return view('user.user_home',[
      'u_id'=>$request->session()->get('u_id'),
      'stylists'=>$stylists,
    ]);
  }else{
    return view('login_logout.login',[
      'msg'=>'再度ログインしてください',
    ]);
  }
}

/*
*ユーザー　予約画面
*/
public function reservation(Request $request){
  $results = $request->all();
  $user_id = session()->get('u_id');
  $stylist_id;

  if(isset($results['stylist'])){
    $stylist_id = $results['stylist'];
    session()->put('stylist_id',$stylist_id);
  }else{
    $stylist_id = session()->get('stylist_id');
  }

  $s = new Hairstylist();

  //idに紐づく美容師情報を代入
  $stylists = $s->get_stylist($stylist_id);

  //現在の年月日
  $now = date("Y-m-d");

  //現在の年月日よりも後の日付のみ取得
  $inputs = Schedule::orderBy('schedule_date','asc')->where('hairstylist_id', '=', $stylist_id)->where('schedule_date', '>=', $now)->SimplePaginate(5);

  //ページング用
  $sort  = $request->sort;

  return view('user.reservation',[
    'inputs'=>$inputs,
    'stylists'=>$stylists,
    'stylist_id'=>$stylist_id,
    'user_id'=>$user_id,
    'sort'=>$sort,
  ]);
}

/*
*ユーザー　予約確認
*/
public function reservation_confirm(Request $request){

  //スケジュールに空きがない場合は送信できないようにする
  $request->validate([
    '予約日'=>'required',
    '予約時間'=>'required',
    'メッセージ'=>'max:500',
  ]);

  //フォームからの入力値を全て取得
  $inputs = $request->all();
  $schedule = new Schedule();

  //予約登録をする前にスケジュールに空きがあるかチェックをする
  $anser = $schedule->test_schedule($inputs);
  $stylists = Hairstylist::all();
  return view('user.reservation_confirm',[
    'anser'=>$anser,
    'inputs'=>$inputs,
    'stylists'=>$stylists,
  ]);
}

/*
*ユーザー　予約履歴一覧
*/
public function reservation_history(Request $request){
  if(isset($request['u_id'])){
    //admin側
    $u_id = $request['u_id'];
    $request->session()->put('u_id',$u_id);
  }else{
    //user側
    $u_id = $request->session()->get('u_id');
  }

  //ユーザーIDに紐づく予約情報を取得
  $reservation = new Reservation();
  $results = $reservation->get_reservation_list($u_id);

  //美容師情報を取得
  $stylists = Hairstylist::all();

  //ページング用
  $sort  = $request->sort;

  //セッションがあればログイン可能
  if($request->session()->get('mail') !== null){
    return view('user.reservation_history',[
      'u_id'=>$u_id,
      'results'=>$results,
      'stylists'=>$stylists,
      'sort'=>$sort,
    ]);
  }else{
    return view('login_logout.login',[
      'msg'=>'再度ログインして下さい',
    ]);
  }
}

/*
*ユーザー　コメント変更
*/
public function comment_change(Request $request){
  //予約ＩＤ取得
  $inputs = $request->all();
  $u_id = $inputs['u_id'];
  $reservation = new reservation();
  //予約IDに紐づくユーザー情報を取得
  $results = $reservation->get_res($inputs);
  return view('user.comment_change',[
    'results'=>$results,
    'u_id'=>$u_id,
  ]);
}

/*
*ユーザー　comp一括管理　コンプ管理
*/
public function user_comp(Request $request){

  //セッションがあればログイン可能
  if($request->session()->get('mail') == null){
    return view('login_logout.login',[
      'msg'=>'再度ログインして下さい',
    ]);
  }

  $inputs = $request->all();
  $kinds = $inputs['comp_kinds'];
  //管理者フラグかどうか判定用（$flg=10で管理者）
  $flg = $request->session()->get('result');

  $comp_title="";
  $comp_msg1="";
  $comp_msg2="";
  $url="";
  $link_name="";

  $reservation = new Reservation();
  $schedule = new Schedule();
  $users = new User();

  switch($kinds){
    /*
    *ユーザー　コメント変更完了
    */
    case 'comment_change_comp' :
    $reservation->update_comment($inputs);
    $u_id = $inputs['u_id'];
    $comp_title = 'コメント変更完了';
    $comp_msg1 = 'コメント変更が完了しました';
    $comp_msg2 = '予約詳細は予約履歴からご確認ください';
    $url ="/user/reservation_history";
    $link_name = "予約履歴一覧";
    break;

    /*
    *ユーザー　予約完了
    */
    case 'reservation_comp':
    $u_id = $inputs['user_id'];
    $request->session()->put('u_id',$u_id);

    //予約登録をする前にスケジュールに空きがあるかチェックをする
    $anser = $schedule->test_schedule($inputs);
    //予約完了時
    if($anser == 'true'){
      $result = $reservation->insert_reservation($inputs);
      $s = $schedule->change_schedule_reserved($inputs);
      $comp_title = '予約完了';
      $comp_msg1 = 'ご予約が完了しました。';
      $comp_msg2 = '予約詳細は予約履歴からご確認ください';
    }else{
      //スケジュールに空きがない場合
      $comp_title ="※ご予約が完了できませんでした。";
      $comp_msg1 ="日時をご確認の上、再度ご予約下さい。";
    }
    $url ="/user/reservation_history";
    $link_name = "予約履歴一覧";
    break;

    /*
    *ユーザー 予約キャンセル完了
    */
    case 'reservation_cancel_comp':
    $reservation->cancel_reservation_user($inputs);
    //予約IDに紐づく予約情報を取得
    $anser = $reservation->get_res($inputs);
    //上記情報をスケジュールに渡す
    $result = $schedule->cancel_schedule_res($anser);
    $comp_title = 'キャンセル完了';
    $comp_msg1 = 'キャンセルが完了しました';
    $url ="/user/reservation_history";
    $link_name = "予約履歴一覧";
    $u_id = $inputs['u_id'];
    break;

    /*
    *ユーザー 会員情報編集完了
    */
    case 'user_profile_edit_comp';
    $request->validate([
      '名前'=>'required|max:10',
      'フリガナ'=>'required|max:10|regex:/^[ァ-ヶー]+$/u',
      '電話番号'=>'nullable|digits_between:8,11',
      'メール'=>'required|email',
      '住所'=>'required|max:50',
    ]);
    //会員情報変更
    $users->update_user_profile($inputs);
    $comp_title = '会員情報変更完了';
    $comp_msg1 = '会員情報の変更が完了しました';
    $url ="/user/user_profile_edit";
    $link_name = "会員情報へ";
    $u_id = $inputs['user_id'];
    break;
  }//switch

  if($flg == 10){
    //管理者
    return view('admin.admin_comp',[
      'comp_title'=>$comp_title,
      'comp_msg1'=>$comp_msg1,
      'comp_msg2'=>$comp_msg2,
      'url'=>$url,
      'link_name'=>$link_name,
      'u_id'=>$u_id,
    ]);
  }else{
    //ユーザー
    return view('user.user_comp',[
      'comp_title'=>$comp_title,
      'comp_msg1'=>$comp_msg1,
      'comp_msg2'=>$comp_msg2,
      'url'=>$url,
      'link_name'=>$link_name,
    ]);
  }
}

/*
*ユーザー　プロフィール編集
*/
public function user_profile_edit(Request $request){
  if(isset($request['u_id'])){
    //admin側
    $u_id = $request['u_id'];
  }else{
    //user側
    $u_id = $request->session()->get('u_id');
  }
  $users = new User();
  $results = $users->get_user($u_id);

  //セッションがあればログイン可能
  if($request->session()->get('mail') !== null){
    return view('user.user_profile_edit',[
      'u_id'=>$u_id,
      'results'=>$results,
    ]);
  }else{
    return view('login_logout.login',[
      'msg'=>'再度ログインして下さい',
    ]);
  }
}

/*★★★★ユーザー　ここまで★★★★*/
}//クラス
