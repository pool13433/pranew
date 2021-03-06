<h2 class="ui top attached header">
    แก้ไชช้อมูลรหัสผ่านใหม่
</h2>
<div class="ui attached segment orange">
    <form  id="form-change" class="ui form">
        <div class="field">
            <label for="username">username<small> *</small></label>
            <input type="hidden" name="id" value="<?= $member->mem_id ?>">
            <input type="text" readonly name="username" id="username" value="<?= $member->mem_username ?>">
        </div>
        <div class="field">
            <label for="password">รหัสผ่าน เก่า <small> *</small></label>
            <input type="password" name="passwordOld" id="passwordOld"  value="<?= $member->mem_password ?>">
        </div>
        <div class="two fields">
            <div class="field">
                <label for="password">รหัสผ่าน ใหม่<small> *</small></label>
                <input type="password" name="passwordNew" id="passwordNew"  value="<?= $member->mem_password ?>">
            </div>
            <div class="field">
                <label for="confirm_password" >ยืนยันรหัสผ่านใหม่ อีกครั้ง <small> *</small></label>
                <input type="password" name="confirmPasswordNew" id="confirmPasswordNew"  value="<?= $member->mem_password ?>">
            </div>
        </div>
        <div class="actions">
            <button type="submit" class="ui button green"><i class="save icon"></i> เปลี่ยนรหัสผ่าน</button>
            <button type="reset" class="ui button orange"><i class="remove icon"></i> ล้างค่า</button>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#passwordOld').focusout(function () {
            var elePassword = this
            var passwordLength = $(this).val().length;
            if (passwordLength > 0) {
                $.post('<?= Yii::app()->createUrl('Helper/CheckPasswordOld') ?>', {
                    username: $('#username').val(),
                    password: $('#passwordOld').val(),
                }, function (resp) {
                    if (!resp.status) {
                        alert('รหัสผ่านเก่าไม่ถูกต้องกรุณากรอกอีกครั้ง');
                        $(elePassword).val('');
                        $(elePassword).focus();
                    }
                }, 'json')
            }
        });

        $('#form-change').form({
            inline: true,
            transition: 'scale',
            on: 'blur',
            fields: {
                username: {
                    identifier: 'username',
                    rules: [
                        {type: 'empty', prompt: 'กรุณากรอกข้อมูล username'},
                        {type: 'regExp[/^[a-zA-Z0-9]+$/]', prompt: 'กรุณากรอก ตัวเลขกับอักษรภาษาอังกฤษเท่านั้น'}
                    ]
                },
                passwordOld: {
                    identifier: 'passwordOld',
                    rules: [
                        {type: 'empty', prompt: 'กรุณากรอก รหัสผ่านเก่า'},
                    ]
                },
                passwordNew: {
                    identifier: 'passwordNew',
                    rules: [
                        {type: 'empty', prompt: 'กรุณากรอก รหัสใหม่'},
                        {type: 'match[confirmPasswordNew]', prompt: 'กรุณากรอก รหัสใหม่ ให้ตรงกัน'},
                    ]
                },
                confirmPasswordNew: {
                    identifier: 'confirmPasswordNew',
                    rules: [
                        {type: 'empty', prompt: 'กรุณากรอกข้อมูล ยืนยันรหัสผ่านใหม่'},
                        {type: 'match[passwordNew]', prompt: 'กรุณากรอก ยืนยันรหัสผ่านใหม่ ให้ตรงกัน'},
                    ]
                },
            },
            onSuccess: function (event, fields) {
                event.preventDefault();
                $.ajax({
                    url: '<?= Yii::app()->createUrl('Helper/SaveChanePasswordNew') ?>',
                    data: $(event.target).serialize(),
                    type: 'POST',
                    dataType: 'JSON',
                    success: function (response) {
                        if (response.status) {
                            window.location.href = response.url;
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {

                    }
                });
            }
        });

    });
</script>