posts = document.getElementsByClassName('content-preview');
[...posts].map((element, key) => {
  content = element.innerHTML;
  comma = content.indexOf('，');
  if(comma != -1 && comma < 10) {
    element.innerHTML = content.substr(0, comma)+" \r\n"+'<span class="click-to-read">(繼續閱讀...)</span>';
  } else {
    element.innerHTML = content.substr(0,9)+"\r\n"+'<span class="click-to-read">(繼續閱讀...)</span>';    
  }
});