$(document).ready(function() {
    // parallax
    $('.parallax').parallax();

    // tab
    $('ul.tabs').tabs();

    // select box
    $('select').material_select();

    // side navigation
    $(".button-collapse").sideNav();

    // datepicker
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year
        monthsFull:  ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
        monthsShort: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
        weekdaysFull: ["日曜日", "月曜日", "火曜日", "水曜日", "木曜日", "金曜日", "土曜日"],
        weekdaysShort:  ["日", "月", "火", "水", "木", "金", "土"],
        weekdaysLetter: ["日", "月", "火", "水", "木", "金", "土"],
        labelMonthNext: "翌月",
        labelMonthPrev: "前月",
        labelMonthSelect: "月を選択",
        labelYearSelect: "年を選択",
        today: "今日",
        clear: "クリア",
        close: "閉じる",
        format: 'yyyy-mm-dd',
        closeOnselect: true
        /*onSet: function() {
            this.close();
        }*/
    });

    // modal
    $('.modal-trigger').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 500, // Transition in duration
      out_duration: 500 // Transition out duration
      //ready: function() { alert('Ready'); }, // Callback for Modal open
      //complete: function() { alert('Closed'); } // Callback for Modal close
    });

    // アクションボタンを表示/非表示
    $(window).scroll(function(){
        var scrollTop = $(this).scrollTop();
        var scrollHeight = $(document).height();
        var scrollPosition = $(this).height() + $(this).scrollTop();

        if (scrollTop > 0 || (scrollHeight - scrollPosition) / scrollHeight === 0) {
            $('.fixed-action-btn').fadeIn();
        } else {
            $('.fixed-action-btn').fadeOut().removeClass('active');
        }
    });
    // button go to top
    $('.fixed-action-btn ul li > .go-to-top').on('click', function() {
        $('body,html').animate({
            scrollTop: 0
        }, 1000);

        return false;
    });


});


