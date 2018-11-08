<?php
/**
 * This is the template that displays the item block: title, author, content (sub-template), tags, comments (sub-template)
 *
 * This file is not meant to be called directly.
 * It is meant to be called by an include in the main.page.php template (or other templates)
 *
 * b2evolution - {@link http://b2evolution.net/}
 * Released under GNU GPL License - {@link http://b2evolution.net/about/gnu-gpl-license}
 * @copyright (c)2003-2016 by Francois Planque - {@link http://fplanque.com/}
 *
 * @package evoskins
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

global $Item, $Skin;

// Default params:
$params = array_merge( array(
		'feature_block'          	 => false,
		'item_class'                 => 'evo_post evo_content_block',
		'item_type_class'            => 'evo_post__ptyp_',
		'item_status_class'          => 'evo_post__',
		'content_mode'          	 => 'full', // We want regular "full" content, even in category browsing: i-e no excerpt or thumbnail
		'image_size'            	 => '', // Do not display images in content block - Image is handled separately
		'url_link_text_template'	 => '', // link will be displayed (except player if podcast)
		'image_class'                => '',
		'before_images'            => '<div class="evo_post_images">',
		'before_image'             => '<figure class="evo_image_block">',
		'before_image_legend'      => '<figcaption class="evo_image_legend">',
		'after_image_legend'       => '</figcaption>',
		'after_image'              => '</figure>',
		'after_images'             => '</div>',
		'image_class'              => 'img-responsive',
		'image_size'               => 'fit-1280x720',
		'image_limit'              =>  1000,
		'image_link_to'            => 'original', // Can be 'original', 'single' or empty
		'excerpt_image_class'      => '',
		'excerpt_image_size'       => 'fit-80x80',
		'excerpt_image_limit'      => 0,
		'excerpt_image_link_to'    => 'single',
		'include_cover_images'     => false, // Set to true if you want cover images to appear with teaser images.

		'before_gallery'           => '<div class="evo_post_gallery">',
		'after_gallery'            => '</div>',
		'gallery_table_start'      => '',
		'gallery_table_end'        => '',
		'gallery_row_start'        => '',
		'gallery_row_end'          => '',
		'gallery_cell_start'       => '<div class="evo_post_gallery__image">',
		'gallery_cell_end'         => '</div>',
		'gallery_image_size'       => 'crop-80x80',
		'gallery_image_limit'      => 1000,
		'gallery_colls'            => 5,
		'gallery_order'            => '', // Can be 'ASC', 'DESC', 'RAND' or empty
	), $params );

?>

<article id="<?php $Item->anchor_id() ?>" class="<?php $Item->div_classes( $params ) ?>" lang="<?php $Item->lang() ?>">

	<?php
		$Item->locale_temp_switch(); // Temporarily switch to post locale (useful for multilingual blogs)
	?>

	<?php
	if ( $disp != 'single' || $disp != 'page' )
	{
		// Display images that are linked to this post:
		$Item->images( array(
				'before' =>              '<div class="evo_post_images">',
				'before_image' =>        '<figure class="evo_image_block center">',
				'before_image_legend' => '<figcaption class="evo_image_legend">',
				'after_image_legend' =>  '</figcaption>',
				'after_image' =>         '</figure>',
				'after' =>               '</div>',
				'image_size' =>          'fit-720x500',
				/* Comment the above line to use the default image size
				 * (fit-720x500). Possible values for the image_size
				 * parameter are:
				 * fit-720x500, fit-640x480, fit-520x390, fit-400x320,
				 * fit-320x320, fit-160x160, fit-160x120, fit-80x80,
				 * crop-80x80, crop-64x64, crop-48x48, crop-32x32,
				 * crop-15x15
				 * See also the $thumbnail_sizes array in conf/_advanced.php.
				 */
				// Optionally restrict to files/images linked to specific position: 'teaser'|'teaserperm'|'teaserlink'|'aftermore'|'inline'|'cover'
				'restrict_to_image_position' => 'cover,teaser,teaserperm,teaserlink',
				'before_gallery'           => '<div class="evo_post_gallery">',
				'after_gallery'            => '</div>',
				'gallery_table_start'      => '',
				'gallery_table_end'        => '',
				'gallery_row_start'        => '',
				'gallery_row_end'          => '',
				'gallery_cell_start'       => '<div class="evo_post_gallery__image">',
				'gallery_cell_end'         => '</div>',
				'gallery_image_size'       => 'crop-80x80',
				'gallery_image_limit'      => 1000,
				'gallery_colls'            => 5,
				'gallery_order'            => '', // Can be 'ASC', 'DESC', 'RAND' or empty
			) );
		} else {
							$Item->images( array(
						'before'              => $params['before_images'],
						'before_image'        => $params['before_image'],
						'before_image_legend' => $params['before_image_legend'],
						'after_image_legend'  => $params['after_image_legend'],
						'after_image'         => $params['after_image'],
						'after'               => $params['after_images'],
						'image_class'         => $params['image_class'],
						'image_size'          => $params['image_size'],
						'limit'               => $params['image_limit'],
						'image_link_to'       => $params['image_link_to'],
						'before_gallery'      => $params['before_gallery'],
						'after_gallery'       => $params['after_gallery'],
						'gallery_table_start' => $params['gallery_table_start'],
						'gallery_table_end'   => $params['gallery_table_end'],
						'gallery_row_start'   => $params['gallery_row_start'],
						'gallery_row_end'     => $params['gallery_row_end'],
						'gallery_cell_start'  => $params['gallery_cell_start'],
						'gallery_cell_end'    => $params['gallery_cell_end'],
						'gallery_image_size'  => $params['gallery_image_size'],
						'gallery_image_limit' => $params['gallery_image_limit'],
						'gallery_colls'       => $params['gallery_colls'],
						'gallery_order'       => $params['gallery_order'],
						// Optionally restrict to files/images linked to specific position: 'teaser'|'teaserperm'|'teaserlink'|'aftermore'|'inline'|'cover'
						'restrict_to_image_position' => 'aftermore',
					) );
		}
	?>


	<div class="evo_post_details panel-body">

		<div class="evo_post_details_header">

			<?php
			if( ! $Item->is_intro() )
			{
				$title_before = '<h3 class="evo_post_title linked">';
				$title_after = '</h3>';

				ob_start();
				$Item->feedback_link( array(
						'type' => 'feedbacks',
						'link_before' => '',
						'link_after' => '',
						'link_text_zero' => get_icon( 'nocomment' ),
						'link_text_one' => '1 '.get_icon( 'comments' ),
						'link_text_more' => T_('%d ').get_icon( 'comments' ),
						'link_title' => '#',
					) );
				$feedback_links = ob_get_contents();
				ob_end_clean();

				if( !$Item->is_intro() )
				{
					ob_start();
					$Item->issue_date( array(
							'before'      => '</h3><span class="timestamp">',
							'after'       => '</span>',
							'date_format' => locale_datefmt().' H:i',
						) );
					$timestamp = ob_get_contents();
					ob_end_clean();
					$title_after .= $timestamp;
				}

				if( $disp == 'posts' )
				{
					// ------------------------- "Item in List" CONTAINER EMBEDDED HERE --------------------------
					// Display container contents:
					widget_container( 'item_in_list', array(
						'widget_context' => 'item',	// Signal that we are displaying within an Item
						// The following (optional) params will be used as defaults for widgets included in this container:
						'container_display_if_empty' => false, // If no widget, don't display container at all
						// This will enclose each widget in a block:
						'block_start' => '<div class="evo_widget $wi_class$">',
						'block_end' => '</div>',
						// This will enclose the title of each widget:
						'block_title_start' => '<h3>',
						'block_title_end' => '</h3>',
						// Template params for "Item Title" widget:
						'widget_item_title_params'  => array(
								'before' => $title_before,
								'after'  => $title_after,
							),
						// Template params for "Item Visibility Badge" widget:
						'widget_item_visibility_badge_display'  => ( ! $Item->is_intro() && $Item->status != 'published' ),
						'widget_item_visibility_badge_params' => array(
								'template' => '<div class="floatright"><span class="note status_$status$"><span>$status_title$</span></span></div>',
							),
						// Template params for "Item Info Line" widget:
						'widget_item_info_line_before' => '<div class="action_right">',
						'widget_item_info_line_after'  => '</div>',
						'widget_item_info_line_params' => array(
								'before_flag'         => '',
								'after_flag'          => '',
								'permalink_text'      => '<i class="fa fa-external-link"></i> '.T_('Permalink'),
								'before_permalink'    => '',
								'after_permalink'     => '',
								'before_author'       => 'by <span class="identity_link_username">',
								'after_author'        => '</span>',
								'before_post_time'    => '',
								'after_post_time'     => '',
								'before_categories'   => 'in ',
								'after_categories'    => '',
								'before_last_touched' => '<span class="text-muted"> &ndash; '.T_('Last touched').': ',
								'after_last_touched'  => '</span>',
								'before_last_updated' => '<span class="text-muted"> &ndash; '.T_('Contents updated').': ',
								'after_last_updated'  => '</span>',
								'before_edit_link'    => '',
								'after_edit_link'     => '',
								'format'              => '$flag$$post_time$$author$$categories$$edit_link$$permalink$'.$feedback_links,
							),
					) );
					// ----------------------------- END OF "Item in List" CONTAINER -----------------------------

				}
				elseif( $disp == 'single' )
				{
					// ------------------------- "Item Single - Header" CONTAINER EMBEDDED HERE --------------------------
					// Display container contents:
					widget_container( 'item_single_header', array(
						'widget_context' => 'item',	// Signal that we are displaying within an Item
						// The following (optional) params will be used as defaults for widgets included in this container:
						'container_display_if_empty' => false, // If no widget, don't display container at all
						// This will enclose each widget in a block:
						'block_start' => '<div class="evo_widget $wi_class$">',
						'block_end' => '</div>',
						// This will enclose the title of each widget:
						'block_title_start' => '<h3>',
						'block_title_end' => '</h3>',
						'author_link_text' => $params['author_link_text'],

						// Template params for "Item Title" widget:
							'widget_item_title_params'  => array(
								'before'    => $title_before,
								'after'     => $title_after,
								'link_type' => 'permalink',
							),
						// Template params for "Item Next/Previous" widget:
						'widget_item_next_previous_params' => array(
								'block_start' => '<nav><ul class="pager">',
								'block_end'   => '</ul></nav>',
								'prev_start'  => '<li class="previous">',
								'prev_end'    => '</li>',
								'next_start'  => '<li class="next">',
								'next_end'    => '</li>',
							),
						// Template params for "Item Visibility Badge" widget:
							'widget_item_visibility_badge_display'  => ( ! $Item->is_intro() && $Item->status != 'published' ),
							'widget_item_visibility_badge_params' => array(
									'template' => '<div class="floatright"><span class="note status_$status$"><span>$status_title$</span></span></div>',
								),
						// Template params for "Item Info Line" widget:
							'widget_item_info_line_before' => '<div class="action_right">',
							'widget_item_info_line_after'  => '</div>',
							'widget_item_info_line_params' => array(
									'before_flag'         => '',
									'after_flag'          => '',
									'permalink_text'      => '<i class="fa fa-external-link"></i> '.T_('Permalink'),
									'before_permalink'    => '',
									'after_permalink'     => '',
									'before_author'       => 'by <span class="identity_link_username">',
									'after_author'        => '</span>',
									'before_post_time'    => '',
									'after_post_time'     => '',
									'before_categories'   => 'in ',
									'after_categories'    => '',
									'before_last_touched' => '<span class="text-muted"> &ndash; '.T_('Last touched').': ',
									'after_last_touched'  => '</span>',
									'before_last_updated' => '<span class="text-muted"> &ndash; '.T_('Contents updated').': ',
									'after_last_updated'  => '</span>',
									'before_edit_link'    => '',
									'after_edit_link'     => '',
									'format'              => '$flag$$post_time$$author$$categories$$edit_link$$permalink$'.$feedback_links,
								)
							) );
							// ----------------------------- END OF "Item Single - Header" CONTAINER -----------------------------
				}
				else
				{
					if( $Item->status != 'published' )
					{
						$Item->format_status( array(
								'template' => '<div class="floatright"><span class="note status_$status$"><span>$status_title$</span></span></div>',
							) );
					}

					echo '<div class="action_right">';

					// Link for editing
					$Item->edit_link( array(
							'before'    => '',
							'after'     => '',
							'title'     => T_('Edit title/description...'),
						) );

					if( ! $Item->is_intro() )
					{	// Permalink:
						$Item->permanent_link( array(
								'before'    => '',
								'after'     => '',
								'text' => '<i class="fa fa-external-link"></i> '.T_('Permalink'),
							) );
					}

					// Link to comments, trackbacks, etc.:
					$Item->feedback_link( array(
									'type' => 'feedbacks',
									'link_before' => '',
									'link_after' => '',
									'link_text_zero' => get_icon( 'nocomment' ),
									'link_text_one' => '1 '.get_icon( 'comments' ),
									'link_text_more' => T_('%d ').get_icon( 'comments' ),
									'link_title' => '#',
								) );

					echo '</div>';
					echo '<h3 class="evo_post_title linked">';

					if( ! $Item->is_intro() )
					{
						$permalink_title = 'permalink';
					}
					else
					{
						$permalink_title = '';
					}

					$Item->title( array(
							'link_type' => $permalink_title,
						) );

					echo '</h3>';

					if( ! $Item->is_intro() )
					{
						$Item->issue_date( array(
								'before'      => '<span class="timestamp">',
								'after'       => '</span>',
								'date_format' => locale_datefmt().' H:i',
							) );
					}
				}
			}
			else
			{
				if( $Item->status != 'published' )
				{
					$Item->format_status( array(
							'template' => '<div class="floatright"><span class="note status_$status$"><span>$status_title$</span></span></div>',
						) );
				}

				echo '<div class="action_right">';

				// Link for editing
				$Item->edit_link( array(
						'before'    => '',
						'after'     => '',
						'title'     => T_('Edit title/description...'),
					) );

				// Link to comments, trackbacks, etc.:
				$Item->feedback_link( array(
								'type' => 'feedbacks',
								'link_before' => '',
								'link_after' => '',
								'link_text_zero' => get_icon( 'nocomment' ),
								'link_text_one' => '1 '.get_icon( 'comments' ),
								'link_text_more' => T_('%d ').get_icon( 'comments' ),
								'link_title' => '#',
							) );

				echo '</div>';
				echo '<h3 class="evo_post_title linked">';

				$Item->title( array(
						'link_type' => '',
					) );

				echo '</h3>';
			}
			?>

		</div>

		<?php
			if( $disp == 'single' )
			{
				// ------------------------- "Item Single" CONTAINER EMBEDDED HERE --------------------------
				// Display container contents:
				widget_container( 'item_single', array(
					'widget_context' => 'item',	// Signal that we are displaying within an Item
					// The following (optional) params will be used as defaults for widgets included in this container:
					'container_display_if_empty' => false, // If no widget, don't display container at all
					// This will enclose each widget in a block:
					'block_start' => '<div class="evo_widget $wi_class$">',
					'block_end'   => '</div>',
					// This will enclose the title of each widget:
					'block_title_start' => '<h3>',
					'block_title_end'   => '</h3>',
					// Template params for "Item Link" widget
					'widget_item_link_before' => '<p class="evo_post_link">',
					'widget_item_link_after'  => '</p>',
					// Template params for "Item Tags" widget
					'widget_item_tags_before' => '<nav class="small post_tags">',
					'widget_item_tags_after'  => '</nav>',
					// Params for skin file "_item_content.inc.php"
					'widget_item_content_params' => $params,
					// Template params for "Item Attachments" widget:
					'widget_item_attachments_params' => array(
							'limit_attach'       => 1000,
							'before'             => '<div class="evo_post_attachments"><h3>'.T_('Attachments').':</h3><ul class="evo_files">',
							'after'              => '</ul></div>',
							'before_attach'      => '<li class="evo_file">',
							'after_attach'       => '</li>',
							'before_attach_size' => ' <span class="evo_file_size">(',
							'after_attach_size'  => ')</span>',
						),
				) );
				// ----------------------------- END OF "Item Single" CONTAINER -----------------------------
			}
			elseif( $disp == 'page' )
			{
				// ------------------------- "Item Page" CONTAINER EMBEDDED HERE --------------------------
				// Display container contents:
				widget_container( 'item_page', array(
					'widget_context' => 'item',	// Signal that we are displaying within an Item
					// The following (optional) params will be used as defaults for widgets included in this container:
					'container_display_if_empty' => false, // If no widget, don't display container at all
					// This will enclose each widget in a block:
					'block_start' => '<div class="evo_widget $wi_class$">',
					'block_end'   => '</div>',
					// This will enclose the title of each widget:
					'block_title_start' => '<h3>',
					'block_title_end'   => '</h3>',
					// Template params for "Item Link" widget
					'widget_item_link_before' => '<p class="evo_post_link">',
					'widget_item_link_after'  => '</p>',
					// Template params for "Item Tags" widget
					'widget_item_tags_before' => '<nav class="small post_tags">'.T_('Tags').': ',
					'widget_item_tags_after'  => '</nav>',
					// Params for skin file "_item_content.inc.php"
					'widget_item_content_params' => $params,
					// Template params for "Item Attachments" widget:
					'widget_item_attachments_params' => array(
							'limit_attach'       => 1000,
							'before'             => '<div class="evo_post_attachments"><h3>'.T_('Attachments').':</h3><ul class="evo_files">',
							'after'              => '</ul></div>',
							'before_attach'      => '<li class="evo_file">',
							'after_attach'       => '</li>',
							'before_attach_size' => ' <span class="evo_file_size">(',
							'after_attach_size'  => ')</span>',
						),
				) );
				// ----------------------------- END OF "Item Page" CONTAINER -----------------------------
			}
			else
			{
				// ---------------------- POST CONTENT INCLUDED HERE ----------------------
				// Note: at the top of this file, we set: 'image_size' =>	'', // Do not display images in content block - Image is handled separately
				skin_include( '_item_content.inc.php', $params );
				// Note: You can customize the default item content by copying the generic
				// /skins/_item_content.inc.php file into the current skin folder.
				// -------------------------- END OF POST CONTENT -------------------------
			}
		?>

		<?php
		if( ! $Item->is_intro() ) {
		?>

		<div class="evo_post_footer">
		<?php
			$Item->author( array(
					'before'    => T_('By').' ',
					'after'     => ' &bull; ',
					'link_text' => 'preferredname',
				) );
		?>

		<?php
			$Item->categories( array(
				'before'          => T_('Galleries').': ',
				'after'           => ' ',
				'include_main'    => true,
				'include_other'   => true,
				'include_external'=> true,
				'link_categories' => true,
			) );
		?>

		<?php
			// List all tags attached to this post:
			if( ! $Item->is_intro() ) {
				$Item->tags( array(
						'before' =>         ' &bull; '.T_('Tags').': ',
						'after' =>          ' ',
						'separator' =>      ', ',
					) );
		?>

		<?php
				// URL link, if the post has one:
				$Item->url_link( array(
						'before'        => ' &bull; '.T_('Link').': ',
						'after'         => ' ',
						'text_template' => '$url$',
						'url_template'  => '$url$',
						'target'        => '',
						'podcast'       => false,        // DO NOT display mp3 player if post type is podcast
					) );
			}
		?>

		</div>
		<?php } ?>

	</div>

	<?php
		// ------------------ FEEDBACK (COMMENTS/TRACKBACKS) INCLUDED HERE ------------------
		skin_include( '_item_feedback.inc.php', array(
				'before_section_title' => '<h4>',
				'after_section_title'  => '</h4>',
				'author_link_text' => 'preferredname',
			) );
		// Note: You can customize the default item feedback by copying the generic
		// /skins/_item_feedback.inc.php file into the current skin folder.
		// ---------------------- END OF FEEDBACK (COMMENTS/TRACKBACKS) ---------------------
	?>

	<?php
		// ------------------ WORKFLOW PROPERTIES INCLUDED HERE ------------------
		skin_include( '_item_workflow.inc.php' );
		// ---------------------- END OF WORKFLOW PROPERTIES ---------------------
	?>

	<?php
		// ------------------ META COMMENTS INCLUDED HERE ------------------
		skin_include( '_item_meta_comments.inc.php', array(
				'comment_start'         => '<article class="evo_comment evo_comment__meta panel panel-default">',
				'comment_end'           => '</article>',
			) );
		// ---------------------- END OF META COMMENTS ---------------------
	?>

	<?php
		locale_restore_previous();	// Restore previous locale (Blog locale)
	?>

</article>