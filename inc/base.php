<div class="wrap">
	<h2>
		基本设置
	</h2>
	<form method="POST" action="">
		<input type="hidden" name="update_options" value="true" />
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						<label for="text-demo">网站关键字</label>
					</th>
					<td>
						<textarea name="vc-keywords" id="vc-keywords" class="large-text"><?php echo get_option('vc-keywords'); ?></textarea>						

						<p class="description">
							关键词,5个左右,单个8汉字以内
						</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="textarea-demo">网站描述</label>
					</th>
					<td>
						<textarea name="vc-description" id="vc-description" class="large-text"><?php echo get_option('vc-description'); ?></textarea>						

						<p class="description">
							网站描述，字数尽量空制在80个汉字，160个字符以内！
						</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="textarea-demo">站长统计</label>
					</th>
					<td>
						<textarea name="vc-cnzz" id="vc-cnzz" class="large-text"><?php echo get_option('vc-cnzz'); ?></textarea>						

						<p class="description">
							目前站长统计代码默认放在网站footer，后面将开放更多选项可能。
						</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label>主题色系（开发中...）</label>
					</th>
					<td>
						<select name ="theme-color">
							<option value="white" >
								最爱大白
							</option>
							<option value="blue" >
								天空の蓝色
							</option>
							<option value="black" >
								逼格黑酷
							</option>
						</select>
					</td>
				</tr>
			</tbody>
		</table>
		<p>
			<input type="submit" class="button-primary" name="admin_options" value="更新数据"/>
		</p>
	</form>
</div>