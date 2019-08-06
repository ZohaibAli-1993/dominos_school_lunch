@extends('layouts.app')

@section('content')


<h1>Parents Home Page</h1>

<script>
      

  $(document).ready(function(){

   /**
    * @param  overlay layer change its opacity from 0 to 0.8 becomes visible
    * @param our modal box displays as a block element from position left -150px to 500px and becomes visible from 0 opacity to 0.8
    * @return animated visible modal box
    */
   
  $('#display_modal').click(function(e){

    $('#overlay').css('opacity','0.8'); 
    $('#modal').css('display','block');
    $('#modal').animate({
               'left': '500px',
               'opacity': '0.8',
    });
  }); 

  /**
    * @param  overlay layer change its opacity from 0.8 to 0 and becomes invisible
    * @param our modal box chanhed its position from left 500px to -150px 
    * and becomes invisible by changing opacity from 0.8 opacity to 0
    * @return VOID (hidden modal box)
    */
   
  $('#close_modal').click(function(e){
    $('#overlay').css('opacity', '0.0');
    $('#modal').animate({
               'left': '-150px',
               'opacity': '0',
    });
  });

/**
 * @param  two targeted divs
 * @return hidden divs can slode down, visible can slide toggle 
 */
$('.drop_down').click(function(){
  var target = $(this).data('target');
  if ($(target).is(':hidden')){
    $(target).slideDown();
  } else{
    $(target).slideToggle();
    };
 });

}); // end of document. ready function 
    
    
        

    </script>
</head>
<body>

<div class="container" style="min-height: 500px;">

	<!--background-image: url(pizza_parent_account111.jpg); background-repeat: no-repeat; width: 100%;-->

<h1>Your account</h1>


<div class="row">
 
    <div class="col-sm-8">
    	<div class="parent_account">
    		<h3>Welcome,</h3>
    		<p class="parent_account_para">To get started please add your child or children to your account.You will then be able to view their
	            up-coming lunch dates.                             
	            <a type="button" id="display_modal">Add</a>
	        </p>
            
    	</div>
    </div>

    <div class="col-sm-4">
    	<div class="parent_account">
    		<a type="button" id="parents_account_order"><h3>My orders</h3></a>
    	</div>
    	
    </div>
</div>


</div><!-- container ends -->


<noscript>
  This page required JavaScript. Please enable it
</noscript>

<div id="overlay"></div>
<div id="modal">
<div id="close_modal">X</div>

<div id="modal_content"></div>

<p>Please enter your token number here <br />
	<form class="check_parent" method="post" action="/token">
	  <div class="form-group">
	    <label for="check_parent_token">Token Number</label>
	    <input type="text" class="form-control" id="check_parent_token" placeholder="Token number">
	  </div>
	  <a type="button" id="check_parent_btn" href="add_student.php" class="btn btn-primary">Submit</a>
	</form>
</div>

@endsection