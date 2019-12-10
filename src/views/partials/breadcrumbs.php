<?php
$params = Request::uriParams();
$cate = Request::uri();

$color = "#323232";

// var_dump($category);

// foreach ($category as $key => $cat) {
//     var_dump($cat);
//     if ($cat["slug"] == $cate) {
//         $color = "#" . $cat["color"];
//     } else {
//         // echo "SLUG: " . $cat . "<br>";
//         // echo $cate . "<br>";
//     }
// }

// Only display breadcrumbs if necessary
if ($cate == "") {
    return;
}

$url = "";
?>

<style>
.breadcrumbs {
    width: 100%;
    background-color: #169BD5;
    padding: .5rem;
    display: flex;
    align-items: center;
}

.breadcrumbs a:last-of-type {
    color: #ededed;
}

.breadcrumbs a:last-of-type:hover {
    text-decoration: none;
}

.breadcrumbs a {
    color: white;
}

.breadcrumbs span {
    margin: .25rem;
    color: rgba(200, 200, 200, .75);
}

.home_icon {
    background-color: white;
    -webkit-mask-image: url("/img/home.svg");
    -webkit-mask-size: contain;
    width: 28px;
    height: 28px;
    margin: 0 .25rem;
}

</style>


<script src="/js/breadcrumbs.js" type="module"></script>


<div id="breadcrumbs" class="breadcrumbs" style="background-color: <?= $color; ?>">
<a class="home_icon" href="/"></a><span> / </span><a href="/<?= $cate; ?>"><?= ucfirst($cate); ?></a>
<?php foreach ($params as $key => $param) :
    if (count($params) < 1) {
    break;
    }
    $url .= "/" . $param; 
?>
     
     <span> / </span>
     <a href="/<?= $cate . $url; ?>"><?= ucfirst($param); ?></a> 
<?php endforeach; ?>
</div>


