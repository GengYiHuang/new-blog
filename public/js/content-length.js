posts = document.getElementsByClassName('content-preview');
[...posts].map((element, key) => {
  content = element.innerHTML;
  comma = content.indexOf('，');
  newline = content.indexOf("\n");
  console.log("comma",comma);
  console.log("newline",newline);
  if(comma != -1 && comma < newline) {
    element.innerHTML = content.substr(0, comma)+" \r\n"+'<span class="click-to-read">(繼續閱讀...)</span>';
  } else if(comma == -1 && newline == -1) {
    element.innerHTML = content.substr(0, 9)+" \r\n"+'<span class="click-to-read">(繼續閱讀...)</span>';    
  } else
    element.innerHTML = content.substr(0, newline)+" \r\n"+'<span class="click-to-read">(繼續閱讀...)</span>';    
});