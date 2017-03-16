<section>
	<div class="col-md-12" id="costumers_wrp">
		<div class="container">
			<div class="col-md-12" id="costumers_title_wrp">
				<h3>OUR CUSTOMERS SAY</h3>
			</div>
			<div class="col-md-12" id="costumers_text_wrp">
				<p>
					<?php
						$query = "SELECT * FROM costumers_say ORDER BY rand() LIMIT 1";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$desc_en = $row['desc_en'];
							echo $desc_en;
						}

					?>
				</p>
			</div>
		</div>	
	</div>
</section>