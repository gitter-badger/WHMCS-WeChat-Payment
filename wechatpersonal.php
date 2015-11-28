<?php
function wechatpersonal_config() {
    $configarray = array(
        "FriendlyName"  => array(
            "Type"  => "System",
            "Value" => "WeChat 微信支付接口"
        ),
        "seller_barcode"  => array(
            "FriendlyName" => "微信收钱二维码图片地址",
            "Type"         => "text",
            "Size"         => "32",
        ),
    );

    return $configarray;
}

function wechatpersonal_form($params) {

    # Invoice Variables
    $systemurl = $params['systemurl'];
    $invoiceid = $params['invoiceid'];
    $amount    = $params['amount']; # Format: ##.##
    $seller_email = $params['seller_email'];
    $fingerprint      = '0.' . $invoiceid;
    $shouldpay      =  $amount+$fingerprint;
    $form_html = '<p style=" text-align: left;width: 300px;">
    微信支付的方法:<br>
    1、使用微信扫描二维码<br>
    2、输入金额<input style=" width: 64px; " name="payAmount" value="' . $shouldpay . '"/> <br>
    3、付款完成后等待确认(3小时内)<br>
	</p>';
    $img       = $seller_barcode; //这个图片要先存放好.
    $code      = $form_html . '<a href="https://dn-farshore.qbox.me/payment/wechat.png"><img src="https://dn-farshore.qbox.me/payment/wechat.png" alt="点击使用微信支付" style="width: 250px;"></a>';
    return $code;
}

function wechatpersonal_link($params) {
    return wechatpersonal_form($params);
}

?>
