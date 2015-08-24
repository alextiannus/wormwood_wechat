<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('header', TEMPLATE_INCLUDEPATH);?>
<link type="text/css" rel="stylesheet" href="./source/modules/credit/style/base.css" />
<link type="text/css" rel="stylesheet" href="./source/modules/credit/style/style.css?v=1" />
<script type="text/javascript" src="./source/modules/credit/script/script.js"></script>
<title>奖品列表</title>
<section class="stay">
        <section class="order_content">
            <section class="order_item">
		<aside>我的积分：<?php  echo $profile['credit1'];?></aside>
            </section>
        </section>

    	<!--content-->
        <section class="stay_content">
			<?php  if(is_array($award_list)) { foreach($award_list as $item) { ?>
        	<!--box-->
            <section class="stay_box">
			<aside class="stay_title"><?php  echo $item['title'];?></aside>
                <article class="stay_main">
                    <p class="stay_banner"><img src="<?php  echo $_W['attachurl'].$item['logo']?>" /></p>
			        <!--item-->
                    <section class="stay_item">
                        <section class="stay_item_l fl">
                            <section class="stay_lump">
                                <span class="stay_lump_l">剩余数量：</span>
                                <p class="stay_lump_r"><span> <?php  echo $item['amount'];?></span></p>
                            </section>
                        </section>
                        <section class="stay_item_r fl">
                            <section class="stay_lump">
                                <span class="stay_lump_l">价值：</span>
                                <p class="stay_lump_r"><span><?php  echo $item['price'];?>元</span></p>
                            </section>
                        </section>
                        <section class="stay_item_r fl">
                            <section class="stay_lump">
                                <span class="stay_lump_l">消耗积分：</span>
                                <p class="stay_lump_r"><span><?php  echo $item['credit_cost'];?>分</span></p>
                            </section>
                        </section>
                    </section>
		    <section class="stay_item">		   
                        <section class="fl">
                            <section class="stay_lump">
                                <span class="stay_lump_l">截止日期：</span>
                                <p class="stay_lump_r"><span><?php  echo $item['deadline'];?></span></p>
                            </section>
                        </section>
 		    </section>
                    <!--item end-->
	                <!--item-->
                    <section class="stay_content">
						<?php  echo htmlspecialchars_decode($item['content'])?>
					</section>
                    <!--item end-->
					
                    <!--btn-->
                    <section class="stay_btn_layer">
                        <span class="stay_btn_x fl"><a href="<?php  echo $this->createMobileUrl('fillinfo', array('award_id' => $item['award_id']))?>"><span>兑换</span></a></span>
                    </section>
                    <!--btn end-->
                </article>
            </section>
            <!--box end-->
			<?php  } } ?>
        </section>
        <!--content end-->
    </section>
<?php  include $this->template('footer', TEMPLATE_INCLUDEPATH);?>
