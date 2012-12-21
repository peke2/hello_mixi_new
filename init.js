mixi.init({
    appId:    "mixiapp-web_39447",
    relayUrl: "http://sub0000498489.hmk-temp.com/test/hello_mixi_new/prepare_js.html"
});

mixi.auth({
    scope: "mixi_apps2 r_profile",
    state: "touch"
});

/*
mixi Graph API
People API				ユーザ自身の情報や友人の情報を取得するAPIです。サンプルアプリでは、友人の一覧を表示します。
*/


/*
JavaScript API
招待API					まだこのアプリを利用していない友人にアプリを勧めて招待するためのAPIです。
アクティビティAPI		アプリ内でのユーザの行動を友人に対して通知するためのAPIです。
外部サイトへ誘導する	mixiアプリから外部のサイトへユーザを誘導するAPIです。
ユーザ認可API(※) 
*/
