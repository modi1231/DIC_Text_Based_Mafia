<?php

///////////////////////////////////////////////////////////////////////////////

function sitefilter($tekst) 
{ 

$badsite = array ("bootleggers", "vato loco", "the vato loco", "vato-loco", "crime wars", "gangster basics", "gangster legends", "boot-leggers"); 

$countsite = count($badsite); 

for ($var = 0; $var < $countsite; $var++ ) 
{ 
$tekst = eregi_replace($badsite[$var], 'No Advertisement', $tekst); 
} 

return $tekst; 

}

/////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////

function smilie($tekst) 
{ 

$smilie = array ("[vid][/vid]",":arrow:", ":d", ":s", "8)", ";(", "8|", ":evil:", ":!:", ":idea:", ":lol:", ":mad:", ":?:", ":redface:", ":rolleyes:", ":(", ":)", ":o", ":p", ":twisted:", ";)", ":tdn:", ":tup:"); 

$img = array (
"<img src=\"img/smile/youtube.gif\">",
"<img src=\"img/smile/arrow.gif\">",
"<img src=\"img/smile/biggrin.gif\">", 
"<img src=\"img/smile/confused.gif\">", 
"<img src=\"img/smile/cool.gif\">", 
"<img src=\"img/smile/cry.gif\">", 
"<img src=\"img/smile/eek.gif\">", 
"<img src=\"img/smile/evil.gif\">", 
"<img src=\"img/smile/exclaim.gif\">",
"<img src=\"img/smile/idea.gif\">", 
"<img src=\"img/smile/lol.gif\">", 
"<img src=\"img/smile/mad.gif\">", 
"<img src=\"img/smile/question.gif\">", 
"<img src=\"img/smile/redface.gif\">", 
"<img src=\"img/smile/rolleyes.gif\">", 
"<img src=\"img/smile/sad.gif\">", 
"<img src=\"img/smile/smile.gif\">", 
"<img src=\"img/smile/surprised.gif\">", 
"<img src=\"img/smile/toungue.gif\">", 
"<img src=\"img/smile/twisted.gif\">", 
"<img src=\"img/smile/wink.gif\">", 
"<img src=\"img/smile/tdown.gif\">", 
"<img src=\"img/smile/tup.gif\">"
);

$aantal = count($smilie); 

for ($var = 0; $var < $aantal; $var++ ) 
{ 

$tekst = str_replace($smilie[$var], $img[$var], $tekst );

} 

return $tekst; 
}

function smilielist(){
echo "
<a href=\"javascript:smile('message','[vid][/vid]')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/youtube.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':arrow:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/arrow.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':d')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/biggrin.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':s')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/confused.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message','8)')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/cool.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',';\(')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/cry.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message','8|')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/eek.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':evil:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/evil.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':!:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/exclaim.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':idea:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/idea.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':lol:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/lol.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':mad:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/mad.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':?:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/question.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':redface:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/redface.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':rolleyes:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/rolleyes.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':)')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/smile.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':o')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/surprised.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':p')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/toungue.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':twisted:')\"><img src=\"img/smile/twisted.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',';)')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/wink.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':tdn:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/tdown.gif\" border=\"0\"></a>
<a href=\"javascript:smile('message',':tup:')\" onFocus=\"if(this.blur)this.blur()\"><img src=\"img/smile/tup.gif\" border=\"0\"></a>";
}// end function

////////////////////////////////////// bb codes ///////////////////////////////

