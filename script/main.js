$(function(){
    function rand(min,max){
        return parseInt(Math.random()*(max-min+1)+min);
    }
    

    $("#btn").on("click",function(){
      var score = rand(50,200);
      $.ajax({
        type:'get',
        data:{
            score:score,
            openid:openid,
            nickname:nickname,
            headimgurl:headimgurl
        },
        url:'handle.php',
        success:function(str){
            console.log(str);
        }
      });
    });
})