<?php wp_footer(); ?>
</body>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/scrollreveal.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/app.min.js"></script>

<?php if (  is_front_page() ||  is_home() ) : ?>
<script>
  $(function(){
  	$.ajax({
  		url: '<?php bloginfo('template_url'); ?>/assets/php/rss.php',
  		cache: false,
  		dataType:"xml",
  
  		success: function(xml){
  			$(xml).find('item').each(function(){
  				var title = $(this).find('title').text();
  				var url = $(this).find('link').text();
  
  				var dateYY = $(this).find('pubDate').text().slice(12, 16);
  				var dateMM = $(this).find('pubDate').text().slice(8, 11);
  				var dateDD = $(this).find('pubDate').text().slice(5, 7);
  
  				if(dateMM == 'Jan') {
  					var dateMMnum = '01';
  				} else if(dateMM == 'Feb') {
  					var dateMMnum = '02';
  				} else if(dateMM == 'Mar') {
  					var dateMMnum = '03';
  				} else if(dateMM == 'Apr') {
  					var dateMMnum = '04';
  				} else if(dateMM == 'May') {
  					var dateMMnum = '05';
  				} else if(dateMM == 'Jun') {
  					var dateMMnum = '06';
  				} else if(dateMM == 'Jul') {
  					var dateMMnum = '07';
  				} else if(dateMM == 'Aug') {
  					var dateMMnum = '08';
  				} else if(dateMM == 'Sep') {
  					var dateMMnum = '09';
  				} else if(dateMM == 'Oct') {
  					var dateMMnum = '10';
  				} else if(dateMM == 'Nov') {
  					var dateMMnum = '11';
  				} else if(dateMM == 'Dec') {
  					var dateMMnum = '12';
  				}
  
  				var html = '<a class="Block flexC" href="' + url + '" target="_blank"><span>' + dateYY + '/' + dateMMnum + '/' + dateDD +' </span><p>' + title + '</p></a>'
  
  				$("section#News .Contents .Holder").append(html);
  
  			});
  		}
  	});
  });
</script>
<?php endif; ?>

