//header.js
var cheader = config.header;
var header = document.getElementById("header");
var topbg = document.createElement("div"); topbg.setAttribute("class", "topbg");
var topbgul = document.createElement("ul"); topbgul.setAttribute("class", "topnav");
for (var i in cheader.top) {
    var topnava = document.createElement("a"); topnava.href = cheader.top[i].url; topnava.innerText = cheader.top[i].text;
    topbgul.appendChild(topnava);
}
topbg.appendChild(topbgul);
header.appendChild(topbg);
var topbgline = document.createElement("div"); topbgline.setAttribute("class", "topbgline");
header.appendChild(topbgline);
var logo = document.createElement("div"); logo.setAttribute("class", "logo");
var logo_l = document.createElement("div"); logo_l.setAttribute("class", "logo_l f_l");
var logo_la = document.createElement("a"); logo_la.href = "/";
var logo_laimg = document.createElement("img"); logo_laimg.src = cheader.logo;
logo_la.appendChild(logo_laimg);
logo_l.appendChild(logo_la);
logo.appendChild(logo_l);
var logo_r = document.createElement("div"); logo_r.setAttribute("class", "logo_r f_r");
var logo_ra = document.createElement("a"); logo_ra.href = cheader.search.url;
var logo_raimg = document.createElement("img"); logo_raimg.src = cheader.search.img;
logo_ra.appendChild(logo_raimg);
logo_r.appendChild(logo_ra);
logo.appendChild(logo_r);
header.appendChild(logo);
var topnav = document.createElement("nav"); topnav.setAttribute("id", "topnav");
var topnavul = document.createElement("ul");
for (var i in cheader.nav) {
    var topnava = document.createElement("a"); topnava.href = cheader.nav[i].url; topnava.innerText = cheader.nav[i].text; topnava.setAttribute("target", "_blank");
    topnavul.appendChild(topnava);
}
topnav.appendChild(topnavul);
header.appendChild(topnav);