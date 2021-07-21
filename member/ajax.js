function ajax1(page_to_call) {

    var name1 = document.getElementById('country_id').value;
    document.getElementById('waitsubcat').style.display = "none";
    var xmlHttp;
    try {
        // Firefox, Opera 8.0+, Safari All
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            document.getElementById('loadsubcat').innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open("POST", "getstate.php?country_id=" + name1, true);
    xmlHttp.send();
}



function majax2(page_to_call) {
    var name1 = document.getElementById('state_id').value;
    document.getElementById('waitspeci').style.display = "none";
    var xmlHttp;
    try {
        // Firefox, Opera 8.0+, Safari All
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            document.getElementById('loadspeci').innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open("POST", "get_district.php?state_id=" + name1, true);
    xmlHttp.send();
}


function ajax21(page_to_call) {
    var name = document.getElementById('sponsorid').value;
    //alert(name);
    var xmlHttp;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            alert(xmlHttp.responseText);
            document.newform.spname.value = xmlHttp.responseText;
            //document.getElementById('loader').innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open("POST", "fetch.php?sponsorid=" + name, true);
    xmlHttp.send();
}

function ajax22(page_to_call) {
    var name = document.getElementById('parentspid').value;
    //alert(name);
    var xmlHttp;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            document.newform.parentname.value = xmlHttp.responseText;
            //document.getElementById('loader').innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open("POST", "parentfetch.php?parentspid=" + name, true);
    xmlHttp.send();
}

function ajax23(page_to_call) {
    var name = document.getElementById('pinno').value;
    //alert(name);
    var xmlHttp;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            document.newform.pindet.value = xmlHttp.responseText;
            //document.getElementById('loader').innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open("POST", "fetchpin.php?pinno=" + name, true);
    xmlHttp.send();
}

function ajax24(page_to_call) {
    //alert("hi") ;
    var name = document.getElementById('phase_id').value;
    //alert(name);
    var xmlHttp;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            //document.form1.sname.value=xmlHttp.responseText;
            document.getElementById('display').innerHTML = xmlHttp.responseText;
            document.getElementById('load').style.display = "none";
        }
    }
    xmlHttp.open("POST", "plot_fetch.php?phase_id=" + name, true);
    xmlHttp.send();
}


function ajax25(page_to_call) {
    var name = document.getElementById('plot_id').value;
    //alert(name);
    var xmlHttp;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            document.newform.totalamt.value = xmlHttp.responseText;
            //document.getElementById('loader').innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open("POST", "fetchamt.php?plot_id=" + name, true);
    xmlHttp.send();
}

function ajax26(page_to_call) {
    var name = document.getElementById('pinno').value;
    //alert(name);
    var xmlHttp;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            document.newform.pindet.value = xmlHttp.responseText;
            //document.getElementById('loader').innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open("POST", "fetchpin1.php?pinno=" + name, true);
    xmlHttp.send();
}

function ajax27(page_to_call) {
    //alert("hi") ;
    var name = document.getElementById('sponsorid').value;
    //alert(name);
    var xmlHttp;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            //document.form1.sname.value=xmlHttp.responseText;
            document.getElementById('display').innerHTML = xmlHttp.responseText;
            document.getElementById('load').style.display = "none";
        }
    }
    xmlHttp.open("POST", "bk_plot_fetch.php?spid=" + name, true);
    xmlHttp.send();
}

function ajax28(page_to_call) {
    var name = document.getElementById('plot_bkId').value;
    //alert(name);
    var xmlHttp;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            document.newform.totalamt.value = xmlHttp.responseText;
            //document.getElementById('loader').innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open("POST", "fetchamt1.php?plot_bkId=" + name, true);
    xmlHttp.send();
}

function ajax30(page_to_call) {
    //alert("hi") ;
    var name = document.getElementById('package_id').value;
    //alert(name);
    var xmlHttp;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            //document.form1.sname.value=xmlHttp.responseText;
            document.getElementById('mloader').innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open("POST", "details_fetch.php?package_id=" + name, true);
    xmlHttp.send();
}