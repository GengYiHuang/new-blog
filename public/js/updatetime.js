ulength = document.getElementsByClassName('updatetime').length;
for (let i = 0; i < ulength; i++) {
  uTime = document.getElementsByClassName('updatetime')[i].innerHTML;
  Time = new Date(uTime);
  Year = Time.getYear() + 1900;  
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  Month = months[Time.getMonth()];
  Day = Time.getDate();
  document.getElementsByClassName('updatetime')[i].innerHTML = Month + '&nbsp;' + Day + ',' + '&nbsp;' + Year;
};