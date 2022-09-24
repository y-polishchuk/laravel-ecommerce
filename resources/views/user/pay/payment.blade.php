@extends('user.user_master')

@section('user')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        
        <h4>Subscribe</h4>
        <br><br>

        <div class="col-md-12">
        <div class="card">

        
        <div class="card-body">
        
                <form id="payment-form" method="POST" action="{{ route('subscribe.post') }}">
                  @csrf
                  
                  <div class="mb-3" id="payment-element">
                    <!--Stripe.js injects the Payment Element-->
                  </div>
                  <input type="hidden" name="price_id" value="{{ $price_id }}">
                  <button id="btnSubmit" class="btn btn-info">
                    <div class="spinner hidden" id="spinner"></div>
                    <span id="button-text">Pay now</span>
                  <button>
                  <div id="payment-message" class="hidden"></div>
                </form>
                
                </div>
                </div>
        </div>
    </div>
    </div>
    </div>
    
@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
      const stripe = Stripe("pk_test_51LhTZGAN7OPdNadI7nC2cZyqZyex78SouyYyM9P6HOYuzf3Y2miVp8nEV66qq23w0gnheCUHMcEFiCclDNLQWLFa00jKsom4JW");

      let elements;

      initialize();

      document
        .querySelector("#payment-form")
        .addEventListener("submit", handleSubmit);

      function initialize() {

        elements = stripe.elements({ clientSecret: "{{ $intent->client_secret }}" });

        const paymentElement = elements.create("payment");
        paymentElement.mount("#payment-element");
      }

      async function handleSubmit(e) {
        e.preventDefault();

        const { setupIntent, error } = await stripe.confirmSetup({
          elements,
          confirmParams: {
            // Make sure to change this to your payment completion page
            return_url: "http://localhost:4242/public/checkout.html",
          },
          redirect: 'if_required'
        });

        // This point will only be reached if there is an immediate error when
        // confirming the payment. Otherwise, your customer will be redirected to
        // your `return_url`. For some payment methods like iDEAL, your customer will
        // be redirected to an intermediate site first to authorize the payment, then
        // redirected to the `return_url`.

        if (error) {
        if (error.type === "card_error" || error.type === "validation_error") {
          showMessage(error.message);
        } else {
          showMessage("An unexpected error occurred.");
        }
      } else {
        // console.log(setupIntent)

        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'paymentMethod');
        hiddenInput.setAttribute('value', setupIntent.payment_method);
        form.appendChild(hiddenInput);
        
        // Submit the form
        form.submit();
      }

      }

      function showMessage(messageText) {
        const messageContainer = document.querySelector("#payment-message");

        messageContainer.classList.remove("hidden");
        messageContainer.textContent = messageText;

        setTimeout(function () {
          messageContainer.classList.add("hidden");
          messageText.textContent = "";
        }, 4000);
      }
    </script>
    @endpush

@endsection
