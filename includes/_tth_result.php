<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//-------------
  $view1 = getConstantView('great');
  $view2 = getConstantView('good');
  $view3 = getConstantView('normal');
  $view4 = getConstantView('bad');
  $view5 = getConstantView('notbad');
  $total_view = $view1 + $view2 + $view3 + $view4 + $view5; 
  $views1 = ($view1 / $total_view) * 100;
  $views2 = ($view2 / $total_view) * 100;
  $views3 = ($view3 / $total_view) * 100;
  $views4 = ($view4 / $total_view) * 100;
  $views5 = ($view5 / $total_view) * 100;
  $views1 = ceil($views1);
  $views2 = ceil($views2);
  $views3= ceil($views3);
  $views4 = ceil($views4);
  $views5= ceil($views4);
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?=$voting_results;?></h4>
            </div>
            <div class="modal-body">
                <div id="poll-container">
                    <div id="poll-results">
                       <small class="nh_model" style="color: red"><?=$lgtxt_evalu ?></small>
                        <h3><?=getPage('voted', 'comment'); ?></h3>
                        <dl class="graph">
                            <dt class="bar-title"><?php echo getConstant('great');?></dt>
                            <dd class="bar-container">
                                <div style="width: <?php echo $views1; ?>%;display: block;background-color: rgb(0, 102, 204);" id="bar1">&nbsp;</div>
                                <strong><?php echo $views1; ?>%</strong>
                            </dd>
                            <dt class="bar-title"><?php echo getConstant('good');?></dt>
                            <dd class="bar-container">
                                <div style="width: <?php echo $views2; ?>%;display: block;" id="bar2">&nbsp;</div>
                                <strong><?php echo $views2; ?>%</strong>
                            </dd>
                            <dt class="bar-title"><?php echo getConstant('normal');?></dt>
                            <dd class="bar-container">
                                <div style="width: <?php echo $views3; ?>%;display: block;background-color: rgb(0, 102, 204);" id="bar3">&nbsp;</div>
                                <strong><?php echo $views3; ?>%</strong>
                            </dd>
                            <dt class="bar-title"><?php echo getConstant('bad');?></dt>
                            <dd class="bar-container">
                                <div style="width: <?php echo $views4; ?>%;display: block;background-color: rgb(0, 102, 204);" id="bar4">&nbsp;</div>
                                <strong><?php echo $views4; ?>%</strong>
                            </dd>
                            <dt class="bar-title"><?php echo getConstant('notbad');?></dt>
                            <dd class="bar-container">
                                <div style="width: <?php echo $views5; ?>%;display: block;" id="bar5">&nbsp;</div>
                                <strong><?php echo $views5; ?>%</strong>
                            </dd>
                        </dl>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
#poll-results hr{
    border:0;
    color:#ccc;
    background-color:#cdcdcd;
    height:1px;
    width:100%;
    text-align:left
}
#poll-results h1{
    font-size:28px;
    color:#c00;
    background-color:#fff;
    font-family:Arial,Verdana,Helvetica,sans-serif;
    font-weight:300
}
#poll-results h2{
    font-size:15px;
    color:gray;
    font-family:Arial,Verdana,Helvetica,sans-serif;
    font-weight:300;
    background-color:#fff
}
#poll-results h3{
    color:#c00;
    font-size:150%;
    text-align:left;
    font-weight:600;
    padding:10px 5px 15px 5px;
    margin-top:5px;
    text-align:center
}
#poll-results p{
    color:#000;
    background-color:#fff;
    line-height:20px;
    padding:5px
}
#poll-results .graph{
    width:100%;
    position:relative;
    right:1%
}
#poll-results .bar-title{
    position:relative;
    float:left;
    width:50%;
    line-height:20px;
    margin-right:17px;
    font-weight:bold;
}
#poll-results .bar-container{
    position:relative;
    float:left;
    width:40%;
    height:10px;
    margin:0 0 15px
}
#poll-results .bar-container div{
    background-color:#c40;
    height:20px
}
#poll-results .bar-container strong{
    position:absolute;
    right:-36px;
    top:0;
    overflow:hidden
}
#poll-results #poll-results p{
    text-align:center;
    clear:both
}
</style>


<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
if ($("#poll-results").length > 0) {
animateResults();
}
});
function animateResults(){
$("#poll-results div").each(function(){
var percentage = $(this).next().text();
$(this).css({
width: "0%"
}).animate({
width: percentage
}, 'slow');
});
}
//]]>
</script>

<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
if ($("#poll-results").length > 0) {
animateResults();
}
});
function animateResults(){
$("#poll-results div").each(function(){
var percentage = $(this).next().text();
$(this).css({
width: "0%"
}).animate({
width: percentage
}, 'slow');
});
}
//]]>
</script>
