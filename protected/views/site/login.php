
<div class="ui middle aligned center aligned grid" style="margin-top: 150px;">
    <div class="ui card">
        <form class="ui  form" name="formLogin">
            <h5 class="ui top attached header">
                Login เข้าใช้งานระบบ
            </h5>
            <div class="ui attached segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" placeholder="Username" name="username">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                </div>
                <button type="submit" class="ui fluid large teal submit button">
                    เข้าระบบ
                </button>
            </div>
            <div class="ui attached segment">
                <button class="ui blue button fluid btn-block" id="loginBtn" type="button">
                    Facebook Login
                </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    

    $(function () {
        $('form[name="formLogin"]').form({
            inline: true,
            transition: 'scale',
            on: 'blur',
            fields: {
                username: {
                    identifier: 'username',
                    rules: [
                        {type: 'empty', prompt: 'กรุณากรอกข้อมูล username'}
                    ]
                },
                password: {
                    identifier: 'password',
                    rules: [
                        {type: 'empty', prompt: 'กรุณากรอกข้อมูล password'}
                    ]
                },
            },
            onSuccess: function (event, fields) {
                console.log(event);
                event.preventDefault();
                $.ajax({
                    url: '<?= Yii::app()->createUrl('site/login') ?>',
                    data: $(event.target).serialize(),
                    type: 'POST',
                    dataType: 'JSON',
                    success: function (response) {
                        if (response.status) {
                            window.location.href = response.url;
                        } else {
                            window.location.reload(true);
                        }
                    },
                    error: function () {

                    }
                });
                return false;
            }
        });
    });
    /*
     * *************************** Handle Facebook Login *********************************
     */

</script>