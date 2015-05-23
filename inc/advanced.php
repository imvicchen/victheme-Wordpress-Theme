<div class="wrap">
	<h2>
		高级设置
	</h2>
	<form method="POST" action="">
		<input type="hidden" name="update_options" value="true" />
		<table class="form-table">
			<caption>网站Footer社交信息配置（不填写将不显示）</caption>
			<tbody>
				<tr valign="top">
					<th scope="row">
						<label for="vc-weixin">微信</label>
					</th>
					<td>
						<input name="vc-weixin" id="vc-weixin" class="large-text" value="<?php echo get_option('vc-weixin'); ?>" >
						<p class="description">
							你的微信ID，例如：MISTERXUAN
						</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="vc-weibo">新浪微博</label>
					</th>
					<td>
						<input name="vc-weibo" id="vc-weibo" class="large-text" value="<?php echo get_option('vc-weibo'); ?>" >
						<p class="description">
							你的新浪微博地址，例如：<a target="_blank" href="http://weibo.com/2516405033">http://weibo.com/2516405033</a>
						</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="vc-t">腾讯微博</label>
					</th>
					<td>
						<input name="vc-t" id="vc-t" class="large-text" value="<?php echo get_option('vc-t'); ?>" >
						<p class="description">
							你的腾讯微博地址，例如：<a target="_blank" href="http://t.qq.com/misterxuan">http://t.qq.com/misterxuan</a>
						</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="vc-github">GitHub</label>
					</th>
					<td>
						<input name="vc-github" id="vc-github" class="large-text" value="<?php echo get_option('vc-github'); ?>" >
						<p class="description">
							你的GitHub地址，例如：<a target="_blank" href="https://github.com/imvicchen">https://github.com/imvicchen</a>
						</p>
					</td>
				</tr>
			</tbody>
		</table>
		<p>
			<input type="submit" class="button-primary" name="admin_options" value="更新数据"/>
		</p>
	</form>
</div>
<?php wp_enqueue_media(); ?>
<!-- 必须 -->