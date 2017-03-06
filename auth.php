<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx1ba6b62b78195300", "f21154e19d411e436200445e4da7e5bc");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  <h1>这是用户授权页面，使用jssdk页面</h1>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  wx.config({
    debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      'onMenuShareTimeline',
      'onMenuShareAppMessage',
      'onMenuShareQQ',
      'onMenuShareWeibo',
      'onMenuShareQZone',
      'startRecord',
      'stopRecord',
      'onVoiceRecordEnd',
      'playVoice',
      'pauseVoice',
      'stopVoice',
      'onVoicePlayEnd',
      'uploadVoice',
      'downloadVoice',
      'chooseImage',
      'previewImage',
      'uploadImage',
      'downloadImage',
      'translateVoice',
      'getNetworkType',
      'openLocation',
      'getLocation',
      'hideOptionMenu',
      'showOptionMenu',
      'hideMenuItems',
      'showMenuItems'
    ]
  });
  wx.ready(function () {
    // 分享朋友圈
          wx.onMenuShareTimeline({
        title: '西红柿大战白菜', // 分享标题
        link: 'http://www.infojhc.cn/~201421010730088/', // 分享链接
        imgUrl: 'http://www.infojhc.cn/~201421010730088/images/baidu1.jpg', // 分享图标
        success: function () { 
            // 用户确认分享后执行的回调函数
            alert("分享成功");
        },
        cancel: function () { 
            // 用户取消分享后执行的回调函数
            alert("分享已经取消");
        }
    });
      //分享给朋友 
        wx.onMenuShareAppMessage({
        title: '我的主页', // 分享标题
        desc: '主页分享', // 分享描述
        link: 'http://www.infojhc.cn/~201421010730088/', // 分享链接
        imgUrl: 'http://www.infojhc.cn/~201421010730088/1.jpg', // 分享图标
        type: 'link', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function () { 
          alert('分享成功')
        },
        cancel: function () { 
            // 用户取消分享后执行的回调函数
        }
    });
  });
  wx.checkJsApi({
    jsApiList: ['chooseImage'],
    success: function(res) {
       console.log(res);
    }
  })
  wx.error(function(res){
      console.log(res);
  });
</script>
</html>
