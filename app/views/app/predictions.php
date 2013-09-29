<div class="row">
	<form id="submit_user_scores"
		action="<?php echo escape($base); ?>index.php/predictions/index"
		method="post">
		<?php
		foreach($phases as $phase) {
			?>
		<div class="poule">
			<h2><?php echo escape($phase->name); ?></h2>
			<?php
				foreach($phase->matches as $match) {
			?>
			<div class="poule-head cf">
				<div class="col match">Match</div>
				<div class="col time">When</div>
				<div class="col venue">Venue</div>
				<div class="col team">Team 1</div>
				<div class="col team">Team 2</div>
				<div class="col result">Result 1</div>
				<div class="col result">Result 2</div>
			</div>
			<div class="poule-game cf">
				<div class="col match">1</div>
				<div class="col time">
					<time datetime="2012-02-17"><?php echo escape($match->date) ?></time>
				</div>
				<div class="col venue">Rio</div>
				<div class="col team"><?php echo escape($match->team1) ?></div>
				<div class="col team"><?php echo escape($match->team2) ?></div>
				<div class="col result">
					<input type="number" placeholder="Score 1" value="<?php echo escape($match->score1) ?>" />
				</div>
				<div class="col result">
					<input type="number" placeholder="Score 2" value="<?php echo escape($match->score2) ?>" />
				</div>
			</div>
			<?php
				}
			?>
			<div><button type="submit">Save</button></div>
		</div>
		<?php
		}
		?>
	</form>
</div>