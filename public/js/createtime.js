ulength = document.getElementsByClassName('createtime');
[...ulength].map((element, key) => {
  uTime = element.innerHTML;
  Time = new Date(uTime);
  Year = Time.getYear() + 1900;  
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  Month = months[Time.getMonth()];
  Day = Time.getDate();
  element.innerHTML = Month + '&nbsp;' + Day + ',' + '&nbsp;' + Year;
});
