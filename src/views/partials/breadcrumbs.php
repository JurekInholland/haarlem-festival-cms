<?php
$params = Request::uriParams();
$category = Request::uri();

// Only display breadcrumbs if necessary
if (count($params) <= 0) {
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
    color: #cdcdcd;
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

<div class="breadcrumbs">
<a class="home_icon" href="/"></a><span> / </span><a href="/<?= $category; ?>"><?= ucfirst($category); ?></a>
<?php foreach ($params as $key => $param) :
    if (count($params) < 1) {
    break;
    }
    $url .= "/" . $param; 
?>
     
     <span> / </span>
     <a href="/<?= $category . $url; ?>"><?= ucfirst($param); ?></a> 
<?php endforeach; ?>
</div>


