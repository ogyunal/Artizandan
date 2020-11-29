(function($) {
	"use strict";

	// Create a Stripe client.
	var stripe_api_key = $('#stripe_api_key').val();
	var stripe = Stripe(stripe_api_key);
    // Create an instance of Elements.
    var elements = stripe.elements();
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
    	base: {
    		color: '#32325d',
    		fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    		fontSmoothing: 'antialiased',
    		fontSize: '16px',
    		'::placeholder': {
    			color: '#aab7c4'
    		}
    	},
    	invalid: {
    		color: '#fa755a',
    		iconColor: '#fa755a'
    	}
    };
    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
    	var displayError = document.getElementById('card-errors');
    	if (event.error) {
    		displayError.textContent = event.error.message;
    	} else {
    		displayError.textContent = '';
    	}
    });
    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
    	event.preventDefault();
	    	stripe.createToken(card).then(function(result) {
	    	if (result.error) {
	         	// Inform the user if there was an error.
	        	var errorElement = document.getElementById('card-errors');
	         	errorElement.textContent = result.error.message;
	      	} else {
	          // Send the token to your server.
	          stripeTokenHandler(result.token);
	      	}
	  	});
    });
    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);
      // Submit the form
      form.submit();
  }



  	// paypal payment gateway
  	var paypal_api_key = $('#paypal_api_key').val();
	paypal.Button.render({
    	// Configure environment
    	env: 'sandbox',
    	client: {
    		sandbox: paypal_api_key,
    		production: paypal_api_key
    	},
    	// Customize button (optional)
    	locale: 'en_US',
    	style: {
    		size: 'large',
    		color: 'gold',
    		shape: 'pill',
    	},

    	// Enable Pay Now checkout flow (optional)
    	commit: true,

    	// Set up a payment
    	payment: function(data, actions) {
    		var amount = $('#total_amount').val();
        	var currency = $('#currency').val();
    		return actions.payment.create({
    			transactions: [{
    				amount: {
    					total: amount,
    					currency: currency
    				}
    			}]
    		});
    	},
    	// Execute the payment
    	onAuthorize: function(data, actions) {
    		var base_url = $('#base_url').val();
    		var id = $('#plan_id').val();
    		var _token = $('#_token').val();
    		return actions.payment.execute().then(function() {
    			return actions.request.post(base_url+'/store/create-payment', {
    				id: id,
    				type: 'paypal',
    				_token: _token,
    			})
    			.then(function(res) {
    				if(res == 'ok')
    				{
    					window.history.pushState("","",base_url+'/store/plan');
    					location.reload();
    				}
    			});
    		});
    	}
	}, '#paypal-button');

})(jQuery);