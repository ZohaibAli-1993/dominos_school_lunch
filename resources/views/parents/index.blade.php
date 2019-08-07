@extends('layouts.app')

@section('content')

<div class="text content">
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



	<!--background-image: url(pizza_parent_account111.jpg); background-repeat: no-repeat; width: 100%;-->
<div class="text content">
<h1>Your account</h1>
<img src="/img/pizza_parent_account111.jpg" width="100%">



<div class="row">
    
    <div class="col-sm-8">
    	<div class="parent_account">
    		
<<<<<<< HEAD
    		<h3>Welcome, parent</h3>

    		<p class="parent_account_para">To get started please add your child or children to your account.You will 
              then be able to view their up-coming lunch dates.                             
	            <a type="button" id="display_modal">Add</a>
=======
    		<h3>Welcome, {{$parentRegister->first_name}}</h3>

    		<p class="parent_account_para">To get started please add your child or children to your account.You will 
              then be able to view their up-coming lunch dates.                             
	            <a type="button" id="display_modal" href="/parents/{{$parentRegister->idparent}}/student/add">Add</a>
>>>>>>> b154f81f5680cd35123d0b74df2bfece01b282a9
	       </p>
            
    	</div>
    </div>

    <div class="col-sm-4">
    	<div class="parent_account">
    		<a type="button" id="parents_account_order"><h3>My orders</h3></a>
    	</div>
    	
    </div>



</div>
</div></div>

<noscript>
  This page required JavaScript. Please enable it
</noscript>

<div class="container">

<div id="overlay"></div>
<div id="modal">
<div id="close_modal">Close</div>

<div id="modal_content"></div>

<p>Please enter your token number here </p><br />
	<form class="check_parent" method="post" action="/token">
	  <div class="form-group">
	    <label for="check_parent_token">Token Number</label>
	    <input type="text" class="form-control" id="check_parent_token" placeholder="Token number">
	  </div>
	  <a type="button" id="check_parent_btn" href="/parents/student/add" class="btn btn-primary">
	  Submit</a>

	</form>
</div>
</div>
</div>

@endsection