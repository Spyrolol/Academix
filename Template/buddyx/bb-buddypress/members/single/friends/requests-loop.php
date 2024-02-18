<?php
/**
 * BuddyPress - Members Friends Requests Loop
 *
 * @since 5.0.0
 * @version 5.0.0
 */
?>

<h2 class="screen-heading friendship-requests-screen"><?php esc_html_e( 'Requests to Connect', 'buddyx' ); ?></h2>

<?php bp_nouveau_member_hook( 'before', 'friend_requests_content' ); ?>

<?php if ( bp_has_members( 'type=alphabetical&include=' . bp_get_friendship_requests() ) ) : ?>

	<?php bp_nouveau_pagination( 'top' ); ?>

	<ul id="friend-list" class="<?php bp_nouveau_loop_classes(); ?>">
		<?php
		while ( bp_members() ) :
			bp_the_member();
		?>
			<li id="friendship-<?php bp_friend_friendship_id(); ?>" <?php bp_member_class( array( 'item-entry' ) ); ?> data-bp-item-id="<?php bp_friend_friendship_id(); ?>" data-bp-item-component="members">
				<div class="list-wrap">
					<div class="item-avatar">
						<a href="<?php bp_member_link(); ?>"><?php bp_member_avatar( array( 'type' => 'full' ) ); ?></a>
					</div>
					<div class="item">
						<div class="item-block">
							<div class="member-info-wrapper">
								<div class="item-title"><a href="<?php bp_member_link(); ?>"><?php bp_member_name(); ?></a></div>
								<div class="item-meta"><span class="activity"><?php bp_member_last_active(); ?></span></div>

								<?php bp_nouveau_friend_hook( 'requests_item' ); ?>
							</div>
							<div class="member-action-wrapper">
								<?php bp_nouveau_members_loop_buttons(); ?>
							</div>
						</div>
					</div>
				</div>
			</li>

		<?php endwhile; ?>
	</ul>

	<?php bp_nouveau_friend_hook( 'requests_content' ); ?>

	<?php bp_nouveau_pagination( 'bottom' ); ?>

<?php else : ?>

	<?php bp_nouveau_user_feedback( 'member-requests-none' ); ?>

<?php endif; ?>

<?php
bp_nouveau_member_hook( 'after', 'friend_requests_content' );
