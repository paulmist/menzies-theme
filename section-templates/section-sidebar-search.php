<?php

// Sidebar search section

?>

<div class="sidebar-search-widget sidebar-widget">

	<h3>Search</h3>

	<form id="labnol" action="<?php echo home_url(); ?>" method="get">

		<div class="speech">
	    	<input type="text" name="s" value="" id="transcript" placeholder="Search.." /> <!-- data-swplive="true" enables SearchWP Live Search -->
	    	<a onclick="startDictation()" class="search-mic-icon" alt="search mic"/><i class="fa fa-microphone" aria-hidden="true"></i></a>
	    </div>

	</form>

</div>