function bbcodes($reactie) 
    { 
        
    // Vet, schuin, etc            V
    $reactie = preg_replace("/\[b\](.+?)\[\/b\]/is",'<strong>\1</strong>', $reactie);
    $reactie = preg_replace("/\[i\](.+?)\[\/i\]/is",'<em>\1</em>', $reactie);
    $reactie = preg_replace("/\[u\](.+?)\[\/u\]/is",'<u>\1</u>', $reactie);
    $reactie = preg_replace("/\[s\](.+?)\[\/s\]/is",'<s>\1</s>', $reactie);
	$reactie = preg_replace("/\[move\](.+?)\[\/move\]/is",'<marquee behavior=alternate>\1</marquee>', $reactie);

	//quote box.	 
	$reactie = preg_replace("/\[quote\](.+?)\[\/quote\]/is",'<br /><center><fieldset style="color: #000000; border: 1px solid #000000; width: 90%; text-align: left; padding: 5px;">
<legend style="color: #999999; font-weight: bold;">Quote.</legend>\1</fieldset></center><br />', $reactie);

   //in game tag.	 
	$reactie = preg_replace("/\[user\](.+?)\[\/user\]/is",'<a href="view_profile.php?name=\1">\1</a>', $reactie);
	$reactie = preg_replace("/\[gang\](.+?)\[\/gang\]/is",'<a href="view_gang.php?name=\1">\1</a>', $reactie);	 	
		    $reactie = preg_replace ("/\[topic=(.*)\](.*)\[\/topic\]/", '<a href="forum_view.php?id=\1">\\2</topic>', $reactie);
					    $reactie = preg_replace ("/\[link=(.*)\](.*)\[\/link\]/", '<a href="\1.php">\\2</link>', $reactie);


		
    // Color, font & size        V
    $reactie = preg_replace ("#\[color=(\#[0-9A-F]{6}|[a-z\-]+)\](.*?)\[/color\]#si", "<font color=\"\\1\">\\2</font>", $reactie);
    $reactie = preg_replace ("/\[font=(.*)\](.*)\[\/font\]/", "<font face=\"\\1\">\\2</font>", $reactie);
    $reactie = preg_replace ("/\[size=(.*)\](.*)\[\/size\]/", "<font size=\"\\1\">\\2</font>", $reactie);
	
    // Diversen               V
    $reactie = str_replace ("[left]", "<div align=left>", $reactie);
    $reactie = str_replace ("[/left]", "</div>", $reactie);
    $reactie = str_replace ("[center]", "<div align=\"center\">", $reactie);
    $reactie = str_replace ("[/center]", "</div>", $reactie);
    $reactie = str_replace ("[right]", "<div align=\"right\">", $reactie);
    $reactie = str_replace ("[/right]", "</div>", $reactie);
    
    // Horizontal Line     V
    $reactie = str_replace ("[hr]","<hr color=\"#000000\" noshade />",$reactie);
    $reactie = preg_replace("/\[img\](.+?)\[\/img\]/", '<img src="$1">', $reactie); 
    $reactie = preg_replace("/\[vid\](.+?)\[\/vid\]/", '<object width="480" height="295"><param name="movie" value="http://www.youtube.com/v/\1&hl=en&fs=1&color1=0x2b405b&color2=0x6b8ab6&autoplay=1&rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/\1&hl=en&fs=1&color1=0x2b405b&color2=0x6b8ab6&autoplay=1&rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="295"></embed></object>', $reactie); 
	
	
	 $reactie = preg_replace("/\[bbc\](.+?)\[\/bbc\]/", '  <embed type="application/x-shockwave-flash" src="http://www.bbc.co.uk/emp/9player.swf?revision=10344_10570" style="" id="bbc_emp_embed_bip-play-emp" name="bbc_emp_embed_bip-play-emp" bgcolor="#000000" quality="high" wmode="default" allowfullscreen="true" allowscriptaccess="always" flashvars="embedReferer=&embedPageUrl=http://www.bbc.co.uk/iplayer/episode/\1/Top_Gear_Series_13_Episode_1_(new_series)/?t=00m01s&domId=bip-play-emp&config=http://www.bbc.co.uk/emp/iplayer/config.xml&playlist=http://www.bbc.co.uk/iplayer/playlist/\1&holdingImage=http://node2.bbcimg.co.uk/iplayer/images/episode\1_640_360.jpg&config_settings_bitrateFloor=0&config_settings_bitrateCeiling=2500&config_settings_transportHeight=35&config_settings_cueItem=b00ldy1k:875&config_settings_showPopoutCta=false&config_messages_diagnosticsMessageBody=Insufficient bandwidth to stream this programme. Try downloading instead, or see our diagnostics page.&config_settings_language=en&guidance=unset" width="480" height="295"> 
', $reactie); 
	 
	 
	 $reactie = preg_replace("/\[360\](.+?)\[\/360\]/", ' <iframe src="http://gamercard.xbox.com/\1.card" scrolling="no" frameBorder="0" height="140" width="204">\1.</iframe></body>
', $reactie); 
    
    // Lijst - Unorderd                V
    $reactie = str_replace ("[list]","<ul>",$reactie);
    $reactie = str_replace ("[*]","<li>",$reactie);
    $reactie = str_replace ("[/list]","</li></ul>",$reactie);
    
	// list orderd.
	
	$reactie = str_replace ("[order]","<ol>",$reactie);
    $reactie = str_replace ("[*]","<li>",$reactie);
    $reactie = str_replace ("[/order]","</li></ol>",$reactie);
	   
    return $reactie; 
    } 

	function money($value){
		
		return "£ ".number_format($value).",-";

	}
	
	function crimemaketime($until){

   $now = time();
   $difference = $until - $now;

   $days = floor($difference/86400);
   $difference = $difference - ($days*86400);

   $hours = floor($difference/3600);
   $difference = $difference - ($hours*3600);

   $minutes = floor($difference/60);
   $difference = $difference - ($minutes*60);

   $seconds = $difference;
   $output = "$minutes Minutes and $seconds Seconds";

   return $output;
   
}

function maketime($until){

   $now = time();
   $difference = $until - $now;

   $days = floor($difference/86400);
   $difference = $difference - ($days*86400);

   $hours = floor($difference/3600);
   $difference = $difference - ($hours*3600);

   $minutes = floor($difference/60);
   $difference = $difference - ($minutes*60);

   $seconds = $difference;
   $output = "$hours:$minutes:$seconds";

   return $output;


  }
  
    function maketime1($last){
$timenow = time();
			if($last>$timenow){
					$order = $last-$timenow;
						while($order >= 60){
							$order = $order-60;
							$ordermleft++;
						}
						while($ordermleft >= 60){
							$ordermleft = $ordermleft-60;
							$orderhleft++;
						}
						
						if($ordermleft == 0){
							$ordermleft = "";
						} else {
						$ordermleft = "$ordermleft Minutes";
						}
						if($orderhleft == 0){
							$orderhleft = "";
						} else {
						$orderhleft = "$orderhleft Hours";
						}	
return "$orderhleft $ordermleft $order Seconds";
}}

  function secureint($intstr) {
    settype($instr,'integer');
    $intint=sprintf("%d",$intstr);
    $intint=intval($intint);
    return $intint;
  }
  function securestr($oldstr) {
    $oldstr=trim($oldstr);
    $oldstr=strip_tags($oldstr);
    $oldstr=sprintf("%s",$oldstr);
    addslashes($oldstr);
    return $oldstr;
  }





function checkEmail($str) // This function is going to help us filter out bad email from the good one and it makes sure the email enter is in the format of as@as.com
{
	return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
}


function send_mail($from,$to,$subject,$body)// this is a send email function that will help us send email to the registed users.
{
	$headers = '';
	$headers .= "From: $from\n";
	$headers .= "Reply-to: $from\n";
	$headers .= "Return-Path: $from\n";
	$headers .= "Message-ID: <" . md5(uniqid(time())) . "@" . $_SERVER['SERVER_NAME'] . ">\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Date: " . date('r', time()) . "\n";

	mail($to,$subject,$body,$headers);
}
?>