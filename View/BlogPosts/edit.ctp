<div id="blogPosts-add" class="blogPosts add form">
<?php echo $this->Form->create('BlogPost');?>
	<fieldset>
      <legend>
      <h2><?php echo __('Create a Blog Post'); ?></h2>
      </legend>
    <?php
	echo $this->Form->create('BlogPost');
	echo $this->Form->input('BlogPost.id');
	echo $this->Form->input('BlogPost.author_id', array('value' => $this->Session->read('Auth.User.id'), 'type'=>'hidden'));
	echo $this->Form->hidden('BlogPost.blog_id', array('value' => $blogId));
	echo $this->Form->input('BlogPost.title', array('label' => __('Post Title', true)));
	echo $this->Form->input('BlogPost.text', array('label' => '', 'type' => 'richtext', 'ckeSettings' => array('buttons' => array('Bold','Italic','Underline', 'Format', 'FontSize','TextColor','BGColor','-','NumberedList','BulletedList','Blockquote','JustifyLeft','JustifyCenter','JustifyRight', '-', 'Link','Unlink', '-', 'Image')))); ?>
	</fieldset>
	<fieldset>
 		<legend class="toggleClick"><?php echo __('Does this post belong to a category?');?></legend>
			<?php echo $this->Form->input('Category', array('multiple' => 'checkbox', 'label' => 'Which categories? ('.$this->Html->link('add', array('plugin' => 'categories', 'controller' => 'categories', 'action' => 'tree', 'model' => 'BlogPost')).' / '.$this->Html->link('edit', array('plugin' => 'categories', 'controller' => 'categories', 'action' => 'tree', 'model' => 'BlogPost')).' categories)')); ?>
	</fieldset>
    <?php if (in_array('Tags', CakePlugin::loaded())) { ?>
	<fieldset>
 		<legend class="toggleClick"><?php echo __('Tag this post?');?></legend>
			<?php echo $this->Form->input('tags', array('label' => 'Enter comma separated tags ('.$this->Html->link('view tags', array('plugin' => 'tags', 'controller' => 'tags', 'action' => 'index')).' ).')); ?>
	</fieldset>
    <?php } ?>
<?php echo $this->Form->end('Edit');?>
</div>
<?php
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Blog Posts',
		'items' => array(
			 $this->Html->link(__('List', true), array('controller' => 'blogs', 'action' => 'index')),
			 $this->Html->link(__('Add', true), array('controller' => 'blog_posts', 'action' => 'add', $this->request->data['BlogPost']['blog_id']), array('class' => 'add')),
			 )
		)
	))); ?>