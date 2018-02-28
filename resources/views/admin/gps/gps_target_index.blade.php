@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">Map: <span style="color: red;font-weight: 900">{!!Session('d_email')!!}</span>
                

                <div class="panel-body">
                   <script src="http://maps.google.com/maps?file=api&v=2&sensor=true&key=AIzaSyBOh3pemK7ByRPf2Ez5xX1vXUTt6DsI8ko" type="text/javascript"></script>


 
<script type="text/javascript">
	
  function load() {
    if (GBrowserIsCompatible()) {

      // Get map (Version 2)
      var map = new GMap2(document.getElementById("map"));
      // map.setMapType(G_H
      // map.addControl(new GMapTypeControl());
      map.setUIToDefault(); // Default user interface

      // Get course
      GDownloadUrl("http://supermarko.arcazur.com/gps/driver_target", function(data) {
        var xml = GXml.parse(data);
        var markers = xml.documentElement.getElementsByTagName("marker");
        var points = new Array(0); // For polyline
        if(markers.length == 0){

        	window.alert('no result found, maybe no orders or no driver markers yet');
        }
        // Loop through the markers
        for (var i = 0; i < markers.length; i++) {
          var datetime = markers[i].getAttribute("datetime");
          var info = markers[i].getAttribute("adress");
          var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
                                  parseFloat(markers[i].getAttribute("lng"))); // For markers
          points[i] = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
                                  parseFloat(markers[i].getAttribute("lng"))); // For polyline
          var marker = createMarker(point, datetime, info);
          map.addOverlay(marker);
        } // End loop
        // Polyline
        var polyline = new GPolyline(points, "#ff0000", 2);
        map.addOverlay(polyline);
        // Set map centre (to last point), zoom level
        map.setCenter(point, 16);
        // InfoWindow HTML (last marker)
        var html = "";
        html += "<div id=\"infobox\">";
      
        html += "<br />";
        html += info;
        html += "<br /><br />";
       
        html += "<div>";
        map.openInfoWindowHtml(point, html);
      });
    }
  }

  // General markers
  function createMarker(point, datetime, info) {
    var marker = new GMarker(point);
    var html = "";
    html += "<div id=\"infobox\">";
   
    html += "<br />";
    html += info;
    html += "<br /><br />";
   
    html += "<div>";
    GEvent.addListener(marker, 'click', function() {
      marker.openInfoWindowHtml(html);
    });
    return marker;
  }



</script>


<script type="text/javascript">
	var Mint = new Object();
Mint.save = function() 
{
	var now		= new Date();
	var debug	= false; // this is set by php 
	if (window.location.hash == '#Mint:Debug') { debug = true; };
	var path	= 'http://www.patricktaylor.com/mint/?record&key=3238307958503034514843444674543739497753746d31354748765a31';
	path 		= path.replace(/^https?:/, window.location.protocol);
	
	// Loop through the different plug-ins to assemble the query string
	for (var developer in this) 
	{
		for (var plugin in this[developer]) 
		{
			if (this[developer][plugin] && this[developer][plugin].onsave) 
			{
				path += this[developer][plugin].onsave();
			};
		};
	};
	// Slap the current time on there to prevent caching on subsequent page views in a few browsers
	path += '&'+now.getTime();
	
	// Redirect to the debug page
	if (debug) { window.open(path+'&debug&errors', 'MintLiveDebug'+now.getTime()); return; };
	
	var ie = /*@cc_on!@*/0;
	if (!ie && document.getElementsByTagName && (document.createElementNS || document.createElement))
	{
		var tag = (document.createElementNS) ? document.createElementNS('http://www.w3.org/1999/xhtml', 'script') : document.createElement('script');
		tag.type = 'text/javascript';
		tag.src = path + '&serve_js';
		document.getElementsByTagName('head')[0].appendChild(tag);
	}
	else if (document.write)
	{
		document.write('<' + 'script type="text/javascript" src="' + path + '&amp;serve_js"><' + '/script>');
	};
};
if (!Mint.SI) { Mint.SI = new Object(); }
Mint.SI.Referrer = 
{
	onsave	: function() 
	{
		var encoded = 0;
		if (typeof Mint_SI_DocumentTitle == 'undefined') { Mint_SI_DocumentTitle = document.title; }
		else { encoded = 1; };
		var referer		= (window.decodeURI)?window.decodeURI(document.referrer):document.referrer;
		var resource	= (window.decodeURI)?window.decodeURI(document.URL):document.URL;
		return '&referer=' + escape(referer) + '&resource=' + escape(resource) + '&resource_title=' + escape(Mint_SI_DocumentTitle) + '&resource_title_encoded=' + encoded;
	}
};
if (!Mint.SI) { Mint.SI = new Object(); }
Mint.SI.UserAgent007 = 
{
	versionHigh			: 16,
	flashVersion		: 0,
	resolution			: '0x0',
	detectFlashVersion	: function () 
	{
		var ua = navigator.userAgent.toLowerCase();
		if (navigator.plugins && navigator.plugins.length) 
		{
			var p = navigator.plugins['Shockwave Flash'];
			if (typeof p == 'object') 
			{
				for (var i=this.versionHigh; i>=3; i--) 
				{
					if (p.description && p.description.indexOf(' ' + i + '.') != -1) { this.flashVersion = i; break; }
				}
			}
		}
		else if (ua.indexOf("msie") != -1 && ua.indexOf("win")!=-1 && parseInt(navigator.appVersion) >= 4 && ua.indexOf("16bit")==-1) 
		{
			var vb = '<scr' + 'ipt language="VBScript"\> \nOn Error Resume Next \nDim obFlash \nFor i = ' + this.versionHigh + ' To 3 Step -1 \n   Set obFlash = CreateObject("ShockwaveFlash.ShockwaveFlash." & i) \n   If IsObject(obFlash) Then \n      Mint.SI.UserAgent007.flashVersion = i \n      Exit For \n   End If \nNext \n<'+'/scr' + 'ipt\> \n';
			document.write(vb);
		}
		else if (ua.indexOf("webtv/2.5") != -1) this.flashVersion = 3;
		else if (ua.indexOf("webtv") != -1) this.flashVersion = 2;
		return this.flashVersion;
	},
	onsave				: function() 
	{
		if (this.flashVersion == this.versionHigh) { this.flashVersion = 0; };
		this.resolution = screen.width+'x'+screen.height;
		return '&resolution=' + this.resolution + '&flash_version=' + this.flashVersion;
	}
};
Mint.SI.UserAgent007.detectFlashVersion();
Mint.save();
</script>
</head>

<body onload="load()" onunload="GUnload()">
<center>
<div id="wrap" class="col-md-12 text-center">

<div id="map" style="margin-bottom: 10px; border: 1px solid #000; width: 900px; height: 500px"></div>


</div>
</center>

<!-- Tracking V 3.6 //-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-36884416-3', 'patricktaylor.com');
  ga('send', 'pageview');

</script>

<script type="text/javascript">
<!--
document.write('<img src="/cgi-bin/axs/ax.pl?mode=img&ref=');
document.write( escape( document.referrer ) );
document.write('" height="1" width="1" style="display:none" alt="" />');
// -->
</script><noscript>
<img src="/cgi-bin/axs/ax.pl?mode=img" height="1" width="1" style="display:none" alt="" />
</noscript>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
