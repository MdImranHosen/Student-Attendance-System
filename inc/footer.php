  <div class="card card-body bg-light">
	<h3>
		<i class="fab fa-github"></i> www.github.com/MdImranHosen
		<span class="float-right"><i class="fab fa-facebook-f"></i> www.fb.com/Md.ImranHosen.up</span>
	</h3>
</div>
</div>

<script type="text/javascript" src="assets/jQuery/jquery.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="assets/bootstrap/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
   $("#attend").submit(function(){
     var roll = true;
     $(':radio').each(function(){
     name = $(this).attr('name');
     if (roll && !$(':radio[name="' + name + '"]:checked').length) {
     	//alert(name + "Roll Missing !");
     	$("#errorhid").show();
     	roll = false;
     }
     });
     return roll;
   });
  });
</script>
</body>
</html>