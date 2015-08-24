<?php defined('IN_IA') or exit('Access Denied');?><?php  if(is_array($list)) { foreach($list as $item) { ?>
<li>
    <div class="ui-grid-b roomlist" data-roomid="203806"  data-index="0">

        <div class="ui-block-a room_img_a" id="piclist_<?php  echo $item['id'];?>">

            <a href="<?php  echo img_url($item['thumb'])?>" rel="external">
            <img class="roompic" id="roomImgList1<?php  echo $item['id'];?>" index="0" des="<?php  echo $item['title'];?>" alt="<?php  echo $item['title'];?>"
                 src="<?php  echo img_url($item['thumb'])?>"
                 style="width:67px;height:50px;">
            </a>
            <?php  if($item['thumbs'] != '') { ?>
            <?php  if(is_array($item['thumbs'])) { foreach($item['thumbs'] as $thumb_row) { ?>
            <a href="<?php  echo img_url($thumb_row['attachment'])?>" rel="external" style="display: none;">
                <img id="roomImgList2<?php  echo $item['id'];?>" index="0" des="<?php  echo $item['title'];?>" alt="<?php  echo $item['title'];?>"  src="<?php  echo img_url($thumb_row['attachment'])?>">
            </a>
            <?php  } } ?>
            <?php  } ?>
        </div>

<script>
    $(function(){
        $("#piclist_<?php  echo $item['id'];?> a").photoSwipe();
    });
</script>

        <div class="ui-block-b" onclick="show_room_device('<?php  echo $item['hotelid'];?>','<?php  echo $item['id'];?>','<?php  echo $item['has'];?>','<?php  echo $item['price'];?>','<?php  echo $item['total_price'];?>')">
            <span data-paytype="1" class="bold"><?php  echo $item['title'];?></span><br>
            <span class="txt_gray">
                <?php  if($item['breakfast'] == 0) { ?>
                无早
                <?php  } else if($item['breakfast'] == 1) { ?>
                单早
                <?php  } else if($item['breakfast'] == 2) { ?>
                双早
                <?php  } ?>
                <?php  if($item['bed_show'] == 1) { ?>
                <?php  echo $item['bed'];?>
                <?php  } ?>
            </span><br>

            <?php  if(!empty($item['sales'])) { ?>
            <div class="hotelicon hotel_cu">促</div>
            <?php  } ?>
        </div>

        <div class="ui-block-c" data-fan="1" data-cny="RMB" >
           
            <dfn>¥</dfn><strong class="price size16">
            <?php  echo $item['price'];?> 
            </strong><?php  if($item['avg']) { ?>均价<?php  } ?> 

            <!--<p class="hot_ico">-->
            <!--<i class="fan" data-totalcashamount="40" data-ticketvalue="40" data-tickettype="6">可返</i>-->
            <!--<span class="fantxt">￥40</span>-->
            <!--</p>-->
            <?php  if($item['has'] == 0) { ?>
            <p class="room_btn" style='text-align:right;;width:100%;'>
                <input value="满房" class="ui-btn-order bookBtn" type="button" style="width: 60px;-webkit-appearance: none;border-radius:0px;background:#ccc;color:#fff;">
            </p>
            <?php  } else { ?>
                <p class="room_btn" style='text-align:right;;width:100%;'>
                    <?php  if(($this->_set_info['ordertype'] == 1)) { ?>
                    <input value="在线预订" class="ui-btn-order bookBtn" type="button" onclick="location.href='<?php  echo $this->createMobileUrl('order', array('hid' => $hid, 'id' => $item['id'], 'price' => $item['price'], 'total_price' => $item['total_price']))?>'" style=" margin-bottom: 3px;width: 60px;-webkit-appearance: none;border-radius:0px;">
                    <?php  } ?>
                    <input value="电话预订" class="ui-btn-order bookBtn" onclick="location.href='tel:<?php  echo $tel;?>'" type="button" style="width: 60px;-webkit-appearance: none;border-radius:0px;">
                </p>
            <?php  } ?>

        </div>
    </div>
</li>
<?php  } } ?>
