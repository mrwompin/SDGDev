window.onload = function(){
	var date = new Date();
	var month_name = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	var month = date.getMonth(); // returns 0 - 11 for month
	var day = date.getDate();
	var year = date.getFullYear(); //returns full year
	var first_date = month_name[month] + " " + 1 + " " + year; //September 1 2017
	var tmp = new Date(first_date).toDateString(); //Mon Sep 01 2017
	var first_day = tmp.substring(0, 3); //mon
	var day_name = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
	var day_number = day_name.indexOf(first_day);
	var days = new Date(year, month+1, 0).getDate(); //Tue Sept 30 2014 . just 30
	var calendar = get_calendar(day_number, days, day);

	document.getElementById("calendar-month-year").innerHTML = month_name[month] + " " + year;
	document.getElementById("calendar-dates").appendChild(calendar);
	
}

function get_calendar(dayStart, days, day){
	var table = document.createElement('table');
	var tr = document.createElement('tr');

	//row for day letters
	for(var c=0; c<=6;c++){
		var td = document.createElement('td');
		td.innerHTML = "SMTWTFS"[c];
		tr.appendChild(td);
	}
	table.appendChild(tr);

	//create second row
	tr = document.createElement('tr');
	var c;
	for (c=0;c<=6;c++){
		if(c == dayStart){
			break;
		}
		var td = document.createElement('td');
		td.innerHTML = "";
		tr.appendChild(td);
	}
	var count = 1;
	for(;c<=6;c++){
		var td = document.createElement('td');
		if(day == count){
			td.id = "today"
		}
		td.innerHTML = count;
		count++;
		tr.appendChild(td);
	}
	table.appendChild(tr);

	//rest of rows
	for(var r=3; r<=6; r++){
		tr = document.createElement('tr');
		for (var c =0; c<=6; c++) {
			if(count > days){
				table.appendChild(tr);
				return table;
			}
			var td = document.createElement('td');
			if(day == count){
			td.id = "today"
			}
			td.innerHTML = count;
			count++;
			tr.appendChild(td);
		}
		table.appendChild(tr);
	}
}
