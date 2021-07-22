<?php


function pr($arr){
    echo '<pre>';
    print_r($arr);
}

function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();
}

function get_safe_value($con, $str){
    if ($str!='') {
        $str = trim($str);
        return strip_tags(mysqli_real_escape_string($con,$str));
    }
}

function get_products($con,$type='', $limit=''){
    $sql = "select * from products where status=1 ";
    if ($type=='latest') {
        $sql.=" order by id desc";
    }
    if ($limit!='') {
        $sql.=" limit $limit";
    }
    $res = mysqli_query($con,$sql);
    $data = array();
    while($row=mysqli_fetch_assoc($res)){
        $data[] = $row;
    }
    return $data;
}


function get_product($con, $limit='', $cat_id='',$product_id=''){
    $sql = "select products.*,category.category,sub_category.sub_category from products,category,sub_category where products.status=1 ";
    if ($cat_id!='') {
        $sql.=" and products.category_id=$cat_id";
    }
    if ($product_id!='') {
        $sql.=" and products.id=$product_id";
    }

    $sql.=" and products.category_id=category.id";
    $sql.=" and products.sub_category_id=sub_category.id";
    $sql.=" order by products.id desc";
    if ($limit!='') {
        $sql.=" products.limit $limit";
    }
    $res = mysqli_query($con,$sql);
    $data = array();
    while($row=mysqli_fetch_assoc($res)){
        $data[] = $row;
    }
    return $data;
}

function get_category_name($con,$cat_id=''){
    if ($cat_id!='') {
        $sql = "select * from category where id='$cat_id'";
    }
    $res = mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
    return $row;
}

function search_products($con, $search_str)
{
    $sql = "select products.* from products where products.status=1 ";
    if ($search_str!='') {
        $sql.=" and (products.name like '%$search_str%' or products.description like '%$search_str%')";
    }
    $sql.=" order by products.id desc";
    $res = mysqli_query($con,$sql);
    $data = array();
    while($row=mysqli_fetch_assoc($res)){
        $data[] = $row;
    }
    return $data;
}

function view_products($con, $search_str)
{
    $sql = "select products.*,sub_category.sub_category from products,sub_category where products.status=1 and  
    products.sub_category_id=sub_category.id ";
    if ($search_str!='') {
        $sql.=" and (products.name like '%$search_str%' or products.description like '%$search_str%')";
    }
    $sql.=" order by products.id desc";
    $res = mysqli_query($con,$sql);
    $data = array();
    while($row=mysqli_fetch_assoc($res)){
        $data[] = $row;
    }
    return $data;
}


?>