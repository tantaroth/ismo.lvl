/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referring to this file must be placed before the ending body tag. */

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'FastProject\'">' + entity + '</span>' + html;
	}
	var icons = {
		'icon-home': '&#xe600;',
		'icon-home2': '&#xe601;',
		'icon-home3': '&#xe602;',
		'icon-office': '&#xe603;',
		'icon-newspaper': '&#xe604;',
		'icon-pencil': '&#xe605;',
		'icon-pencil2': '&#xe606;',
		'icon-quill': '&#xe607;',
		'icon-pen': '&#xe608;',
		'icon-blog': '&#xe609;',
		'icon-droplet': '&#xe60a;',
		'icon-paint-format': '&#xe60b;',
		'icon-image': '&#xe60c;',
		'icon-image2': '&#xe60d;',
		'icon-images': '&#xe60e;',
		'icon-camera': '&#xe60f;',
		'icon-music': '&#xe610;',
		'icon-headphones': '&#xe611;',
		'icon-play': '&#xe612;',
		'icon-film': '&#xe613;',
		'icon-camera2': '&#xe614;',
		'icon-dice': '&#xe615;',
		'icon-pacman': '&#xe616;',
		'icon-spades': '&#xe617;',
		'icon-clubs': '&#xe618;',
		'icon-diamonds': '&#xe619;',
		'icon-pawn': '&#xe61a;',
		'icon-bullhorn': '&#xe61b;',
		'icon-connection': '&#xe61c;',
		'icon-podcast': '&#xe61d;',
		'icon-feed': '&#xe61e;',
		'icon-book': '&#xe61f;',
		'icon-books': '&#xe620;',
		'icon-library': '&#xe621;',
		'icon-file': '&#xe622;',
		'icon-profile': '&#xe623;',
		'icon-file2': '&#xe624;',
		'icon-file3': '&#xe625;',
		'icon-file4': '&#xe626;',
		'icon-copy': '&#xe627;',
		'icon-copy2': '&#xe628;',
		'icon-copy3': '&#xe629;',
		'icon-paste': '&#xe62a;',
		'icon-paste2': '&#xe62b;',
		'icon-paste3': '&#xe62c;',
		'icon-stack': '&#xe62d;',
		'icon-folder': '&#xe62e;',
		'icon-folder-open': '&#xe62f;',
		'icon-tag': '&#xe630;',
		'icon-tags': '&#xe631;',
		'icon-barcode': '&#xe632;',
		'icon-qrcode': '&#xe633;',
		'icon-ticket': '&#xe634;',
		'icon-cart': '&#xe635;',
		'icon-cart2': '&#xe636;',
		'icon-cart3': '&#xe637;',
		'icon-coin': '&#xe638;',
		'icon-credit': '&#xe639;',
		'icon-calculate': '&#xe63a;',
		'icon-support': '&#xe63b;',
		'icon-phone': '&#xe63c;',
		'icon-phone-hang-up': '&#xe63d;',
		'icon-address-book': '&#xe63e;',
		'icon-notebook': '&#xe63f;',
		'icon-envelop': '&#xe640;',
		'icon-pushpin': '&#xe641;',
		'icon-location': '&#xe642;',
		'icon-location2': '&#xe643;',
		'icon-compass': '&#xe644;',
		'icon-map': '&#xe645;',
		'icon-map2': '&#xe646;',
		'icon-history': '&#xe647;',
		'icon-clock': '&#xe648;',
		'icon-clock2': '&#xe649;',
		'icon-alarm': '&#xe64a;',
		'icon-alarm2': '&#xe64b;',
		'icon-bell': '&#xe64c;',
		'icon-stopwatch': '&#xe64d;',
		'icon-calendar': '&#xe64e;',
		'icon-calendar2': '&#xe64f;',
		'icon-print': '&#xe650;',
		'icon-keyboard': '&#xe651;',
		'icon-screen': '&#xe652;',
		'icon-laptop': '&#xe653;',
		'icon-mobile': '&#xe654;',
		'icon-mobile2': '&#xe655;',
		'icon-tablet': '&#xe656;',
		'icon-tv': '&#xe657;',
		'icon-cabinet': '&#xe658;',
		'icon-drawer': '&#xe659;',
		'icon-drawer2': '&#xe65a;',
		'icon-drawer3': '&#xe65b;',
		'icon-box-add': '&#xe65c;',
		'icon-box-remove': '&#xe65d;',
		'icon-download': '&#xe65e;',
		'icon-upload': '&#xe65f;',
		'icon-disk': '&#xe660;',
		'icon-storage': '&#xe661;',
		'icon-undo': '&#xe662;',
		'icon-redo': '&#xe663;',
		'icon-flip': '&#xe664;',
		'icon-flip2': '&#xe665;',
		'icon-undo2': '&#xe666;',
		'icon-redo2': '&#xe667;',
		'icon-forward': '&#xe668;',
		'icon-reply': '&#xe669;',
		'icon-bubble': '&#xe66a;',
		'icon-bubbles': '&#xe66b;',
		'icon-bubbles2': '&#xe66c;',
		'icon-bubble2': '&#xe66d;',
		'icon-bubbles3': '&#xe66e;',
		'icon-bubbles4': '&#xe66f;',
		'icon-user': '&#xe670;',
		'icon-users': '&#xe671;',
		'icon-user2': '&#xe672;',
		'icon-users2': '&#xe673;',
		'icon-user3': '&#xe674;',
		'icon-user4': '&#xe675;',
		'icon-quotes-left': '&#xe676;',
		'icon-busy': '&#xe677;',
		'icon-spinner': '&#xe678;',
		'icon-spinner2': '&#xe679;',
		'icon-spinner3': '&#xe67a;',
		'icon-spinner4': '&#xe67b;',
		'icon-spinner5': '&#xe67c;',
		'icon-spinner6': '&#xe67d;',
		'icon-binoculars': '&#xe67e;',
		'icon-search': '&#xe67f;',
		'icon-zoom-in': '&#xe680;',
		'icon-zoom-out': '&#xe681;',
		'icon-expand': '&#xe682;',
		'icon-contract': '&#xe683;',
		'icon-expand2': '&#xe684;',
		'icon-contract2': '&#xe685;',
		'icon-key': '&#xe686;',
		'icon-key2': '&#xe687;',
		'icon-lock': '&#xe688;',
		'icon-lock2': '&#xe689;',
		'icon-unlocked': '&#xe68a;',
		'icon-wrench': '&#xe68b;',
		'icon-settings': '&#xe68c;',
		'icon-equalizer': '&#xe68d;',
		'icon-cog': '&#xe68e;',
		'icon-cogs': '&#xe68f;',
		'icon-cog2': '&#xe690;',
		'icon-hammer': '&#xe691;',
		'icon-wand': '&#xe692;',
		'icon-aid': '&#xe693;',
		'icon-bug': '&#xe694;',
		'icon-pie': '&#xe695;',
		'icon-stats': '&#xe696;',
		'icon-bars': '&#xe697;',
		'icon-bars2': '&#xe698;',
		'icon-gift': '&#xe699;',
		'icon-trophy': '&#xe69a;',
		'icon-glass': '&#xe69b;',
		'icon-mug': '&#xe69c;',
		'icon-food': '&#xe69d;',
		'icon-leaf': '&#xe69e;',
		'icon-rocket': '&#xe69f;',
		'icon-meter': '&#xe6a0;',
		'icon-meter2': '&#xe6a1;',
		'icon-dashboard': '&#xe6a2;',
		'icon-hammer2': '&#xe6a3;',
		'icon-fire': '&#xe6a4;',
		'icon-lab': '&#xe6a5;',
		'icon-magnet': '&#xe6a6;',
		'icon-remove': '&#xe6a7;',
		'icon-remove2': '&#xe6a8;',
		'icon-briefcase': '&#xe6a9;',
		'icon-airplane': '&#xe6aa;',
		'icon-truck': '&#xe6ab;',
		'icon-road': '&#xe6ac;',
		'icon-accessibility': '&#xe6ad;',
		'icon-target': '&#xe6ae;',
		'icon-shield': '&#xe6af;',
		'icon-lightning': '&#xe6b0;',
		'icon-switch': '&#xe6b1;',
		'icon-power-cord': '&#xe6b2;',
		'icon-signup': '&#xe6b3;',
		'icon-list': '&#xe6b4;',
		'icon-list2': '&#xe6b5;',
		'icon-numbered-list': '&#xe6b6;',
		'icon-menu': '&#xe6b7;',
		'icon-menu2': '&#xe6b8;',
		'icon-tree': '&#xe6b9;',
		'icon-cloud': '&#xe6ba;',
		'icon-cloud-download': '&#xe6bb;',
		'icon-cloud-upload': '&#xe6bc;',
		'icon-download2': '&#xe6bd;',
		'icon-upload2': '&#xe6be;',
		'icon-download3': '&#xe6bf;',
		'icon-upload3': '&#xe6c0;',
		'icon-globe': '&#xe6c1;',
		'icon-earth': '&#xe6c2;',
		'icon-link': '&#xe6c3;',
		'icon-flag': '&#xe6c4;',
		'icon-attachment': '&#xe6c5;',
		'icon-eye': '&#xe6c6;',
		'icon-eye-blocked': '&#xe6c7;',
		'icon-eye2': '&#xe6c8;',
		'icon-bookmark': '&#xe6c9;',
		'icon-bookmarks': '&#xe6ca;',
		'icon-brightness-medium': '&#xe6cb;',
		'icon-brightness-contrast': '&#xe6cc;',
		'icon-contrast': '&#xe6cd;',
		'icon-star': '&#xe6ce;',
		'icon-star2': '&#xe6cf;',
		'icon-star3': '&#xe6d0;',
		'icon-heart': '&#xe6d1;',
		'icon-heart2': '&#xe6d2;',
		'icon-heart-broken': '&#xe6d3;',
		'icon-thumbs-up': '&#xe6d4;',
		'icon-thumbs-up2': '&#xe6d5;',
		'icon-happy': '&#xe6d6;',
		'icon-happy2': '&#xe6d7;',
		'icon-smiley': '&#xe6d8;',
		'icon-smiley2': '&#xe6d9;',
		'icon-tongue': '&#xe6da;',
		'icon-tongue2': '&#xe6db;',
		'icon-sad': '&#xe6dc;',
		'icon-sad2': '&#xe6dd;',
		'icon-wink': '&#xe6de;',
		'icon-wink2': '&#xe6df;',
		'icon-grin': '&#xe6e0;',
		'icon-grin2': '&#xe6e1;',
		'icon-cool': '&#xe6e2;',
		'icon-cool2': '&#xe6e3;',
		'icon-angry': '&#xe6e4;',
		'icon-angry2': '&#xe6e5;',
		'icon-evil': '&#xe6e6;',
		'icon-evil2': '&#xe6e7;',
		'icon-shocked': '&#xe6e8;',
		'icon-shocked2': '&#xe6e9;',
		'icon-confused': '&#xe6ea;',
		'icon-confused2': '&#xe6eb;',
		'icon-neutral': '&#xe6ec;',
		'icon-neutral2': '&#xe6ed;',
		'icon-wondering': '&#xe6ee;',
		'icon-wondering2': '&#xe6ef;',
		'icon-point-up': '&#xe6f0;',
		'icon-point-right': '&#xe6f1;',
		'icon-point-down': '&#xe6f2;',
		'icon-point-left': '&#xe6f3;',
		'icon-warning': '&#xe6f4;',
		'icon-notification': '&#xe6f5;',
		'icon-question': '&#xe6f6;',
		'icon-info': '&#xe6f7;',
		'icon-info2': '&#xe6f8;',
		'icon-blocked': '&#xe6f9;',
		'icon-cancel-circle': '&#xe6fa;',
		'icon-checkmark-circle': '&#xe6fb;',
		'icon-spam': '&#xe6fc;',
		'icon-close': '&#xe6fd;',
		'icon-checkmark': '&#xe6fe;',
		'icon-checkmark2': '&#xe6ff;',
		'icon-spell-check': '&#xe700;',
		'icon-minus': '&#xe701;',
		'icon-plus': '&#xe702;',
		'icon-enter': '&#xe703;',
		'icon-exit': '&#xe704;',
		'icon-play2': '&#xe705;',
		'icon-pause': '&#xe706;',
		'icon-stop': '&#xe707;',
		'icon-backward': '&#xe708;',
		'icon-forward2': '&#xe709;',
		'icon-play3': '&#xe70a;',
		'icon-pause2': '&#xe70b;',
		'icon-stop2': '&#xe70c;',
		'icon-backward2': '&#xe70d;',
		'icon-forward3': '&#xe70e;',
		'icon-first': '&#xe70f;',
		'icon-last': '&#xe710;',
		'icon-previous': '&#xe711;',
		'icon-next': '&#xe712;',
		'icon-eject': '&#xe713;',
		'icon-volume-high': '&#xe714;',
		'icon-volume-medium': '&#xe715;',
		'icon-volume-low': '&#xe716;',
		'icon-volume-mute': '&#xe717;',
		'icon-volume-mute2': '&#xe718;',
		'icon-volume-increase': '&#xe719;',
		'icon-volume-decrease': '&#xe71a;',
		'icon-loop': '&#xe71b;',
		'icon-loop2': '&#xe71c;',
		'icon-loop3': '&#xe71d;',
		'icon-shuffle': '&#xe71e;',
		'icon-arrow-up-left': '&#xe71f;',
		'icon-arrow-up': '&#xe720;',
		'icon-arrow-up-right': '&#xe721;',
		'icon-arrow-right': '&#xe722;',
		'icon-arrow-down-right': '&#xe723;',
		'icon-arrow-down': '&#xe724;',
		'icon-arrow-down-left': '&#xe725;',
		'icon-arrow-left': '&#xe726;',
		'icon-arrow-up-left2': '&#xe727;',
		'icon-arrow-up2': '&#xe728;',
		'icon-arrow-up-right2': '&#xe729;',
		'icon-arrow-right2': '&#xe72a;',
		'icon-arrow-down-right2': '&#xe72b;',
		'icon-arrow-down2': '&#xe72c;',
		'icon-arrow-down-left2': '&#xe72d;',
		'icon-arrow-left2': '&#xe72e;',
		'icon-arrow-up-left3': '&#xe72f;',
		'icon-arrow-up3': '&#xe730;',
		'icon-arrow-up-right3': '&#xe731;',
		'icon-arrow-right3': '&#xe732;',
		'icon-arrow-down-right3': '&#xe733;',
		'icon-arrow-down3': '&#xe734;',
		'icon-arrow-down-left3': '&#xe735;',
		'icon-arrow-left3': '&#xe736;',
		'icon-tab': '&#xe737;',
		'icon-checkbox-checked': '&#xe738;',
		'icon-checkbox-unchecked': '&#xe739;',
		'icon-checkbox-partial': '&#xe73a;',
		'icon-radio-checked': '&#xe73b;',
		'icon-radio-unchecked': '&#xe73c;',
		'icon-crop': '&#xe73d;',
		'icon-scissors': '&#xe73e;',
		'icon-filter': '&#xe73f;',
		'icon-filter2': '&#xe740;',
		'icon-font': '&#xe741;',
		'icon-text-height': '&#xe742;',
		'icon-text-width': '&#xe743;',
		'icon-bold': '&#xe744;',
		'icon-underline': '&#xe745;',
		'icon-italic': '&#xe746;',
		'icon-strikethrough': '&#xe747;',
		'icon-omega': '&#xe748;',
		'icon-sigma': '&#xe749;',
		'icon-table': '&#xe74a;',
		'icon-table2': '&#xe74b;',
		'icon-insert-template': '&#xe74c;',
		'icon-pilcrow': '&#xe74d;',
		'icon-left-toright': '&#xe74e;',
		'icon-right-toleft': '&#xe74f;',
		'icon-paragraph-left': '&#xe750;',
		'icon-paragraph-center': '&#xe751;',
		'icon-paragraph-right': '&#xe752;',
		'icon-paragraph-justify': '&#xe753;',
		'icon-paragraph-left2': '&#xe754;',
		'icon-paragraph-center2': '&#xe755;',
		'icon-paragraph-right2': '&#xe756;',
		'icon-paragraph-justify2': '&#xe757;',
		'icon-indent-increase': '&#xe758;',
		'icon-indent-decrease': '&#xe759;',
		'icon-new-tab': '&#xe75a;',
		'icon-embed': '&#xe75b;',
		'icon-code': '&#xe75c;',
		'icon-console': '&#xe75d;',
		'icon-share': '&#xe75e;',
		'icon-mail': '&#xe75f;',
		'icon-mail2': '&#xe760;',
		'icon-mail3': '&#xe761;',
		'icon-mail4': '&#xe762;',
		'icon-google': '&#xe763;',
		'icon-google-plus': '&#xe764;',
		'icon-google-plus2': '&#xe765;',
		'icon-google-plus3': '&#xe766;',
		'icon-google-plus4': '&#xe767;',
		'icon-google-drive': '&#xe768;',
		'icon-facebook': '&#xe769;',
		'icon-facebook2': '&#xe76a;',
		'icon-facebook3': '&#xe76b;',
		'icon-instagram': '&#xe76c;',
		'icon-twitter': '&#xe76d;',
		'icon-twitter2': '&#xe76e;',
		'icon-twitter3': '&#xe76f;',
		'icon-feed2': '&#xe770;',
		'icon-feed3': '&#xe771;',
		'icon-feed4': '&#xe772;',
		'icon-youtube': '&#xe773;',
		'icon-youtube2': '&#xe774;',
		'icon-vimeo': '&#xe775;',
		'icon-vimeo2': '&#xe776;',
		'icon-vimeo3': '&#xe777;',
		'icon-lanyrd': '&#xe778;',
		'icon-flickr': '&#xe779;',
		'icon-flickr2': '&#xe77a;',
		'icon-flickr3': '&#xe77b;',
		'icon-flickr4': '&#xe77c;',
		'icon-picassa': '&#xe77d;',
		'icon-picassa2': '&#xe77e;',
		'icon-dribbble': '&#xe77f;',
		'icon-dribbble2': '&#xe780;',
		'icon-dribbble3': '&#xe781;',
		'icon-forrst': '&#xe782;',
		'icon-forrst2': '&#xe783;',
		'icon-deviantart': '&#xe784;',
		'icon-deviantart2': '&#xe785;',
		'icon-steam': '&#xe786;',
		'icon-steam2': '&#xe787;',
		'icon-github': '&#xe788;',
		'icon-github2': '&#xe789;',
		'icon-github3': '&#xe78a;',
		'icon-github4': '&#xe78b;',
		'icon-github5': '&#xe78c;',
		'icon-wordpress': '&#xe78d;',
		'icon-wordpress2': '&#xe78e;',
		'icon-joomla': '&#xe78f;',
		'icon-blogger': '&#xe790;',
		'icon-blogger2': '&#xe791;',
		'icon-tumblr': '&#xe792;',
		'icon-tumblr2': '&#xe793;',
		'icon-yahoo': '&#xe794;',
		'icon-tux': '&#xe795;',
		'icon-apple': '&#xe796;',
		'icon-finder': '&#xe797;',
		'icon-android': '&#xe798;',
		'icon-windows': '&#xe799;',
		'icon-windows8': '&#xe79a;',
		'icon-soundcloud': '&#xe79b;',
		'icon-soundcloud2': '&#xe79c;',
		'icon-skype': '&#xe79d;',
		'icon-reddit': '&#xe79e;',
		'icon-linkedin': '&#xe79f;',
		'icon-lastfm': '&#xe7a0;',
		'icon-lastfm2': '&#xe7a1;',
		'icon-delicious': '&#xe7a2;',
		'icon-stumbleupon': '&#xe7a3;',
		'icon-stumbleupon2': '&#xe7a4;',
		'icon-stackoverflow': '&#xe7a5;',
		'icon-pinterest': '&#xe7a6;',
		'icon-pinterest2': '&#xe7a7;',
		'icon-xing': '&#xe7a8;',
		'icon-xing2': '&#xe7a9;',
		'icon-flattr': '&#xe7aa;',
		'icon-foursquare': '&#xe7ab;',
		'icon-foursquare2': '&#xe7ac;',
		'icon-paypal': '&#xe7ad;',
		'icon-paypal2': '&#xe7ae;',
		'icon-paypal3': '&#xe7af;',
		'icon-yelp': '&#xe7b0;',
		'icon-libreoffice': '&#xe7b1;',
		'icon-file-pdf': '&#xe7b2;',
		'icon-file-openoffice': '&#xe7b3;',
		'icon-file-word': '&#xe7b4;',
		'icon-file-excel': '&#xe7b5;',
		'icon-file-zip': '&#xe7b6;',
		'icon-file-powerpoint': '&#xe7b7;',
		'icon-file-xml': '&#xe7b8;',
		'icon-file-css': '&#xe7b9;',
		'icon-html5': '&#xe7ba;',
		'icon-html52': '&#xe7bb;',
		'icon-css3': '&#xe7bc;',
		'icon-chrome': '&#xe7bd;',
		'icon-firefox': '&#xe7be;',
		'icon-IE': '&#xe7bf;',
		'icon-opera': '&#xe7c0;',
		'icon-safari': '&#xe7c1;',
		'icon-IcoMoon': '&#xe7c2;',
		'icon-phone': '&#xe7c3;',
		'icon-mobile': '&#xe7c4;',
		'icon-mouse': '&#xe7c5;',
		'icon-directions': '&#xe7c6;',
		'icon-mail': '&#xe7c7;',
		'icon-paperplane': '&#xe7c8;',
		'icon-pencil': '&#xe7c9;',
		'icon-feather': '&#xe7ca;',
		'icon-paperclip': '&#xe7cb;',
		'icon-drawer': '&#xe7cc;',
		'icon-reply': '&#xe7cd;',
		'icon-reply-all': '&#xe7ce;',
		'icon-forward': '&#xe7cf;',
		'icon-user': '&#xe7d0;',
		'icon-users': '&#xe7d1;',
		'icon-user-add': '&#xe7d2;',
		'icon-vcard': '&#xe7d3;',
		'icon-export': '&#xe7d4;',
		'icon-location': '&#xe7d5;',
		'icon-map': '&#xe7d6;',
		'icon-compass': '&#xe7d7;',
		'icon-sharable': '&#xe7d8;',
		'icon-heart': '&#xe7d9;',
		'icon-heart2': '&#xe7da;',
		'icon-star': '&#xe7db;',
		'icon-star2': '&#xe7dc;',
		'icon-thumbs-up': '&#xe7dd;',
		'icon-thumbs-down': '&#xe7de;',
		'icon-chat': '&#xe7df;',
		'icon-comment': '&#xe7e0;',
		'icon-quote': '&#xe7e1;',
		'icon-house': '&#xe7e2;',
		'icon-popup': '&#xe7e3;',
		'icon-search': '&#xe7e4;',
		'icon-flashlight': '&#xe7e5;',
		'icon-printer': '&#xe7e6;',
		'icon-bell': '&#xe7e7;',
		'icon-link': '&#xe7e8;',
		'icon-flag': '&#xe7e9;',
		'icon-tag': '&#xe7ea;',
		'icon-camera': '&#xe7eb;',
		'icon-megaphone': '&#xe7ec;',
		'icon-moon': '&#xe7ed;',
		'icon-palette': '&#xe7ee;',
		'icon-leaf': '&#xe7ef;',
		'icon-music': '&#xe7f0;',
		'icon-music2': '&#xe7f1;',
		'icon-new': '&#xe7f2;',
		'icon-graduation': '&#xe7f3;',
		'icon-book': '&#xe7f4;',
		'icon-newspaper': '&#xe7f5;',
		'icon-bag': '&#xe7f6;',
		'icon-airplane': '&#xe7f7;',
		'icon-lifebuoy': '&#xe7f8;',
		'icon-eye': '&#xe7f9;',
		'icon-clock': '&#xe7fa;',
		'icon-microphone': '&#xe7fb;',
		'icon-droplet': '&#xe7fc;',
		'icon-cd': '&#xe7fd;',
		'icon-briefcase': '&#xe7fe;',
		'icon-air': '&#xe7ff;',
		'icon-hourglass': '&#xe800;',
		'icon-gauge': '&#xe801;',
		'icon-language': '&#xe802;',
		'icon-network': '&#xe803;',
		'icon-key': '&#xe804;',
		'icon-battery': '&#xe805;',
		'icon-bucket': '&#xe806;',
		'icon-magnet': '&#xe807;',
		'icon-drive': '&#xe808;',
		'icon-cup': '&#xe809;',
		'icon-rocket': '&#xe80a;',
		'icon-brush': '&#xe80b;',
		'icon-suitcase': '&#xe80c;',
		'icon-cone': '&#xe80d;',
		'icon-publish': '&#xe80e;',
		'icon-progress-3': '&#xe80f;',
		'icon-progress-2': '&#xe810;',
		'icon-brogress-1': '&#xe811;',
		'icon-progress-0': '&#xe812;',
		'icon-sun': '&#xe813;',
		'icon-sun2': '&#xe814;',
		'icon-adjust': '&#xe815;',
		'icon-code': '&#xe816;',
		'icon-screen': '&#xe817;',
		'icon-infinity': '&#xe818;',
		'icon-light-bulb': '&#xe819;',
		'icon-credit-card': '&#xe81a;',
		'icon-database': '&#xe81b;',
		'icon-voicemail': '&#xe81c;',
		'icon-clipboard': '&#xe81d;',
		'icon-cart': '&#xe81e;',
		'icon-box': '&#xe81f;',
		'icon-thermometer': '&#xe820;',
		'icon-droplets': '&#xe821;',
		'icon-uniE822': '&#xe822;',
		'icon-statistics': '&#xe823;',
		'icon-pie': '&#xe824;',
		'icon-bars': '&#xe825;',
		'icon-graph': '&#xe826;',
		'icon-lock': '&#xe827;',
		'icon-lock-open': '&#xe828;',
		'icon-logout': '&#xe829;',
		'icon-login': '&#xe82a;',
		'icon-checkmark': '&#xe82b;',
		'icon-cross': '&#xe82c;',
		'icon-minus': '&#xe82d;',
		'icon-plus': '&#xe82e;',
		'icon-cross2': '&#xe82f;',
		'icon-minus2': '&#xe830;',
		'icon-plus2': '&#xe831;',
		'icon-erase': '&#xe832;',
		'icon-blocked': '&#xe833;',
		'icon-info': '&#xe834;',
		'icon-info2': '&#xe835;',
		'icon-question': '&#xe836;',
		'icon-help': '&#xe837;',
		'icon-warning': '&#xe838;',
		'icon-cycle': '&#xe839;',
		'icon-cw': '&#xe83a;',
		'icon-ccw': '&#xe83b;',
		'icon-shuffle': '&#xe83c;',
		'icon-arrow': '&#xe83d;',
		'icon-arrow2': '&#xe83e;',
		'icon-retweet': '&#xe83f;',
		'icon-loop': '&#xe840;',
		'icon-history': '&#xe841;',
		'icon-back': '&#xe842;',
		'icon-switch': '&#xe843;',
		'icon-list': '&#xe844;',
		'icon-text': '&#xe845;',
		'icon-text2': '&#xe846;',
		'icon-document': '&#xe847;',
		'icon-docs': '&#xe848;',
		'icon-landscape': '&#xe849;',
		'icon-pictures': '&#xe84a;',
		'icon-video': '&#xe84b;',
		'icon-music3': '&#xe84c;',
		'icon-folder': '&#xe84d;',
		'icon-archive': '&#xe84e;',
		'icon-trash': '&#xe84f;',
		'icon-upload': '&#xe850;',
		'icon-download': '&#xe851;',
		'icon-disk': '&#xe852;',
		'icon-install': '&#xe853;',
		'icon-cloud': '&#xe854;',
		'icon-upload2': '&#xe855;',
		'icon-location2': '&#xe856;',
		'icon-target': '&#xe857;',
		'icon-share': '&#xe858;',
		'icon-cog': '&#xe859;',
		'icon-tools': '&#xe85a;',
		'icon-trophy': '&#xe85b;',
		'icon-calendar': '&#xe85c;',
		'icon-bolt': '&#xe85d;',
		'icon-thunder': '&#xe85e;',
		'icon-earth': '&#xe85f;',
		'icon-keyboard': '&#xe860;',
		'icon-browser': '&#xe861;',
		'icon-ticket': '&#xe862;',
		'icon-rss': '&#xe863;',
		'icon-signal': '&#xe864;',
		'icon-cross3': '&#xe865;',
		'icon-minus3': '&#xe866;',
		'icon-plus3': '&#xe867;',
		'icon-list2': '&#xe868;',
		'icon-add-to-list': '&#xe869;',
		'icon-layout': '&#xe86a;',
		'icon-bookmark': '&#xe86b;',
		'icon-bookmarks': '&#xe86c;',
		'icon-book2': '&#xe86d;',
		'icon-play': '&#xe86e;',
		'icon-pause': '&#xe86f;',
		'icon-record': '&#xe870;',
		'icon-stop': '&#xe871;',
		'icon-next': '&#xe872;',
		'icon-previous': '&#xe873;',
		'icon-first': '&#xe874;',
		'icon-last': '&#xe875;',
		'icon-resize-enlarge': '&#xe876;',
		'icon-resize-shrink': '&#xe877;',
		'icon-volume': '&#xe878;',
		'icon-sound': '&#xe879;',
		'icon-mute': '&#xe87a;',
		'icon-flow-cascade': '&#xe87b;',
		'icon-flow-branch': '&#xe87c;',
		'icon-flow-tree': '&#xe87d;',
		'icon-flow-line': '&#xe87e;',
		'icon-flow-parallel': '&#xe87f;',
		'icon-arrow-left': '&#xe880;',
		'icon-arrow-down': '&#xe881;',
		'icon-arrow-up--upload': '&#xe882;',
		'icon-arrow-right': '&#xe883;',
		'icon-arrow-left2': '&#xe884;',
		'icon-arrow-down2': '&#xe885;',
		'icon-arrow-up': '&#xe886;',
		'icon-arrow-right2': '&#xe887;',
		'icon-arrow-left3': '&#xe888;',
		'icon-arrow-down3': '&#xe889;',
		'icon-arrow-up2': '&#xe88a;',
		'icon-arrow-right3': '&#xe88b;',
		'icon-arrow-left4': '&#xe88c;',
		'icon-arrow-down4': '&#xe88d;',
		'icon-arrow-up3': '&#xe88e;',
		'icon-arrow-right4': '&#xe88f;',
		'icon-arrow-left5': '&#xe890;',
		'icon-arrow-down5': '&#xe891;',
		'icon-arrow-up4': '&#xe892;',
		'icon-arrow-right5': '&#xe893;',
		'icon-arrow-left6': '&#xe894;',
		'icon-arrow-down6': '&#xe895;',
		'icon-arrow-up5': '&#xe896;',
		'icon-arrow-right6': '&#xe897;',
		'icon-arrow-left7': '&#xe898;',
		'icon-arrow-down7': '&#xe899;',
		'icon-arrow-up6': '&#xe89a;',
		'icon-uniE89B': '&#xe89b;',
		'icon-arrow-left8': '&#xe89c;',
		'icon-arrow-down8': '&#xe89d;',
		'icon-arrow-up7': '&#xe89e;',
		'icon-arrow-right7': '&#xe89f;',
		'icon-menu': '&#xe8a0;',
		'icon-ellipsis': '&#xe8a1;',
		'icon-dots': '&#xe8a2;',
		'icon-dot': '&#xe8a3;',
		'icon-cc': '&#xe8a4;',
		'icon-cc-by': '&#xe8a5;',
		'icon-cc-nc': '&#xe8a6;',
		'icon-cc-nc-eu': '&#xe8a7;',
		'icon-cc-nc-jp': '&#xe8a8;',
		'icon-cc-sa': '&#xe8a9;',
		'icon-cc-nd': '&#xe8aa;',
		'icon-cc-pd': '&#xe8ab;',
		'icon-cc-zero': '&#xe8ac;',
		'icon-cc-share': '&#xe8ad;',
		'icon-cc-share2': '&#xe8ae;',
		'icon-daniel-bruce': '&#xe8af;',
		'icon-daniel-bruce2': '&#xe8b0;',
		'icon-github': '&#xe8b1;',
		'icon-github2': '&#xe8b2;',
		'icon-flickr': '&#xe8b3;',
		'icon-flickr2': '&#xe8b4;',
		'icon-vimeo': '&#xe8b5;',
		'icon-vimeo2': '&#xe8b6;',
		'icon-twitter': '&#xe8b7;',
		'icon-twitter2': '&#xe8b8;',
		'icon-facebook': '&#xe8b9;',
		'icon-facebook2': '&#xe8ba;',
		'icon-facebook3': '&#xe8bb;',
		'icon-googleplus': '&#xe8bc;',
		'icon-googleplus2': '&#xe8bd;',
		'icon-pinterest': '&#xe8be;',
		'icon-pinterest2': '&#xe8bf;',
		'icon-tumblr': '&#xe8c0;',
		'icon-tumblr2': '&#xe8c1;',
		'icon-linkedin': '&#xe8c2;',
		'icon-linkedin2': '&#xe8c3;',
		'icon-dribbble': '&#xe8c4;',
		'icon-dribbble2': '&#xe8c5;',
		'icon-stumbleupon': '&#xe8c6;',
		'icon-stumbleupon2': '&#xe8c7;',
		'icon-lastfm': '&#xe8c8;',
		'icon-lastfm2': '&#xe8c9;',
		'icon-rdio': '&#xe8ca;',
		'icon-rdio2': '&#xe8cb;',
		'icon-spotify': '&#xe8cc;',
		'icon-spotify2': '&#xe8cd;',
		'icon-qq': '&#xe8ce;',
		'icon-instagram': '&#xe8cf;',
		'icon-dropbox': '&#xe8d0;',
		'icon-evernote': '&#xe8d1;',
		'icon-flattr': '&#xe8d2;',
		'icon-skype': '&#xe8d3;',
		'icon-smashing': '&#xe8d4;',
		'icon-vk': '&#xe8d5;',
		'icon-circles': '&#xe8d6;',
		'icon-behance': '&#xe8d7;',
		'icon-mixi': '&#xe8d8;',
		'icon-soundcloud': '&#xe8d9;',
		'icon-picasa': '&#xe8da;',
		'icon-paypal': '&#xe8db;',
		'icon-sina-weibo': '&#xe8dc;',
		'icon-renren': '&#xe8dd;',
		'icon-skype2': '&#xe8de;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, attr, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());