

<?php

$query="SELECT CURTIME();";
$res=mysql_query($query);
$row=mysql_fetch_row($res);
$t=$row[0];
?>

<div align="left" id="pdate" ></div>
<div align="left" id="ptime">Time (IST) <?php echo $t?></div>

<script language="Javascript">
var m_names = new Array("January", "February", "March", 
"April", "May", "June", "July", "August", "September", 
"October", "November", "December");

var d = new Date();
var curr_date = d.getDate();
var sup = "";
if (curr_date == 1 || curr_date == 21 || curr_date ==31)
   {
   sup = "st";
   }
else if (curr_date == 2 || curr_date == 22)
   {
   sup = "nd";
   }
else if (curr_date == 3 || curr_date == 23)
   {
   sup = "rd";
   }
else
   {
   sup = "th";
   }

var curr_month = d.getMonth();
var curr_year = d.getFullYear();
document.getElementById("pdate").innerHTML=m_names[curr_month]+" "+ curr_date + "<SUP>" + sup + "</SUP> "+ " "+ curr_year;

///////////////document.getElementById("ptime").innerHTML="Time (IST) "+h+":"+mm+":"+ss+":"+ampm;
var tt=document.getElementById("ptime").innerHTML;

if(tt.indexOf("am")==-1&&tt.indexOf("pm")==-1)
	{
	tt=tt+":am";
	}


//alert(tt);
h1=tt.indexOf(":",tt.lastIndexOf(" "));
m1=tt.indexOf(":",h1+1)
s1=tt.indexOf(":",m1+1);
//alert(h1);

//alert(tt.lastIndexOf(" "));
var hh=tt.substring(tt.lastIndexOf(" "),h1);
var mm=tt.substring(h1+1,m1);
var ss=tt.substring(m1+1,s1);
var ampm=tt.substring(tt.lastIndexOf(":")+1,tt.length);
var len=tt.length;
//alert(hh);


h=parseInt(hh,10);
m=parseInt(mm,10);
s=parseInt(ss,10);
//alert(h);
if(h>12)
	{
	ampm="pm";
	h=h-12;
	}
s=s+1;
if(s==60)
	{
	m=m+1;
	s=0;
	if(m==60)
		{
		m=0;
		h=h+1;
		if(h==13)
			h=1;
		if(h==12)
			{
			h=12;
			if(ampm=="am")
				ampm="pm";
			else
				ampm="am";
			}
		}
	}
mm=""+m;
ss=""+s;
if(mm.length<2)
	mm="0"+mm;
if(ss.length<2)
	ss="0"+ss;
document.getElementById("ptime").innerHTML="Time (IST) "+h+":"+mm+":"+ss+":"+ampm;
to=setTimeout("times()",1000);

function times()
{
<!--
var m_names = new Array("January", "February", "March", 
"April", "May", "June", "July", "August", "September", 
"October", "November", "December");

var d = new Date();
var curr_date = d.getDate();
var sup = "";
if (curr_date == 1 || curr_date == 21 || curr_date ==31)
   {
   sup = "st";
   }
else if (curr_date == 2 || curr_date == 22)
   {
   sup = "nd";
   }
else if (curr_date == 3 || curr_date == 23)
   {
   sup = "rd";
   }
else
   {
   sup = "th";
   }

var curr_month = d.getMonth();
var curr_year = d.getFullYear();
document.getElementById("pdate").innerHTML=m_names[curr_month]+" "+ curr_date + "<SUP>" + sup + "</SUP> "+ " "+ curr_year;

///////////////document.getElementById("ptime").innerHTML="Time (IST) "+h+":"+mm+":"+ss+":"+ampm;
var tt=document.getElementById("ptime").innerHTML;

if(tt.indexOf("am")==-1&&tt.indexOf("pm")==-1)
	{
	tt=tt+":am";
	}


//alert(tt);
h1=tt.indexOf(":",tt.lastIndexOf(" "));
m1=tt.indexOf(":",h1+1)
s1=tt.indexOf(":",m1+1);
//alert(h1);

//alert(tt.lastIndexOf(" "));
var hh=tt.substring(tt.lastIndexOf(" "),h1);
var mm=tt.substring(h1+1,m1);
var ss=tt.substring(m1+1,s1);
var ampm=tt.substring(tt.lastIndexOf(":")+1,tt.length);
var len=tt.length;
//alert(hh);


h=parseInt(hh,10);
m=parseInt(mm,10);
s=parseInt(ss,10);
//alert(h);
if(h>12)
	{
	ampm="pm";
	h=h-12;
	}
s=s+1;
if(s==60)
	{
	m=m+1;
	s=0;
	if(m==60)
		{
		m=0;
		h=h+1;
		if(h==13)
			h=1;
		if(h==12)
			{
			h=12;
			if(ampm=="am")
				ampm="pm";
			else
				ampm="am";
			}
		}
	}
mm=""+m;
ss=""+s;
if(mm.length<2)
	mm="0"+mm;
if(ss.length<2)
	ss="0"+ss;
document.getElementById("ptime").innerHTML="Time (IST) "+h+":"+mm+":"+ss+":"+ampm;
to=setTimeout("times()",1000);
}

</script>