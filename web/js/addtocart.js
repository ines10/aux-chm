function add()
{
    var iDiv = document.createElement('div');
    iDiv.className = 'message';
///
    var div1 = document.createElement('div');
    div1.className = 'alert-close';
///
    var div2 = document.createElement('div');
    div2.className = 'list_img';
///
    var img = document.createElement('img');
    img.src="images/1.jpg";
    img.className = "img-responsive";
    img.alt ="";
///
    var div3= document.createElement('div');
    div3.className="list_desc";
    var txt = document.createElement('h4');
    txt.innerHTML =" please work";

    var s = document.createElement('span');
    s.className="actual";
    s.innerHTML="7500 DT";
    var clr = document.createElement('div');
    clr.className="clear"
    div3.appendChild(txt);
    div3.appendChild(s);
    div2.appendChild(img);
    iDiv.appendChild(div2);
    iDiv.appendChild(div3);
    iDiv.appendChild(div1);
    iDiv.appendChild(clr);
    document.getElementById('rate').innerHTML="1";

    var cr = document.getElementById('box');;
// The variable iDiv is still good... Just append to it.
    cr.appendChild(iDiv);

alert("success");

}

