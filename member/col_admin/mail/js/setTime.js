var str = ""; 
document.writeln("<div id=\"_contents\" style=\"padding:6px; background-color:#E3E3E3; font-size: 12px; border: 1px solid #777777;  position:absolute; left:?px; top:?px; width:?px; height:?px; z-index:1; visibility:hidden\">"); 
str += "\u6642<select name=\"_hour\">"; 
for (h = 0; h <= 9; h++) { 
    str += "<option value=\"0" + h + "\">0" + h + "</option>"; 
} 
for (h = 10; h <= 23; h++) { 
    str += "<option value=\"" + h + "\">" + h + "</option>"; 
} 
str += "</select> \u5206<select name=\"_minute\">"; 
for (m = 0; m <= 9; m++) { 
    str += "<option value=\"0" + m + "\">0" + m + "</option>"; 
} 
for (m = 10; m <= 59; m++) { 
    str += "<option value=\"" + m + "\">" + m + "</option>"; 
} 
 
str += "</select> <input name=\"queding\" type=\"button\" onclick=\"_select()\" value=\"\u78ba\u5b9a\" style=\"font-size:12px\" /><input name=\"cancle\" type=\"button\" onclick=\"_cancle()\" value=\"\u53d6\u6d88\" style=\"font-size:12px\" /></div>"; 


document.writeln(str); 
var _fieldname; 
function _SetTime(tt) { 
    _fieldname = tt; 
    var ttop = tt.offsetTop;    //TT控件的定位?高 
    var thei = tt.clientHeight;    //TT控件本身的高 
    var tleft = tt.offsetLeft;    //TT控件的定位?? 
    while (tt = tt.offsetParent) { 
        ttop += tt.offsetTop; 
        tleft += tt.offsetLeft; 
    } 
    document.all._contents.style.top = (ttop+thei+4)+'px'; 
    document.all._contents.style.left = (tleft-100)+'px'; 
    document.all._contents.style.visibility = "visible"; 
} 
function _select() { 
    _fieldname.value = document.all._hour.value + ":" + document.all._minute.value; 
    document.all._contents.style.visibility = "hidden"; 
} 
function _cancle() { 
    document.all._contents.style.visibility = "hidden"; 
} 