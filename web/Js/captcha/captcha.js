/**
 * Created on 2016/5/9.
 */
/*
$(function(){
    $(".captcha").click(function()
    {
        changeCaptcha($(this));
    })

    //更换验证码
    function changeCaptcha(obj) {
        obj.attr('src','/site/captcha/?'+Math.random());
    }

})
*/

$(function(){                   //当页面加载的时候
    changeVerifyCode();         //刷新或者重新加载一个验证码

    //清除输入框里面的数据
    $("#clear_form").click(function(){
        $("input").val('');
    });
});

//更改或者重新加载验证码
function changeVerifyCode() {
    $.ajax({
        url: "/admin/site/captcha?refresh",
        dataType: 'json',
        cache: false,
        success: function(data) {
            $("#imgVerifyCode").attr('src', data['url']);
          //  $('body').data('/admin/index/captcha?refresh', [data['hash1'], data['hash2']]);
        }
    });
}

/*//更换验证码
function changeCaptcha(obj) {
    obj.attr('src','/site/captcha/?'+Math.random());
}*/



