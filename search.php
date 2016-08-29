
<div class="row">
	<div class="col-lg-8 main-content">
		<div class="card card-block search-results">
	  		<h1>Søgeresultater for "<?php echo $_GET['search']; ?>"</h1>
	  		<section>
				<h2>Virksomheder</h2>
				<ul class="no-style-list">		
		  		<?php 
		  		$url="inc/feeds/virksomheder.json";
		  		$json=file_get_contents($url);
		  		$data=json_decode($json,true);

		  		$companyName = $_GET['search'];
		  		foreach($data as $key => $company):
		  		if(stristr($company['company'],$companyName)): ?>
		  		<li>
		  			<a href="<?php echo $site_url; ?>/?company-id=<?php echo $company['id']; ?>" class="result-link"><?php echo $company['company']; ?></a>
		  			<i class="fa fa-home text-muted sep-icon first"></i><?php echo $company['location']; ?>
		  		</li>
		  		
		  		<?php endif; endforeach; ?>
		  		</ul>
		  		<?php if(!stristr($company['company'],$companyName)):?>
		  			<p>Ingen resultater</p>
		  		<?php endif; ?>
	  		</section>
	  		<section>
	  			<h2>Personer</h2>
	  			<ul class="no-style-list">
	  			<?php 
	  				foreach($company['employees'] as $key => $employer):
	  				if(stristr($employer['name'],$companyName)): ?>

	  				<li>
	  					<a href="<?php echo $site_url; ?>/?company-id=<?php echo $company['id']; ?>" class="result-link"><?php echo $employer['name']; ?></a>
	  					<i class="fa fa-suitcase text-muted sep-icon first"></i><?php echo $company['company']; ?><i class="fa fa-home text-muted sep-icon"></i><?php echo $company['location']; ?>
	  				</li>
	  				<?php endif; endforeach; ?>
	  				</ul>
	  				<?php if(!stristr($employer['name'],$companyName)):?>
	  					<p>Ingen resultater</p>
	  				<?php endif; ?>
	  			 </ul>
	  		</section>

  		</div>

 	</div><!-- /main-content -->
 	<aside class="col-lg-4">
 		<?php require_once 'inc/widgets/nyevirksomheder.php'; ?>
 	</aside>

</div>