

// 提示错误消息
function showToastInfo(info) {
    if ($("label.error").length === 0) {
    	
       $("<label class='error'></label>").text(info).appendTo($("body")).show().delay(1000).fadeOut(600);
    } else {
        $("label.error").text(info).show().delay(1000).fadeOut(600);
    }
}

//// 提示错误消息
function showToastErr(info) {
    if ($("label.error").length == 0) {
        $("<label class='error'></label>").text(info).appendTo($("body")).show().delay(1000).fadeOut(600);
    } else {
        $("label.error").text(info).appendTo($("body")).show().delay(1000).fadeOut(600);
    }
}