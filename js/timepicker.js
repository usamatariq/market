var time       = new Array("12:00AM","12:30AM","01:00AM","01:30AM","02:00AM","02:30AM","03:00AM","03:30AM","04:00AM","04:30AM","05:00AM","05:30AM","06:00AM","06:30AM","07:00AM","07:30AM","08:00AM","08:30AM","09:00AM","09:30AM","10:00AM","10:30AM","11:00AM","11:30AM","12:00PM","12:30PM","01:00PM","01:30PM","02:00PM","02:30PM","03:00PM","03:30PM","04:00PM","04:30PM","05:00PM","05:30PM","06:00PM","06:30PM","07:00PM","07:30PM","08:00PM","08:30PM","09:00PM","09:30PM","10:00PM","10:30PM","11:00PM","11:30PM");

function timeSelect() {

  selectField = document.getElementById('time');
  selectField.options.length = 0;
  for (i=0; i<time.length; i++) {
    selectField.options[selectField.length] = new Option(time[i]);
  }
}

function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
}

addLoadEvent(function() {
  timeSelect();
});
