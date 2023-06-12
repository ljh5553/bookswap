/*
    Original : https://dev.epiloum.net/1395 by Epiloum
    Modifier : JunHyeong Lee
    File Name : chat.js
    Format : JAVASCRIPT
    Description : script for processing chatting functions
*/

var chatManager = new function(){

	var idle 		= true;
	var interval	= 500;
	var xmlHttp		= new XMLHttpRequest();
	var finalDate	= '';

	// ajax setting
	xmlHttp.onreadystatechange = function()
	{
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{
			// parsing to JSON format
			console.log(xmlHttp.responseText);
			console.log(xmlHttp.response);
			res = JSON.parse(xmlHttp.responseText);
			finalDate = res.date;
			
			// show chatting
			chatManager.show(res.data);
			
			// idle flag on
			idle = true;
		}
	}

	// get history and new chat
	this.proc = function()
	{
		// if idle flag is true, do not process
		if(!idle)
		{
			return false;
		}

		// idle flag off
		idle = false;

		var other_user = document.getElementById('receiver').value;

		// ajax communication
		xmlHttp.open("GET", "proc.php?date=" + encodeURIComponent(finalDate) + "&user=" + encodeURIComponent(other_user), true);
		xmlHttp.send();
	}

	// show chatting function
	this.show = function(data)
	{
		var o = document.getElementById('list');
		var dt, dd;

		// add chat content to view page
		for(var i=0; i<data.length; i++)
		{
			dt = document.createElement('dt');
			dt.appendChild(document.createTextNode(data[i].sender));
			o.appendChild(dt);

			dd = document.createElement('dd');
			dd.appendChild(document.createTextNode(data[i].msg  + " (" + data[i].date + ")"));
			o.appendChild(dd);
		}

		// scroll to bottom
		o.scrollTop = o.scrollHeight;
	}

	// write chatting
	this.write = function(frm)
	{
		var xmlHttpWrite	= new XMLHttpRequest();
		var receiver		= frm.receiver.value;
		var msg				= frm.msg.value;
		var param			= [];
		
		// if receiver name or chatting is empty, do not process
		if(receiver.length == 0 || msg.length == 0)
		{
			return false;
		}
		
		// struct POST parameter
		param.push("receiver=" + encodeURIComponent(receiver));
		param.push("msg=" + encodeURIComponent(msg));
				
		// ajax communication
		xmlHttpWrite.open("POST", "write.php", true);
		xmlHttpWrite.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttpWrite.send(param.join('&'));
		
		// make chatting input field to blank
		frm.msg.value = '';
		
		// 채팅내용 갱신
		chatManager.proc();
	}

	// infinite iteration by pre-set interval
	setInterval(this.proc, interval);
}
