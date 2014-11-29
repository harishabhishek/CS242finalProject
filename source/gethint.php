<?php

$a = array();

$con = mysqli_connect('localhost', 'root', 'root', 'project');

// get the q parameter from URL
$q=$_REQUEST["q"]; $hint="";
$type = $_REQUEST["ty"];

if($type == "Artist"){

    $result = mysqli_query($con,"select artist from hintartist");
    while($row = mysqli_fetch_array($result)){
        $a[] = $row['artist'];
    }

    // lookup all hints from array if $q is different from ""
    if ($q !== "")
    { $q=strtolower($q); $len=strlen($q);
        foreach($a as $name)
        { if (stristr($q, substr($name,0,$len)))
        { if ($hint==="")
        { $hint=$name; }
        else
        { $hint .= ", $name"; }
        }
        }
    }
}

if($type == "Song"){


    $result = mysqli_query($con,"select song from hintsong");
    while($row = mysqli_fetch_array($result)){
        $a[] = $row['song'];
    }


    // lookup all hints from array if $q is different from ""
    if ($q !== "")
    { $q=strtolower($q); $len=strlen($q);
        foreach($a as $name)
        { if (stristr($q, substr($name,0,$len)))
        { if ($hint==="")
        { $hint=$name; }
        else
        { $hint .= ", $name"; }
        }
        }
    }
}

if($type == "Album"){

    $result = mysqli_query($con,"select album from hintalbum");

    while($row = mysqli_fetch_array($result)){
        $a[] = $row['album'];
    }
    // lookup all hints from array if $q is different from ""
    if ($q !== "")
    { $q=strtolower($q); $len=strlen($q);
        foreach($a as $name)
        { if (stristr($q, substr($name,0,$len)))
        { if ($hint==="")
        { $hint=$name; }
        else
        { $hint .= ", $name"; }
        }
        }
    }
}

if($type == "Genre"){

    $result = mysqli_query($con,"select genre from hintgenre");
    while($row = mysqli_fetch_array($result)){
        $a[] = $row['genre'];
    }
    // lookup all hints from array if $q is different from ""
    if ($q !== "")
    { $q=strtolower($q); $len=strlen($q);
        foreach($a as $name)
        { if (stristr($q, substr($name,0,$len)))
        { if ($hint==="")
        { $hint=$name; }
        else
        { $hint .= ", $name"; }
        }
        }
    }
}

if($type == "user"){

    $result = mysqli_query($con,"select uname from users");
    while($row = mysqli_fetch_array($result)){
        $a[] = $row['uname'];
    }
    // lookup all hints from array if $q is different from ""
    if ($q !== "")
    { $q=strtolower($q); $len=strlen($q);
        foreach($a as $name)
        { if (stristr($q, substr($name,0,$len)))
        { if ($hint==="")
        { $hint=$name; }
        else
        { $hint .= ", $name"; }
        }
        }
    }
}


// Output "no suggestion" if no hint were found
// or output the correct values
echo $hint==="" ? "no suggestion" : $hint;
?> 