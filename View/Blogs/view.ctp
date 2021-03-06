<?php
echo $this->Html->meta(
		'Most Recent Posts',
		'/blogs/blogs/view/'.$blog['Blog']['id'].'.rss',
		array(
			'type' => 'rss',
			'inline' => false
			)
		); ?>
<div id="blogs-blogs-view" class="blogs view">
	<div id="blog-posts">
		<?php
		if(count($blogPosts)) {
			foreach($blogPosts as $blogPost) {
		?>
		<div class="blogPost" id="post_<?php $blogPost['BlogPost']['id']; ?>">
			<?php $viewLink = (!empty($blogPost['Alias']['name'])) ? __('/%s', $blogPost['Alias']['name']) : array('plugin' => 'blogs', 'controller' => 'blog_posts', 'action' => 'view', $blogPost['BlogPost']['id']); ?>
			<h2><?php echo $this->Html->link($blogPost['BlogPost']['title'], $viewLink); ?></h2>
			<div class="blog-post-sub-header well">By <?php echo $blogPost['Author']['username'] ?>  | Added <?php echo ZuhaInflector::datify($blogPost['BlogPost']['published']); ?></div>
			<div class="blog-post-body">
				<?php
				$blogPost['BlogPost']['text'] = explode('<!-- pagebreak -->',$blogPost['BlogPost']['text']);
				echo $this->Text->truncate(strip_tags($blogPost['BlogPost']['text'][0]), 250, array('ending' => '...', 'html' => false));
				?>
			</div>
			<div class="blog-post-footer">
            <?php echo $this->Html->link(__('View Full Post', true), array('plugin' => 'blogs', 'controller' => 'blog_posts', 'action' => 'view', $blogPost['BlogPost']['id'])); ?>
            </div>
            <hr />
		</div>
		<?php
			}
            echo $this->Element('paging');
		} else { 
		    echo __('<p>There are currently no blog posts</p>');
        } ?>
	</div>
</div>
<?php
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Blog',
		'items' => array(
			$this->Html->link(__('Add Post'), array('plugin' => 'blogs', 'controller' => 'blog_posts', 'action' => 'add', $blog['Blog']['id'])),
			$this->Html->link(__('Edit'), array('plugin' => 'blogs', 'controller' => 'blogs', 'action' => 'edit', $blog['Blog']['id'])),
			)
		)
	))); ?>
