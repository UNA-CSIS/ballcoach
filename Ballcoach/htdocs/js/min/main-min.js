!function(){function e(){for(var e=this;-1===e.className.indexOf("app-menu");)"li"===e.tagName.toLowerCase()&&(-1!==e.className.indexOf("focus")?e.className=e.className.replace(" focus",""):e.className+=" focus"),e=e.parentElement}var a,t,s,n,l;if(a=document.getElementById("app-navigation"),a&&(t=a.getElementsByTagName("button")[0],"undefined"!=typeof t)){if(s=a.getElementsByTagName("ul")[0],"undefined"==typeof s)return void(t.style.display="none");s.setAttribute("aria-expanded","false"),-1===s.className.indexOf("app-menu")&&(s.className+=" app-menu"),t.onclick=function(){-1!==a.className.indexOf("toggled")?(a.className=a.className.replace(" toggled",""),t.setAttribute("aria-expanded","false"),s.setAttribute("aria-expanded","false")):(a.className+=" toggled",t.setAttribute("aria-expanded","true"),s.setAttribute("aria-expanded","true"))},n=s.getElementsByTagName("a"),l=s.getElementsByTagName("ul");for(var i=0,r=l.length;r>i;i++)l[i].parentNode.setAttribute("aria-haspopup","true");for(i=0,r=n.length;r>i;i++)n[i].addEventListener("focus",e,!0),n[i].addEventListener("blur",e,!0)}}();