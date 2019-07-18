<?php
error_reporting(E_ALL ^ E_NOTICE);
// How many adjacent pages should be shown on each side?
    $adjacents = 5;

    $query = $mysqli->query("select COUNT(*) as num from posts order by id  desc");
    $total_pages = mysqli_fetch_array($query);
    $total_pages = $total_pages['num'];

    $limit = 12;                                //how many items to show per page
    $page = $_GET['page'];

    if($page) 
        $start = ($page - 1) * $limit;          //first item to display on this page
    else
        $start = 0;                             //if no page var is given, set start to 
    /* Get data. */
    $result = $mysqli->query("select * from posts order by id  desc LIMIT $start, $limit");

    /* Setup page vars for display. */
    if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
    $prev = $page - 1;                          //previous page is page - 1
    $next = $page + 1;                          //next page is page + 1
    $lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;                      //last page minus 1

    $pagination = "";
    if($lastpage > 1)
    {   
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1) 
            $pagination.= "<a href=\"videos-$prev.html\">« previous</a>";
        else
            $pagination.= "<span class=\"disabled\">« previous</span>"; 

        //next button
        if ($page < $lastpage) 
            $pagination.= "<a href=\"videos-$next.html\">next »</a>";
        else
            $pagination.= "<span class=\"disabled\">next »</span>";
        $pagination.= "</div>\n";       
    }

    $q = $mysqli->query("select * from posts order by id desc limit $start,$limit");


    while($row=mysqli_fetch_assoc($q)){


// LOOP Code


}  echo $pagination;?>