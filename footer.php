<footer class="footer fixed-bottom text-center bg-light">
Copyright &copy; <?php 
$copyYear = 2023; 
$curYear = date('Y'); 
echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
?> 

 ManojRaj M</footer> 
 <style>
    .footer{
        color:#fff;
        display: flex;
        align-items: center;
        justify-content: center;
    }
 </style>