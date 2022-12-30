@extends('template.app')

@section('extra-script')
<script src="https://js.stripe.com/v3/"></script>
@endsection
@section('content')
    <div class="container" style="width: 900px">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h4>Page de Paiement</h4>
                <form id="payment-form">
                    <div id="payment-element">
                      <!-- Elements will create form elements here -->
                    </div>
                    <button id="submit" class="btn btn-success mt-4" style="margin-top: 10px;">Procéder au paiement</button>
                    <div id="error-message">
                      <!-- Display error message to your customers here -->
                    </div>
                </form>
            </div>
            <div class="col-md-12 mt-3" style="margin-top: 10px;">
                <form method="POST" action="{{ route('checkout.store') }}">
                    @csrf

                      <input type="number"  id="price" name="amount" hidden="hidden" value="{{ Cart::total() }}">
                      <input type="text"  id="payment_itent_id" name="payment_itent_id" hidden="hidden" value="{{ $clientSecret }}">


                      <button class="btn btn-success" type="submit">Commander</button>

                  </form>
            </div>
        </div>
    </div>
@endsection
@section('extra-js')
<script>
    const stripe = Stripe('pk_test_51Jg0xZHK50yV0bEAnN7D2gKOSdhPeYhpVfaXVImc4EQqTHFPNBjqHuCSKTNGa7Echs5f8CLEVGmv9AuhkfYVfDFd00IO7ZTxHw');
    const options = {
  clientSecret: "{{ $clientSecret }}",
  // Fully customizable with appearance API.
  appearance: {/*...*/},
};

// Set up Stripe.js and Elements to use in checkout form, passing the client secret obtained in step 2
const elements = stripe.elements(options);

// Create and mount the Payment Element
const paymentElement = elements.create('payment');
paymentElement.mount('#payment-element');

const form = document.getElementById('payment-form');

form.addEventListener('submit', async (event) => {
  event.preventDefault();

  const {error} = await stripe.confirmPayment({
    //`Elements` instance that was used to create the Payment Element
    elements,
    confirmParams: {
      return_url: '{{ route("checkout.index") }}',
    },
  });

  if (error) {
    // This point will only be reached if there is an immediate error when
    // confirming the payment. Show error to your customer (for example, payment
    // details incomplete)
    const messageContainer = document.querySelector('#error-message');
    messageContainer.textContent = error.message;
  } else {
    // Your customer will be redirected to your `return_url`. For some payment
    // methods like iDEAL, your customer will be redirected to an intermediate
    // site first to authorize the payment, then redirected to the `return_url`.
    console.log(paymentItent)
  }
});
</script>
@endsection
