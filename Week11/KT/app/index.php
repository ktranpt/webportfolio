<!DOCTYPE html>
<meta charset="utf-8">
<title>Chatbot System</title>
<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjZDv7RJZJsg8wzFx1X-dcLFJpZ0B21f4
&libraries=places"></script>

<style>
  * {
    font-family: Verdana, Arial, sans-serif;
  }
  a:link {
    color:#000;
    text-decoration: none;
  }
  a:visited {
    color:#000;
  }
  a:hover {
    color:#33F;
  }
  .button {
    background: -webkit-linear-gradient(top,#008dfd 0,#0370ea 100%);
    border: 1px solid #076bd2;
    border-radius: 3px;
    color: #fff;
    display: none;
    font-size: 13px;
    font-weight: bold;
    line-height: 1.3;
    padding: 8px 25px;
    text-align: center;
    text-shadow: 1px 1px 1px #076bd2;
    letter-spacing: normal;
  }
  .center {
    padding: 10px;
    text-align: center;
  }
  .final {
    color: black;
    padding-right: 3px; 
  }
  .interim {
    color: gray;
  }
  .info {
    font-size: 14px;
    text-align: center;
    color: #777;
    display: none;
  }
  .right {
    float: right;
  }
  .sidebyside {
    display: inline-block;
    width: 45%;
    min-height: 40px;
    text-align: left;
    vertical-align: top;
  }
  #btn {
	  background-color: #008CBA; /* Blue */
	  border: none;
	  color: white;
	  padding: 15px 32px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 16px;
  } 
  
  
  #headline {
    font-size: 40px;
    font-weight: 300;
  }
  #info {
    font-size: 20px;
    text-align: center;
    color: #777;
    visibility: hidden;
  }
  #results {
    font-size: 14px;
    font-weight: bold;
    border: 1px solid #ddd;
    padding: 15px;
    text-align: left;
    min-height: 150px;
  }
  #start_button {
    border: 0;
    background-color:transparent;
    padding: 0;
  }
</style>
<body>
<h1 class="center" id="headline">
  <a href="http://dvcs.w3.org/hg/speech-api/raw-file/tip/speechapi.html">
    Chatbot System</a></h1>
<div id="info">
  <p id="info_start">Click on the microphone icon and begin speaking.</p>
  <p id="info_speak_now">Speak now.</p>
  <p id="info_no_speech">No speech was detected. You may need to adjust your
    <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
      microphone settings</a>.</p>
  <p id="info_no_microphone" style="display:none">
    No microphone was found. Ensure that a microphone is installed and that
    <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
    microphone settings</a> are configured correctly.</p>
  <p id="info_allow">Click the "Allow" button above to enable your microphone.</p>
  <p id="info_denied">Permission to use microphone was denied.</p>
  <p id="info_blocked">Permission to use microphone is blocked. To change,
    go to chrome://settings/contentExceptions#media-stream</p>
  <p id="info_upgrade">Web Speech API is not supported by this browser.
     Upgrade to <a href="//www.google.com/chrome">Chrome</a>
     version 25 or later.</p>
</div>
<div class="right">
  <button id="start_button" onclick="startButton(event)">
    <img id="start_img" src="mic.gif" alt="Start"></button>
</div>
<div id="results">
  <span id="final_span" class="final"></span>
  <span id="interim_span" class="interim"></span>
  <p>
