var embedCodes = ['M3eTJ2eDo8Nn2Rjl2GFQWyKimaECtKC2',
"p4bjN2eDpxhDLY2mmPYKNWwtW849yOsL"];
var adEmbedCodes = ['0xbjN2eDok1XibOndarkgXjyFVXlBL9l',
'Q1cDN2eDofZvweeZWMqopa91gwdWWMgf',
'RtazN2eDrP-zc-0koYcmuCKeg1AyfqWC'];
var currentIndex = 0;
var adCurrentIndex = 0;
var oplayer = null;


function createPlayer(OO) {
    OO.$("#playerwrapper").html('');
    var embedCode = embedCodes[currentIndex];

    oplayer = OO.Player.create('playerwrapper', embedCode, {
        width: '100%',
        height: '100%',
        layout: 'chromeless',
        autoplay: true,
        adSetCode:'customaddset'
    });
    oplayer.mb.subscribe("*", "testMBevents", function(eventName) {
              /* Write all events, except for downloading and playhead time changed events, 
               * to the JavaScript console: */ 
              if (eventName != OO.EVENTS.DOWNLOADING && 
                  eventName != OO.EVENTS.PLAYHEAD_TIME_CHANGED)
                console.log(eventName);
            });

}


function onPlayButtonClicked() {

    if (oplayer.getState() == 'playing' ) {
        oplayer.pause();
    }   else if (oplayer.getState() == 'paused' || oplayer.getState() == 'stopped' ){
        oplayer.play();
    }
    else {
        return ['waiting to play'];
    };
}


function playNext() {
    onThumbButtonClicked();
    changeThumb();
}


function onThumbButtonClicked() {
    currentIndex = (currentIndex + 1) % embedCodes.length;
    oplayer.setEmbedCode(embedCodes[currentIndex]);
    oplayer.play();
}


function changeThumb() {
    if (document.getElementById("thumbButton").src == "https://" + document.domain + "/" + "images/body/relatedThumb.jpeg") 
        {
            document.getElementById("thumbButton").src = "images/body/relatedThumb1.jpeg";
        }
        else 
        {
            document.getElementById("thumbButton").src = "images/body/relatedThumb.jpeg";
        }
    }


OO.ready(function (OO) {
    var playButton = document.getElementById("playButton");
    playButton.disabled = false;
    playButton.onclick = onPlayButtonClicked;

    var thumbButton = document.getElementById("thumbButton");
    thumbButton.disabled = false;
    thumbButton.onclick = playNext;

    var nextButton = document.getElementById("nextButton");
    nextButton.disabled = false;
    nextButton.onclick = playNext;

    createPlayer(OO);

});


function receiveMessage(e) {
// Notification from default.html
console.log("from parent", e.data);
}

window.attachEvent("onmessage", receiveMessage);
