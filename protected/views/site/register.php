<h2 class="ui top attached header">
    <?= (empty($form_title) ? 'ลงทะเบียนเพื่อเข้าร่วมเป็นสมาชิกของเรา' : $form_title) ?>
</h2>
<div class="ui attached segment orange">
    <form  id="form-register" class="ui form">
        <?php if (empty($profile->facebook_id) && empty(Yii::app()->session['member'])) { ?>
            <div class="three fields">
              <div class="field">
                  <label for="username">username<small> *</small></label>
                  <input type="hidden" name="id" value="<?= $member->mem_id ?>">
                  <input type="text" name="username" value="<?= $member->mem_username ?>">
              </div>
            </div>
            <div class="three fields">
                <div class="field">
                    <label for="password">password <small> *</small></label>
                    <div class="col-sm-4">
                        <input type="password" name="password" id="password"  value="<?= $member->mem_password ?>">
                    </div>
                </div>
                <div class="field">
                    <label for="confirm_password" class="col-sm-2 col-sm-2 control-label">confirm password <small> *</small></label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control input-lg" name="confirm_password" id="confirm_password"  value="<?= $member->mem_password ?>">
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="three fields">
          <div class="field">
              <label for="fname">ชื่อจริง <small> *</small></label>
              <input type="text" class="form-control input-lg" name="fname" value="<?= $member->mem_fname ?>">
          </div>
          <div class="field">
              <label for="lname">นามสกุล</label>
              <input type="text" class="form-control" name="lname" value="<?= $member->mem_lname ?>">
          </div>
        </div>

        <div class="three fields">
          <div class="field two wide">
              <label>เพศ <small> *</small></label>
              <select class="ui dropdown" name="sex">
                  <option value="" selected>-- กรุณาเลือก --</option>
                  <?php $genders = Member::gender() ?>
                  <?php foreach ($genders as $key => $gender) { ?>
                      <?php if ($member->mem_sex == $key) { ?>
                          <option value="<?= $key ?>" selected><?= $gender ?></option>
                      <?php } else { ?>
                          <option value="<?= $key ?>"><?= $gender ?></option>
                      <?php } ?>
                  <?php } ?>
              </select>
          </div>
        </div>
        <div class="three fields">
          <div class="field">
              <label for="phone">โทรศัพท์ <small> *</small></label>
              <input type="text" class="form-control input-lg" name="phone" value="<?= $member->mem_phone ?>">
          </div>
          <div class="field">
              <label for="email">อีเมลล์</label>
              <input type="text" class="form-control" name="email" value="<?= $member->mem_email ?>">
          </div>
        </div>

        <?php if (!empty($profile) && $profile) { ?>
            <div class="field">
                <label for="address" class="col-sm-2 col-sm-2 control-label">ที่อยู่</label>
                <textarea class="form-control input-lg" name="address" rows="4"><?= $member->mem_address ?></textarea>
            </div>
        <?php } ?>
        <div class="actions">
            <button type="submit" class="ui button green"><i class="save icon"></i> ลงทะเบียน</button>
            <?php if (empty($profile)) { ?>
                <a href="<?= Yii::app()->createUrl("site/login") ?>" class="ui button orange">
                    <i class="glyphicon glyphicon-arrow-left"></i> กลับเพื่อไป Login
                </a>
            <?php } ?>
        </div>
    </form>
</div>

<script type = "text/javascript" >
    $(function () {
        $('#form-register').form({
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
                password: {
                    identifier: 'password',
                    rules: [
                        {type: 'empty', prompt: 'กรุณากรอกข้อมูล password'},
                        {type: 'match[confirm_password]', prompt: 'กรุณากรอก password ให้ตรงกัน'},
                        {type: 'regExp[/^[a-zA-Z0-9]+$/]', prompt: 'กรุณากรอก ตัวเลขกับอักษรภาษาอังกฤษเท่านั้น'}
                    ]
                },
                confirm_password: {
                    identifier: 'confirm_password',
                    rules: [
                        {type: 'empty', prompt: 'กรุณากรอกข้อมูล confirm_password'},
                        {type: 'match[password]', prompt: 'กรุณากรอก password ให้ตรงกัน'},
                        {type: 'regExp[/^[a-zA-Z0-9]+$/]', prompt: 'กรุณากรอก ตัวเลขกับอักษรภาษาอังกฤษเท่านั้น'}
                    ]
                },
                sex: {
                    identifier: 'sex',
                    rules: [
                        {type: 'empty', prompt: 'กรุณากรอกเลือก เพศ'},
                    ]
                },
                phone: {
                    identifier: 'phone',
                    rules: [
                        {type: 'empty', prompt: 'กรุณากรอกเบอร์โทรศัพท์'},
                        //{type: 'maxLength[10]', prompt: 'กรุณากรอกเบอร์โทรศัพท์ เป็นตัวเลขไม่เกิน 10 ตัวอักษร'},
                        //{type: 'minLength[10]', prompt: 'กรุณากรอกเบอร์โทรศัพท์ เป็นตัวเลข 10 ตัวอักษร'}
                    ]
                },
                fname: {
                    identifier: 'fname',
                    rules: [
                        {type: 'empty', prompt: 'กรุณากรอกข้อมูลชื่อ'},
                    ]
                }
            },
            onSuccess: function (event, fields) {
                event.preventDefault();
                $.ajax({
                    url: '<?= $action_url ?>',
                    data: $(event.target).serialize(),
                    type: 'POST',
                    dataType: 'JSON',
                    success: function (response) {
                        if (response.status) {
                            window.location.href = response.url;
                        } else {
                            alert(response.message);
                            //window.location.reload(true);
                        }
                    },
                    error: function () {

                    }
                });
            }
        });

    });

</script>
