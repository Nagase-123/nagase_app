/*削除確認*/
function alert_js(){
  var result=false;
  result = window.confirm('本当に削除しますか？');
  if(result){
    return true;
  }else{
    return false;
  }
}


/*チェックボックス*/
function isCheck() {
    let arr_checkBoxes = document.getElementsByClassName("check");
    let count = 0;
    for (let i = 0; i < arr_checkBoxes.length; i++) {
        if (arr_checkBoxes[i].checked) {
            count++;
        }
    }
    if (count > 0) {
        return true;
    } else {
        window.alert("1つ以上選択してください。");
        return false;
    };

}

/*郵便番号*/
$(function(){
  $('#search_button').click(function(){
    //リクエストパラメーター
    var param =
    {
      zipcode: $('#zip_code').val(),
      limit:1
    }
    $.ajax({
      type: "GET",
      chche: false,
      data: param,
      url: "https://zipcloud.ibsnet.co.jp/api/search",
      dataType: "jsonp",
      success: function(data){

        if(data.status == 200){
          //正常値
          var result_txt = '';
            if(data.results != null){
              $('#search_result').html('');
              result_txt +=
              data.results[0].address1 +
              data.results[0].address2 +
              data.results[0].address3 ;
            }else{
              $('#search_result').html('該当するデータがありません');
            }
            $('#address').val(result_txt);

        }else{
          //エラー処理
          var result_txt = '';
          $('#address').val(result_txt);
          $('#search_result').html(data.message);
        }
      }
    })
  });

});
