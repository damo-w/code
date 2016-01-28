/*函数说明：
 *参数：正则表达式，字符串
 *返回值：布尔值
 *说明：字符串符合正则规则，返回真，否则返回假 */
function checkReg(rg_str,s){
    var str="checkReg:"+rg_str;
    var patt = new RegExp(rg_str,"i");
    if (patt.exec(s)){
        return true;
    }
    else
    {
        return false;
    }
}
var xmlHttp;
function check(s) {
    switch(s.name)
    {
        case 'user_logname':
            if(checkReg("^[a-zA-Z_][a-zA-Z0-9_]*$", s.value))
            {
                //获取xmlHttpObject对象，如果为空，提示浏览器不支持ajax
                xmlHttp = GetXmlHttpObject();
                if (xmlHttp == null) {
                    alert("Browser does not support HTTP Request");
                    return;
                }
                //获取url
                var url = "ajax_back.php";
                url = url + "?q=" + s.value;
                url = url + "&sid=" + Math.random();
                console.log(url);
                //回调函数，执行动作
                xmlHttp.onreadystatechange = function(){stateChanged(s)};
                //open
                xmlHttp.open("GET", url, true);
                xmlHttp.send(null);
            }
            break;
        case 'user_passwd':
            if(checkReg("^.{6,18}$", s.value))
            {
                s.nextSibling.innerHTML = "格式正确";
            }
            else {
                s.nextSibling.innerHTML = "格式不正确";
            }
    }
}
function stateChanged(s)
{
  if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
  {
    //将获取的信息插入到txtHint中
    s.nextSibling.innerHTML = xmlHttp.responseText;
  }
}

//获取xml对象
function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
// Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    }
    catch (e) {
// Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}