</div>
<div class="center">
  <div class="sidebyside" style="text-align:right">
    <button id="copy_button" class="button" onclick="copyButton()">
      Copy and Paste</button>
    <div id="copy_info" class="info">
      Press Control-C to copy text.<br>(Command-C on Mac.)
    </div>
  </div>
  <div class="sidebyside">
    <button id="email_button" class="button" onclick="emailButton()">
      Create Email</button>
    <div id="email_info" class="info">
      Text sent to default email application.<br>
      (See chrome://settings/handlers to change.)
    </div>
  </div>
  <p>
  <div id="div_language">
    <select id="select_language" onchange="updateCountry()"></select>
    &nbsp;&nbsp;
    <select id="select_dialect"></select>
  </div>
</div>


<input type="text" id="say" style="width:500px;height:50px; font-size:20pt"/>
<input type="button" id="btn" onclick="directShow();" value="I say"/>
<div id="news"></div>
<p id="location"></p>

<div id="googleMap" style="width:500px;height:380px;"></div>
<div id="map" style="width:500px;height:380px;"></div>

</div>

<script>
      function directShow(){
      	var str = document.getElementById("say");
      	texttospeech(str.value);
      
      }
</script>

<script>

var langs =
[['Afrikaans',       ['af-ZA']],
 ['Bahasa Indonesia',['id-ID']],
 ['Bahasa Melayu',   ['ms-MY']],
 ['Català',          ['ca-ES']],
 ['Čeština',         ['cs-CZ']],
 ['Deutsch',         ['de-DE']],
 ['English',         ['en-AU', 'Australia'],
                     ['en-CA', 'Canada'],
                     ['en-IN', 'India'],
                     ['en-NZ', 'New Zealand'],
                     ['en-ZA', 'South Africa'],
                     ['en-GB', 'United Kingdom'],
                     ['en-US', 'United States']],
 ['Español',         ['es-AR', 'Argentina'],
                     ['es-BO', 'Bolivia'],
                     ['es-CL', 'Chile'],
                     ['es-CO', 'Colombia'],
                     ['es-CR', 'Costa Rica'],
                     ['es-EC', 'Ecuador'],
                     ['es-SV', 'El Salvador'],
                     ['es-ES', 'España'],
                     ['es-US', 'Estados Unidos'],
                     ['es-GT', 'Guatemala'],
                     ['es-HN', 'Honduras'],
                     ['es-MX', 'México'],
                     ['es-NI', 'Nicaragua'],
                     ['es-PA', 'Panamá'],
                     ['es-PY', 'Paraguay'],
                     ['es-PE', 'Perú'],
                     ['es-PR', 'Puerto Rico'],
                     ['es-DO', 'República Dominicana'],
                     ['es-UY', 'Uruguay'],
                     ['es-VE', 'Venezuela']],
 ['Euskara',         ['eu-ES']],
 ['Français',        ['fr-FR']],
 ['Galego',          ['gl-ES']],
 ['Hrvatski',        ['hr_HR']],
 ['IsiZulu',         ['zu-ZA']],
 ['Íslenska',        ['is-IS']],
 ['Italiano',        ['it-IT', 'Italia'],
                     ['it-CH', 'Svizzera']],
 ['Magyar',          ['hu-HU']],
 ['Nederlands',      ['nl-NL']],
 ['Norsk bokmål',    ['nb-NO']],
 ['Polski',          ['pl-PL']],
 ['Português',       ['pt-BR', 'Brasil'],
                     ['pt-PT', 'Portugal']],
 ['Română',          ['ro-RO']],
 ['Slovenčina',      ['sk-SK']],
 ['Suomi',           ['fi-FI']],
 ['Svenska',         ['sv-SE']],
 ['Türkçe',          ['tr-TR']],
 ['български',       ['bg-BG']],
 ['Pусский',         ['ru-RU']],
 ['Српски',          ['sr-RS']],
 ['한국어',            ['ko-KR']],
 ['中文',             ['cmn-Hans-CN', '普通话 (中国大陆)'],
                     ['cmn-Hans-HK', '普通话 (香港)'],
                     ['cmn-Hant-TW', '中文 (台灣)'],
                     ['yue-Hant-HK', '粵語 (香港)']],
 ['日本語',           ['ja-JP']],
 ['Lingua latīna',   ['la']]];
for (var i = 0; i < langs.length; i++) {
  select_language.options[i] = new Option(langs[i][0], i);
}
select_language.selectedIndex = 6;
updateCountry();
select_dialect.selectedIndex = 6;
showInfo('info_start');
function updateCountry() {
  for (var i = select_dialect.options.length - 1; i >= 0; i--) {
    select_dialect.remove(i);
  }
  var list = langs[select_language.selectedIndex];
  for (var i = 1; i < list.length; i++) {
    select_dialect.options.add(new Option(list[i][1], list[i][0]));
  }
  select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
}

var create_email = false;
var final_transcript = '';
var recognizing = false;
var ignore_onend;
var start_timestamp;
var speakingStatus;
rate=1;
volume=1;
	

if (!('webkitSpeechRecognition' in window)) {
  upgrade();
} else {
	  	
	  start_button.style.display = 'inline-block';
	  var recognition = new webkitSpeechRecognition();


	  recognition.continuous = true;
	  recognition.interimResults = true;
	  
	  recognition.onstart = function() {
	    recognizing = true;
	    showInfo('info_speak_now');
	    start_img.src = 'mic-animate.gif';
		
	  };
	  recognition.onerror = function(event) {
	    if (event.error == 'no-speech') {
	      start_img.src = 'mic.gif';
	      showInfo('info_no_speech');
	      ignore_onend = true;
	    }
	    if (event.error == 'audio-capture') {
	      start_img.src = 'mic.gif';
	      showInfo('info_no_microphone');
	      ignore_onend = true;
	    }
	    if (event.error == 'not-allowed') {
	      if (event.timeStamp - start_timestamp < 100) {
	        showInfo('info_blocked');
	      } else {
	        showInfo('info_denied');
	      }
	      ignore_onend = true;
	    }
	  };
	  recognition.onend = function() {
	    recognizing = false;
	    if (ignore_onend) {
	      return;
	    }
	    start_img.src = 'mic.gif';
	    if (!final_transcript) {
	      showInfo('info_start');
	      return;
	    }
	    showInfo('');
	    if (window.getSelection) {
	      window.getSelection().removeAllRanges();
	      var range = document.createRange();
	      range.selectNode(document.getElementById('final_span'));
	      window.getSelection().addRange(range);
	    }
	    if (create_email) {
	      create_email = false;
	      createEmail();
	    }
	  };
	  recognition.onresult = function(event) {
	    var interim_transcript = '';
	    for (var i = event.resultIndex; i < event.results.length; ++i) {
	      if (event.results[i].isFinal) {
	        final_transcript = event.results[i][0].transcript;

			texttospeech(final_transcript);

			speakingStatus = "stopped";
			
			
	      } else {
	        interim_transcript = event.results[i][0].transcript;
	      }
	    }
	    final_transcript = capitalize(final_transcript);
	    final_span.innerHTML = linebreak(final_transcript);
	    interim_span.innerHTML = linebreak(interim_transcript);
	    if (final_transcript || interim_transcript) {
	      showButtons('inline-block');
	    }
	  };
}


function upgrade() {
  start_button.style.visibility = 'hidden';
  showInfo('info_upgrade');
}
	
var two_line = /\n\n/g;
var one_line = /\n/g;
function linebreak(s) {
  return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
}
var first_char = /\S/;
function capitalize(s) {
  return s.replace(first_char, function(m) { return m.toUpperCase(); });
}
	
function createEmail() {
  var n = final_transcript.indexOf('\n');
  if (n < 0 || n >= 80) {
    n = 40 + final_transcript.substring(40).indexOf(' ');
  }
  var subject = encodeURI(final_transcript.substring(0, n));
  var body = encodeURI(final_transcript.substring(n + 1));
  window.location.href = 'mailto:?subject=' + subject + '&body=' + body;
}
function copyButton() {
  if (recognizing) {
    recognizing = false;
    recognition.stop();
  }
  copy_button.style.display = 'none';
  copy_info.style.display = 'inline-block';
  showInfo('');
}
function emailButton() {
  if (recognizing) {
    create_email = true;
    recognizing = false;
    recognition.stop();
  } else {
    createEmail();
  }
  email_button.style.display = 'none';
  email_info.style.display = 'inline-block';
  showInfo('');
}
function startButton(event) {

	speakingStatus = "stopped";
  if (recognizing) {
    recognition.stop();
    return;
  }
  final_transcript = '';
  recognition.lang = select_dialect.value;
  recognition.start();
  ignore_onend = false;
  final_span.innerHTML = '';
  interim_span.innerHTML = '';
  start_img.src = 'mic-slash.gif';
  showInfo('info_allow');
  showButtons('none');
  start_timestamp = event.timeStamp;
}
function showInfo(s) {
  if (s) {
    for (var child = info.firstChild; child; child = child.nextSibling) {
      if (child.style) {
        child.style.display = child.id == s ? 'inline' : 'none';
      }
    }
    info.style.visibility = 'visible';
  } else {
    info.style.visibility = 'hidden';
  }
}
var current_style;
function showButtons(style) {
  if (style == current_style) {
    return;
  }
  current_style = style;
  copy_button.style.display = style;
  email_button.style.display = style;
  copy_info.style.display = 'none';
  email_info.style.display = 'none';
}

//Web Speech API
function texttospeech(dialog){

    voices = window.speechSynthesis.getVoices();
    console.log('Get voices ' + voices.length.toString());
    for(var i = 0; i < voices.length; i++ ) {
	     console.log("Voice " + i.toString() + ' ' + voices[i].name);
    
	}
     
	   var showText ="Sorry, I don't get that";
	   var sayText ="Sorry, I don't get that";
     var cnt = 0;
	   document.getElementById("news").innerHTML="";
	   
//Introduction	
//Default answer
    if(dialog=="hi"||dialog=="hello")
    {
      showText = sayText ="Hello, I'm Alex. How can I help you?";  	 
    }
    else if(dialog=="how to use the system" || dialog=="help")
    {	
      showText = sayText = "I'm a virtual assistant, I'm still learning";
    }
    else if(dialog=="show my location" || dialog=="Show my location")
    {
      var x = document.getElementById("location");
      getMyLocation();
      showText = "I am checking your location, wait a minute";
      sayText=showText;
    }
    else if(dialog=="find the nearest hotel" || dialog=="Find the nearest hotel")
    {
      showHotel();
      showText = sayText = "Showing the nearest hotels";
    }


    else if(dialog == "I want to book hotel")
    {
      cnt = 1;
      showText = sayText = "Where do you want to stay?";
    }
    else if (dialog == "Hobart")
    {
      showText = sayText = "Which date do you want to travel?";
    }
    else if (cnt =1)
    {
        if (dialog == "Friday")
        {
          showHotel();
          showText = sayText = "Showing the nearest hotels";
        }
    }

  if (dialog == "show me the top hotel" || dialog == "show me the top Hotel")
    {
        $.ajaxSetup({async: false});
          showText = "";
          sayText = "";
          $.ajax({
          url: "hotel.php",
          data: {text: dialog},
          success: function (data) 
          {
            showText = sayText = "The top 3 hotels are " + data;
          }
        });
    }
    if (dialog == "thank you" || dialog == "Thank you")
    {
        $.ajaxSetup({async: false});
          showText = "";
          sayText = "";
          $.ajax({
          url: "/KT/app/senti_php/demo.php",
          type: "get",
          data: {'message': dialog},
          success: function (data) 
          {
            if (data == 'pos') {
              showText = sayText = "Thank you for your feedback, is there anything else can I help you with?";
            }
            else 
            {
              showText = sayText = "Thank you for your feedback!, I'm still learning";
            }
          }
        });
    }









    // if(dialog.indexOf("restaurant")!=-1 ){
    //   $.ajaxSetup({async: false});
    //   showText="";
    //   sayText="";
    //   $.ajax({
    //   url: "noun_phrase.php",
    //   data: {text: dialog},
    //   success: function (data) {
    //   nlp=data;
    //   showText="The noun phrases are : <span style='color:blue'>"+nlp+"</span>";
    //   sayText+="The noun phrases are"+ data;
    //   }
    //   });
    // }
      

//Give Answer with a speech
	 // saysomething(sayText);
		showsomething(showText);
		
		//if the computer is responding, the system stops recognising speech.
	 	var u1 = new SpeechSynthesisUtterance(sayText);
       	u1.lang = 'en-US';
       	u1.pitch = 1;
       	u1.rate = 1;
       	u1.voice = voices[0];
       	u1.voiceURI = 'native';
       	u1.volume = 6;
		
		
		//if the computer is responding, the system stops recognising speech.
		u1.onstart = function(){

			recognition.stop();
			reset();
		}
		//if the computer finishes responding, the system restarts recognising speech.
		u1.onend = function(event) {
			recognition.start();
			recognizing = true;
		 }
		
       	speechSynthesis.speak(u1);
       	console.log("Voice " + u1.voice.name);
		
     
}
</script>

<script>
//This is inicial functions
//Say some welcome speech and show this place
var x = document.getElementById("location");

window.onload=function(){
	
//Welcome Speech
	var welcomeStr = "Hello I'm Alex, welcome to Travel Agent";
	showAndsay(welcomeStr);
  	
}
	
</script>

<script>

function showAndsay(str){
	showsomething(str);
	saysomething(str);
}



//This is help user to look what the system said, like a Console
function showsomething(str){
		document.getElementById("location").innerHTML = str;
}

function saysomething(str) {
	var u = new SpeechSynthesisUtterance();
   			u.text = str ;
   			u.lang = 'en-AU';
   			u.rate = window.rate;
  			u.volume=window.volume;
  			speechSynthesis.speak(u);
}
</script>

<script>

//Calling showPOsition function
function getMyLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showMyPosition);
    } else {
      x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
//Function show current position
function showMyPosition(position) {
  // x.innerHTML = "Latitude: " + position.coords.latitude +
  // "<br>Longitude: " + position.coords.longitude;
  var myCenter = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
  var mapProp = {center:myCenter,
                zoom:17,
                mapTypeId:google.maps.MapTypeId.ROADMAP
                };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
  var marker=new google.maps.Marker({
    position:myCenter,
  });
    marker.setMap(map);
}

//Function Places API to show place at current position
var map;
var infowindow;

function showHotel() {
  navigator.geolocation.getCurrentPosition(function(position){
  var city = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  map = new google.maps.Map(document.getElementById('googleMap'), {
  center: city,
  zoom: 15
  });
  var request = {
  location: city,
  radius: 1000,
  types: ['hotel']
  };
  infowindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, callback);
  });
}

function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
    createMarker(results[i]);
    }
  }
}


function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
  map: map,
  position: place.geometry.location
  });
  google.maps.event.addListener(marker, 'click', function() {
  infowindow.setContent(place.name);
  infowindow.open(map, this);
  });
}
google.maps.event.addDomListener(window, 'load', initialize);


</script>


