jQuery(document).ready(function() {


            $('#loginError').hide();

            var postUrl=appUrl+"/Home/login/validation";

            //通过前面定义的变量获取地址

            $('#loginbtn').click(function(){

            // $.post('d1',{json:数据},{回调函数});

            //post可以传递json数据，如下：

                $.post(postUrl,{

                    'name':$("#user").val(),

                    'password':$("#pass").val()

                        },function(data){

                          /*data是返回的值*/
                             if(data.flag==1){
                              //返回的是json数据，详细看php代码
                               $('#loginError').fadeOut();
                            }
                            if(data.flag==0){
                              // $('#loginError').fadeIn();
                            }
                  });
            });
         });
