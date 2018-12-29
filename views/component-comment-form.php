<?php 
	parse_str($_SERVER['QUERY_STRING'], $queries); 
	if ( isset($queries['replytocom']) ) {
		$commentor = get_comment($queries['replytocom']);
	}
?>
<?php  ?>

<section class="comment-respond">

	<form action="<?php echo bloginfo('url') ?>/wp-comments-post.php" method="post" id="commentform" class="comment-form form" novalidate="">
		<h2 class="comment-reply-title">
			<?php echo isset($queries['replytocom']) ? sprintf('ตอบความเห็นของ %s', $commentor->comment_author) : __('แสดงความเห็นของคุณที่นี่', 'jindatheme') ?>
			<?php if ( isset($queries['replytocom']) ) { ?>
				<small><a href="javascript:void(0)" onclick="removeParam('replytocom', '<?php echo $_SERVER['REQUEST_URI']; ?>')">(คลิกที่นี่ เพื่อยกเลิกการตอบ)</a></small>
			<?php } ?>
		</h2>
		<p><?php _e('กรุณากรอกอีเมล์ของคุณก่อนส่งข้อมูล เพื่อรับการแจ้งเตือนเมื่อมีคนมาตอบข้อความของคุณ', 'jindatheme') ?></p>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="author" class="control-label">
						ชื่อ<span class="required">*</span>
					</label>
					<input id="author" name="author" class="form-control" type="text" value="" size="30" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="email" class="control-label">
						อีเมล์<span class="required">*</span>
					</label>
					<input id="email" name="email" class="form-control" type="text" value="" size="30">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label for="comment" class="control-label">ความเห็น <span class="required">*</span></label>
					<textarea id="comment" class="form-control" name="comment" aria-required="true"></textarea>
				</div>
			</div>
		</div>
		<input name="submit" type="submit" id="submit" class="submit blue-button" value="<?php _e('ส่งข้อมูล', 'jindatheme') ?>" />
		<input type="hidden" name="comment_post_ID" id="comment_post_ID" value="<?php echo $post->ID; ?>">
		<input type="hidden" name="comment_parent" id="comment_parent" value="<?php echo isset($queries['replytocom']) ? $queries['replytocom'] : 0 ?>">
	</form>

</section>

<script>
	function removeParam(key, sourceURL) {
		var rtn = sourceURL.split("?")[0],
		param,
		params_arr = [],
		queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
		if (queryString !== "") {
			params_arr = queryString.split("&");
			for (var i = params_arr.length - 1; i >= 0; i -= 1) {
				param = params_arr[i].split("=")[0];
				if (param === key) {
					params_arr.splice(i, 1);
				}
			}
			rtn = rtn + "?" + params_arr.join("&");
		}
		window.location.href = rtn;
	}
</script>
