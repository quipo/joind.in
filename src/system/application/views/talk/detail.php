<?php
error_reporting(E_ALL);

menu_pagetitle('Talk: ' . escape($detail->talk_title));

if(!empty($claim_msg)){
	$class=($claim_status) ? 'notice' : 'err';
	if($claim_msg && !empty($claim_msg)){
		$this->load->view('msg_info', array('msg' => escape($claim_msg)));
	}
}
?>
<script type="text/javascript" src="/inc/js/talk.js"></script>
<?php 
$msg=$this->session->flashdata('msg');
if (!empty($msg)): ?>
<?php $this->load->view('msg_info', array('msg' => $msg)); ?>
<?php endif; ?>
<?php
$speaker_ids= array();
$speaker    = array();

$speaker_images	= buildSpeakerImg($speakers);
$rstr 			= rating_image($detail->tavg);

$data=array(
	'detail'		=> $detail,
	'speaker_img'	=> $speaker_images,
	'rstr'			=> $rstr,
	'speakers'		=> $speakers
);
$this->load->view('talk/modules/_talk_detail',$data);

$data=array(
	'speaker'		=> $speakers,
	'speakers'		=> $speakers,
	'is_claimed'	=> $is_claimed,
	'user_id'		=> $user_id
);
$this->load->view('talk/modules/_talk_buttons',$data);
?>

<p class="ad">
    <script type="text/javascript"><!--
    google_ad_client = "pub-2135094760032194";
    /* 468x60, created 11/5/08 */
    google_ad_slot = "4582459016"; google_ad_width = 468; google_ad_height = 60; //-->
    </script>
    <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
</p>


<?php 
$data=array();
$this->load->view('talk/modules/_talk_comments',$data);
$this->load->view('talk/modules/_talk_comment_form',$data); 
?>
<input type="hidden" name="talk_id" id="talk_id" value="<?php echo $detail->ID ?>" />
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ?>" />

<script type="text/javascript">
$(document).ready(function(){ talk.init(); })
</script>
