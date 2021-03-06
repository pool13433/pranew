//var MaximumSizeOfFile = (1024 * 1024) * 3;
var sizeUpload = 3;
var MaximumSizeOfFile = (1024 * 1024) * sizeUpload;

/*
 * Facebook Constant
 */
/*
 * http://code.runnable.com/UTlPL1-f2W1TAAAZ/get-user-details-email-address-with-javascript-sdk-for-facebook
 * @type Array|@call;join
 */
var permissions = [
    'email',
    'user_birthday',
    'user_likes'
].join(',');
var fields = [
    'id',
    'name',
    'first_name',
    'middle_name',
    'last_name',
    'gender',
    'locale',
    'languages',
    'link',
    //'username',
    'third_party_id',
    'installed',
    'timezone',
    'updated_time',
    'verified',
    'age_range',
    'bio',
    'birthday'
].join(',');


$(document).ready(function () {
    customDatatable();
    customPace();
    customCardBoxBealtiful();
    //customElevateZoom();
    //initApp();
    //validateDefault();
//    $(".fancybox").fancybox({
//        //'width': 400,
//        //'height': 300,
//        'autoSize': false,
//    });
    $('.sidebar-toggle').on('click', function () {
        $('.menu.sidebar').sidebar('setting', {
            transition: 'overlay',
            closable: true,
        }).sidebar('toggle');
    });
    $('.sidebar-toggle-close').on('click', function () {
        $('.menu.sidebar').sidebar('setting', {
            transition: 'overlay',
            closable: true,
        }).sidebar('toggle');
    });
    $('.dropdown.item').dropdown();
    $('.dropdown.ui').dropdown();
});

$.extend(true, $.fn.dataTable.defaults, {
    "language": {
        "sProcessing": "กำลังดำเนินการ...",
        "sLengthMenu": "แสดง_MENU_ แถว",
        "sZeroRecords": "ไม่พบข้อมูล",
        "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
        "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
        "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
        "sInfoPostFix": "",
        "sSearch": "ค้นหา:",
        "sUrl": "",
        "oPaginate": {
            "sFirst": "เิริ่มต้น",
            "sPrevious": "ก่อนหน้า",
            "sNext": "ถัดไป",
            "sLast": "สุดท้าย"
        }
    }
});
function customDatatable() {
    $('table').DataTable();
}
function initApp() {
    $('select.form-control').each(function (index, select) {
        $(this).find('option').eq('0').before($('<option></option>').val('').html('-- กรุณาเลือก --').prop('selected', true));

    });

}

function customPace() {
    paceOptions = {
        // Configuration goes here. Example:
        elements: false,
        restartOnPushState: false,
        restartOnRequestAfter: false
    }
}

function simulateImage(input) {
    var type = input.files[0].type;
    var size = input.files[0].size;
    var lastModified = input.files[0].lastModified;
    var name = input.files[0].name;
    var types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/JPEG', 'image/JPG', 'image/PNG', 'image/GIF'];
    if (input.files && input.files[0]) {
        if (types.indexOf(type) > -1) {
            if (size < MaximumSizeOfFile) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgMain').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                alert('Please upload Maximun ' + MaximumSizeOfFile + ' kb');
            }

        } else {
            alert('Please upload files type [.jpeg,.png,.gif]');
        }
    }
}

function validateDefault() {
    $.validator.setDefaults({
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error').css({'font-weight': 'bold'})
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
    });
}
function customCardBoxBealtiful() {
    var panelCards = $('.box-card');
    $.each(panelCards, function (index, card) {
        var maxLength = 50;
        var name = $.trim($(card).find('strong.title').text());
        var price = $(card).find('p.pull-left').text();
        var date = $(card).find('p.pull-right').text();
        //console.log('------------------------------------------');
        // console.log(' name ::==' + name);
        //console.log('name.length ::==' + name.length)
        //console.log('------------------------------------------');
        if (name.length < 35) {
            $(card).find('panel-body').find('.col-lg-12').eq(0).append('<br/>');
            var targetObj = $(card).find('div.panel-body').find('strong');
            //$('<br/>').insertBefore(targetObj);
            name += " ";
            for (var i = 0; i < maxLength; i++) {
                name += "\u00A0";
            }
            targetObj.text(name);
            $(card).find('strong.title').css({'font-size': '1.2em'});
        } else {
            $(card).find('strong.title').css({'font-size': '1.4em'});
        }

    });
}








