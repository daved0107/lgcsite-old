<table class="free-vs-pro-table">
	<thead>
		<tr>
			<th></th>
			<th><?php echo esc_html($theme->get('Name')); ?></th>
			<th><?php echo esc_html($theme->get('Name')).' '.esc_html__('Pro', 'scope'); ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<h3><?php esc_html_e('WooCommerce Compatible', 'scope'); ?></h3>
				<p><?php esc_html_e('Best suitable theme for online store', 'scope'); ?></p>
			</td>
			<td><span class="dashicons-before dashicons-yes"></span></td>
			<td><span class="dashicons-before dashicons-yes"></span></td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('Header Slider', 'scope'); ?></h3>
				<p><?php esc_html_e('Show of your product, servies on responsive slier', 'scope'); ?></p>
			</td>
			<td><span class="dashicons-before dashicons-yes"></span><br><?php esc_html_e('Basic', 'scope') ?></td>
			<td><span class="dashicons-before dashicons-yes"></span> <br><?php esc_html_e('(Select Diffrent Images for Desktop, Mobile & Tablet)', 'scope') ?></td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('FrontPage Sections', 'scope'); ?></h3>
				<p><?php esc_html_e('Slider, Services, About Us, Subscribe, Contact Us, Shop, Team, Testimonail, Brand, Blog', 'scope'); ?></p>
			</td>
			<td><span class="dashicons-before dashicons-yes"></span></td>
			<td><span class="dashicons-before dashicons-yes"></span><br><?php esc_html_e('Advance Live 17+(Pre Built) and Unlimited Section by Shortcode and widgets', 'scope') ?></td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('Page Templates', 'scope'); ?></h3>
			</td>
			<td><span class="dashicons-before dashicons-yes"></span><br><?php esc_html_e('Limited', 'scope') ?></td>
			<td><span class="dashicons-before dashicons-yes"></span><br><?php esc_html_e('15+ Page Templates for (Contact, About, Portfolio etc..) Page', 'scope') ?></td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('Video Tutorials', 'scope'); ?></h3>
			</td>
			<td><span class="dashicons-before dashicons-yes"></span><br></td>
			<td><span class="dashicons-before dashicons-yes"></span><br></td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('Support', 'scope'); ?></h3>
			</td>
			<td><span class="dashicons-before dashicons-yes"></span><br></td>
			<td><span class="dashicons-before dashicons-yes"></span><br>Live Chat</td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('Blog Slider', 'scope'); ?></h3>
			</td>
			<td><span class="dashicons-before dashicons-no-alt"></span></td>
			<td><span class="dashicons-before dashicons-yes"></span> <br><?php esc_html_e('(Select Diffrent Images for Desktop, Mobile & Tablet)', 'scope') ?></td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('Shop Slider', 'scope'); ?></h3>
			</td>
			<td><span class="dashicons-before dashicons-no-alt"></span></td>
			<td><span class="dashicons-before dashicons-yes"></span> <br><?php esc_html_e('(Select Diffrent Images for Desktop, Mobile & Tablet)', 'scope') ?></td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('FrontPage Section Reorder', 'scope'); ?></h3>
			</td>
			<td><span class="dashicons-before dashicons-no-alt"></span></td>
			<td><span class="dashicons-before dashicons-yes"></span></td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('Portfolio', 'scope'); ?></h3>
			</td>
			<td><span class="dashicons-before dashicons-no-alt"></span></td>
			<td><span class="dashicons-before dashicons-yes"></span></td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('Pricing Plans Section', 'scope'); ?></h3>
				<p><?php esc_html_e('Home page pricing plans section to show your plans', 'scope'); ?></p>
			</td>
			<td><span class="dashicons-before dashicons-no-alt"></span></td>
			<td><span class="dashicons-before dashicons-yes"></span><br><?php esc_html_e('(one click add, reorder)', 'scope'); ?></td>
		</tr>
		<tr>
			<td>
				<h3><?php esc_html_e('Customizable Colors', 'scope'); ?></h3>
				<p><?php esc_html_e('Select Colors of your choice for content on your site', 'scope'); ?></p>
			</td>
			<td><span class="dashicons-before dashicons-no-alt"></span></td>
			<td><span class="dashicons-before dashicons-yes"></span></td>
		</tr>
	</tbody>
	<tfoot>
		<th></th>
		<th colspan="2">
			<?php if (!empty($this->pro_link)):?>
			<a class="button button-primary button-big" href="<?php echo esc_url($this->pro_link); ?>" target="_blank"><?php esc_html_e('Get Scope Pro Now', 'scope');?></a>
			<?php endif; ?>
		</th>
	</tfoot>
</table>